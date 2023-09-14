<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Add User';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.adduser.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Add User'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $data=Admin::with('role')->get();
//        dd($data[2]->fullName);
        return view('admin.adduser.index', [
            'adduser' => Admin::with('role')->get(),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function changeStatus($id)
    {
        $Admin = Admin::findOrFail($id);
        $Admin->is_active = !$Admin->is_active;
        $Admin->save();
        $message = $Admin->is_active == 0 ? 'User De-Active Successfully' : 'User Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Admin = Admin::findOrFail($id);
        $this->pageHeading = ('Lecture View');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        return view('admin.adduser.view', [
            'adduser' => $Admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add User' : 'Edit User');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Admin = new Admin();
        } else {
            $Admin = Admin::findOrFail($id);
        }
        return view('admin.adduser.edit', [
            'adduser' => $Admin,
            'roles' => Role::all(),
            'action' => route('admin.adduser.update', $id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $roleRequest, $id)
    {
        $request = $roleRequest->except('_token', '_method');

        if (isset($request['is_active'])) {
            $request['is_active'] = 1;
        } else {
            $request['is_active'] = 0;
        }
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        if ($id == 0) {
            $request['password'] = Hash::make($request['password']);
        }
        unset($request['image']);
//        dd($request);
        try {
            Admin::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'User Updated Successfully' : 'User Added Successfully';
            return redirect(route('admin.adduser.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $post = Admin::findOrFail($id);
//            $post->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Lecture deleted successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Lecture Not Found.']);
        }
    }

    private function all(): string
    {

        $post = Admin::with('role')->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
          <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($post) > 0) {
            foreach ($post as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-20">' . $val->fullName . '</td>';
                $data .= '<td class="width-20">' . $val->email . '</td>';
                $data .= '<td class="width-20">' . $val['role']->name . '</td>';
                $data .= '<td class="width-20">' . $val->phone . '</td>';
                $data .= '<td class="width-20">' . DateToHumanformat($val->created_at) . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td>' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td>' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-20">
                     <a class="pr-2" href="' . route('admin.adduser.show', $val->id) . '" title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.adduser.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.adduser.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.adduser.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.adduser.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }

    public function saveImage($image, $img)
    {
        $ext = $image->getClientOriginalExtension();
        $ext = strtolower($ext);
//        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'svg' || $ext == 'webp'){
        if (!is_null($img)) {
            $path = public_path($img);
            if (is_file($path)) {
                unlink($path);
            }
        }
        $path = 'assets/front/uploads/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $i = $image->move($path, $profileImage);
        return $path . $profileImage;
//        }
    }


    public function uploadCkImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }


    private function sortData($id): string
    {
        if ($id == "-1") {
            $Admin = Admin::with('category')->get();
        } else {

            $Admin = Admin::where('category_id', $id)->with('category')->get();
        }

        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($Admin) > 0) {
            foreach ($Admin as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-20">' . $val->title . '</td>';
                $data .= '<td class="width-20">' . $val['category']->name . '</td>';
                $data .= '<td class="width-20">Comments</td>';
                $data .= '<td class="width-20">' . \Carbon\Carbon::parse($val->created_at)->format('d/m/Y h:i') . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td>' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td>' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-20">
                     <a class="pr-2" href="' . route('admin.adduser.show', $val->slug) . '" title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.adduser.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.adduser.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.adduser.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.adduser.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }
}
