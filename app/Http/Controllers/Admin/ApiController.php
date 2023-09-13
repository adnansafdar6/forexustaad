<?php

namespace App\Http\Controllers\Admin;

use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Apis';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.api.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Apis'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.api.index', [
                'apis' => Api::all(),
                'action' => route('admin.api.edit', 0),
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
        $Api = Api::findOrFail($id);
        $Api->is_active = !$Api->is_active;
        $Api->save();
        $message = $Api->is_active == 0 ? 'api De-Active Successfully' : 'api Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    public function Status($id)
    {
        $Api = Api::findOrFail($id);
        $Api->is_feature = !$Api->is_feature;
        $Api->save();
        $message = $Api->is_feature == 0 ? 'Api De Featured Successfully' : 'Api Featured Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add Api' : 'Edit Api');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Api = new Api();
        } else {
            $Api = Api::findOrFail($id);
        }
        try {
            return view('admin.api.edit', [
                'api' => $Api,
                'apis' => Api::all(),
                'action' => route('admin.api.update', $id),
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

//        dd($request);
        try {
            Api::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'api Updated Successfully' : 'api Added Successfully';
            return redirect(route('admin.api.index'))->with('success', $message);
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
            $api = Api::findOrFail($id);
            $api->delete();
            $data = $this->all();
            return response()->json(['msg' => 'api Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'api Not Found.']);
        }
    }

    private function all(): string
    {
        $Api=Api::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
</tr></thead><tbody>';
        if (count($Api) > 0) {
            foreach ($Api as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15"><a href="' . $val->link . '" >' . strlimit($val->link) . '</a></td>';
                $data .= '<td class="width-15">' . DateToHumanformat($val->created_at) . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td class="width-15">' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td class="width-15">' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-15">';
                if ($val->is_featured == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.api.status', $val->id) . '" title="De Featured"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.api.status', $val->id) . '" title="Featured"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.api.changeStatus', $val->id) . '" title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.api.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>';
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


