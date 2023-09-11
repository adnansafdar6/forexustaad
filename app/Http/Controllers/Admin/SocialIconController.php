<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialIcon;
use Illuminate\Http\Request;
use Exception;

class SocialIconController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Social Icon';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.socialicon.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Social Icon'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.socialicon.index', [
                'socialicons' => SocialIcon::all(),
                'action' => route('admin.socialicon.edit', 0),
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Social Icon' : 'Edit Social Icon');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $socialicon = new SocialIcon();
        } else {
            $socialicon = SocialIcon::findOrFail($id);
        }
        try {
            return view('admin.socialicon.edit', [
                'socialicon' => $socialicon,
                'socialicons' => SocialIcon::all(),
                'action' => route('admin.socialicon.update', $id),
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
    public function update(Request $categoryRequest, $id)
    {
        $data = $categoryRequest->except('_token', '_method');
        try {
            SocialIcon::updateOrCreate(['id' => $id], $data);
            $message = $id > 0 ? 'Social Icon Updated Successfully' : 'Social Icon Added Successfully';
            return redirect(route('admin.socialicon.index'))->with('success', $message);
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
            $category = SocialIcon::findOrFail($id);
            $category->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Social Icon Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Social Icon Not Found.']);
        }
    }

    private function all(): string
    {
        $socialicon = SocialIcon::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                       <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($socialicon) > 0) {
            foreach ($socialicon as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15"><a href="' . $val->created_at . '" ><i class="fa-brands fa-' . $val->name . '"></i>' . $val->link . '</a></td>';
                $data .= '<td class="width-15">' . DateToHumanformat( $val->created_at) . '</td>';
                $data .= '<td class="width-15"><a class="pr-2" href="' . route('admin.socialicon.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.socialicon.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }
}
