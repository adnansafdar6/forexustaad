<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Sponsors';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.sponsor.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Sponsors'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.sponsor.index', [
                'sponsors' => Sponsor::all(),
                'action' => route('admin.sponsor.edit', 0),
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
        $Sponsor = Sponsor::findOrFail($id);
        $Sponsor->is_active = !$Sponsor->is_active;
        $Sponsor->save();
        $message = $Sponsor->is_active == 0 ? 'sponsor De-Active Successfully' : 'sponsor Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    public function Status($id)
    {
        $Sponsor = Sponsor::findOrFail($id);
        $Sponsor->is_feature = !$Sponsor->is_feature;
        $Sponsor->save();
        $message = $Sponsor->is_feature == 0 ? 'sponsor De Featured Successfully' : 'sponsor Featured Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add sponsor' : 'Edit sponsor');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Sponsor = new Sponsor();
        } else {
            $Sponsor = Sponsor::findOrFail($id);
        }
        try {
            return view('admin.sponsor.edit', [
                'sponsor' => $Sponsor,
                'sponsors' => Sponsor::all(),
                'action' => route('admin.sponsor.update', $id),
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
            Sponsor::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'sponsor Updated Successfully' : 'sponsor Added Successfully';
            return redirect(route('admin.sponsor.index'))->with('success', $message);
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
            $Sponsor = Sponsor::findOrFail($id);
//            $Sponsor->delete();
            $data = $this->all();
            return response()->json(['msg' => 'sponsor Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'sponsor Not Found.']);
        }
    }

    private function all(): string
    {
        $Sponsor=Sponsor::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
</tr></thead><tbody>';
        if (count($Sponsor) > 0) {
            foreach ($Sponsor as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-10"><img  src="'.asset($val->img).'" alt="No image" width="100px"></td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15"><a href="' . $val->link . '" >' . strlimit($val->link) . '</a></td>';
                $data .= '<td class="width-15">' . DateToHumanformat($val->created_at) . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td class="width-15">' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td class="width-15">' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-15">';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.sponsor.changeStatus', $val->id) . '" title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.sponsor.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.sponsor.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.sponsor.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>';
                $data .= '     </td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }

}


