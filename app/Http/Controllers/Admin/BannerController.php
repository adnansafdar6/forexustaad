<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Banners';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.banner.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Banners'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.banner.index', [
                'banners' => Banner::all(),
                'action' => route('admin.banner.edit', 0),
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
        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();
        $message = $banner->is_active == 0 ? 'Banner De-Active Successfully' : 'Banner Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    public function Status($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->is_featured = !$banner->is_featured;
        $banner->save();
        $message = $banner->is_featured == 0 ? 'Lecture De Featured Successfully' : 'Lecture Featured Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add Banner' : 'Edit Banner');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Banner = new Banner();
        } else {
            $Banner = Banner::findOrFail($id);
        }
        try {
            return view('admin.banner.edit', [
                'banner' => $Banner,
                'banners' => Banner::all(),
                'action' => route('admin.banner.update', $id),
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
        if (!isset($request['is_featured'])) {
            $request['is_featured'] = 0;
        } else {
            $request['is_featured'] = 1;
        }
        if (!isset($request['is_active'])) {
            $request['is_active'] = 0;
        } else {
            $request['is_active'] = 1;
        }
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        unset($request['image']);
//        dd($request);
        try {
            Banner::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Banner Updated Successfully' : 'Banner Added Successfully';
            return redirect(route('admin.banner.index'))->with('success', $message);
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
            $banner = Banner::findOrFail($id);
//            $banner->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Banner Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Banner Not Found.']);
        }
    }

    private function all(): string
    {
        $banner=Banner::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Html Link</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                        <th>Status</th>
                                        <th>Action</th>
</tr></thead><tbody>';
        if (count($banner) > 0) {
            foreach ($banner as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td><img  src="' . asset($val->img) . '" alt="No image" width="100px"></td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15"><a href="' . $val->link . '" >' . strlimit($val->link) . '</a></td>';
                $data .= '<td class="width-15">' . strlimit($val->htmllink) . '</td>';
                $data .= '<td class="width-15">' . DateToHumanformat($val->created_at) . '</td>';
                $data .= '<td class="width-15">' . $val->type . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td>' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td>' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-20">';
                if ($val->is_featured == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.banner.status', $val->id) . '" title="De Featured"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.banner.status', $val->id) . '" title="Featured"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.banner.changeStatus', $val->id) . '" title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.banner.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.training.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.training.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>';
                $data .= '     </td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }

}


