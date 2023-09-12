<?php

namespace App\Http\Controllers\Admin;


use App\Models\Slidingimage;
use Illuminate\Http\Request;
use Exception;

class SlidingimageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Sliding Image';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.slidingimage.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Sliding Image'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.slidingimage.index', [
                'slidingimages' => Slidingimage::all(),
                'slidingimage' => new Slidingimage(),
                'action' => route('admin.slidingimage.update', 0),
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
        $slidingimage = Slidingimage::findOrFail($id);
        $slidingimage->is_active = !$slidingimage->is_active;
        $slidingimage->save();
        $message = $slidingimage->is_active == 0 ? 'Sliding Image De-Active Successfully' : 'Sliding Image Active Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add Sliding Image' : 'Edit Sliding Image');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            return view('admin.slidingimage.index', [
                'slidingimage' => Slidingimage::findOrFail($id),
                'slidingimages' => Slidingimage::all(),
                'action' => route('admin.slidingimage.update', $id),
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

            Slidingimage::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Sliding Image Updated Successfully' : 'Sliding Image Added Successfully';
            return redirect(route('admin.slidingimage.index'))->with('success', $message);
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
            $Slidingimage = Slidingimage::findOrFail($id);
            $Slidingimage->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Sliding Image Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Sliding Image Not Found.']);
        }
    }

    private function all(): string
    {
        $Slidingimages = Slidingimage::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                        <th>Sr#</th>
                                                         <th>Image</th>
                                                         <th>Status</th>
                                                          <th>Created At</th>
                                                          <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($Slidingimages) > 0) {
            foreach ($Slidingimages as $key => $val) {
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
                    $data .= ' <a class="pr-2" href="' . route('admin.slidingimage.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.slidingimage.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.slidingimage.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.slidingimage.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }


}
