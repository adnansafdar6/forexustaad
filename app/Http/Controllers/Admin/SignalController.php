<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Pair;
use App\Models\Role;
use App\Models\Signal;
use Illuminate\Http\Request;

class SignalController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Signals';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.signal.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Signals'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('admin.signal.index', [
            'signal' => Signal::with('role','pair')->get(),
//            'categories' => Category::where('parent_id', 0)->where('name', 'signal')->whereHas('subcategories')->with('subcategories')->get(),

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
        $Signal = Signal::findOrFail($id);
        $Signal->is_feature = !$Signal->is_feature;
        $Signal->save();
        $message = $Signal->is_feature == 0 ? 'signal Down Successfully' : 'signal Up Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    public function status($id)
    {
       $Signal = Signal::findOrFail($id);
        $Signal->is_active = !$Signal->is_active;
        $Signal->save();
        $message = $Signal->is_active == 0 ? 'Active Successfully' : 'De Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Signal $Signal)
    {
        $this->pageHeading = ('signal View');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        return view('admin.signal.view', [
            'signal' => $Signal,
        ]);
    }
    public function fetchPair(Request $request)
    {

        $data['pair'] = Pair::where("category_id",$request->category_id)->get(['pair','id']);

        return response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Signal' : 'Edit Signal');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Signal = new Signal();
        } else {
            $Signal = Signal::findOrFail($id);
        }
        return view('admin.signal.edit', [
            'signal' => $Signal,
            'pair' => Pair::all(),
            'roles' => Role::where('guard_name','web')->get(),
            'categories' => Category::where('parent_id', 0)->where('name', 'signal')->whereHas('subcategories')->with('pairs')->with('subcategories')->get(),
            'action' => route('admin.signal.update', $id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $roleRequest, $id)
    {
        $request = $roleRequest->except('_token', '_method');
//        dd($request);
//        $random = random_int(10, 999);
//        if (is_null($request['slug'])) {
//            $request['slug'] = Str::slug($request['title'] . '-' . $random);
//        } elseif ($id == 0) {
//            $request['slug'] = Str::slug($request['slug'] . '-' . $random);
//        }
//        dd($request);

        if (!isset($request['is_feature'])) {
            $request['is_feature'] = 0;
        } else {
            $request['is_feature'] = 1;
        }
        if (!isset($request['is_active'])) {
            $request['is_active'] = 0;
        } else {
            $request['is_active'] = 1;
        }
        $request['takeprofit'] =  json_encode($request['takeprofit']);
//        dd($request);
        try {
            Signal::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'signal Updated Successfully' : 'signal Added Successfully';
            return redirect(route('admin.signal.index'))->with('success', $message);
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
            $Signal = Signal::findOrFail($id);
            $Signal->delete();
            $data = $this->all();
            return response()->json(['msg' => 'signal deleted successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'signal Not Found.']);
        }
    }

    private function all(): string
    {

        $Signal = Signal::with('role','pair')->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
  <th>Sr#</th>
                                    <th>Member</th>
                                    <th>Pair</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Results</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($Signal) > 0) {
            foreach ($Signal as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-20">' . $val['role']->name . '</td>';
                $data .= '<td class="width-20">' . $val['pair']->pair . '</td>';
                $data .= '<td class="width-20">Comments</td>';
                $data .= '<td class="width-20">' . DateToHumanformat($val->created_at) . '</td>';
                $data .= '<td class="width-20">Results</td>';
                if ($val->is_active == 0) {
                    $data .= '<td class="width-15">' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td class="width-15">' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-15">';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.signal.changeStatus', $val->id) . '" title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.signal.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>';
                }
                if ($val->is_feature == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.signal.changeStatus', $val->id) . '" title="signal Up"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.signal.changeStatus', $val->id) . '" title="signal Down"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.signal.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.signal.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
//
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
}
