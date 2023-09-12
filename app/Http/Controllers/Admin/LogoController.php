<?php

namespace App\Http\Controllers\Admin;

use App\Models\Logo;
use Illuminate\Http\Request;
use Exception;

class LogoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Logo';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.categories.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Logo'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.logo.index', [
                'logos' => Logo::all(),
                'logo' => new Logo(),
                'action' => route('admin.logo.update', 0),
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function changeStatus($id)
    {
        $training = Logo::findOrFail($id);
        $training->is_active = !$training->is_active;
        $training->save();
        $message = $training->is_active == 0 ? 'Logo De-Active Successfully' : 'Logo Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Logo' : 'Edit Logo');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            return view('admin.logo.index', [
                'logo' => Logo::findOrFail($id),
                'logos' => Logo::all(),
                'action' => route('admin.logo.update', $id),
            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request = $request->except('_token', '_method');
//dd($request);
        if (isset($request['is_active'])) {
            $request['is_active'] = 1;
        } else {
            $request['is_active'] = 0;
        }
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        try {

            unset($request['image']);

            Logo::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Logo Updated Successfully' : 'Logo Added Successfully';
            return redirect(route('admin.logo.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        try {
            $logo = Logo::findOrFail($id);
            $logo->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Logo Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Logo Not Found.']);
        }
    }

    private function all(): string
    {
        $logos = Logo::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                        <th>Sr#</th>
                                                         <th>Logo</th>
                                                         <th>Status</th>
                                                          <th>Created At</th>
                                                          <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($logos) > 0) {
            foreach ($logos as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td><img  src="'.asset($val->img).'" alt="No image" width="100px"></td>';
                if ($val->is_active == 0) {
                    $data .= '<td class="width-15">' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td class="width-15">' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-15">' .DateToHumanformat($val->created_at) . '</td>';
                $data .= '<td class="width-15">';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.logo.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.logo.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.logo.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.logo.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }


}
