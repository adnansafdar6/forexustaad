<?php

namespace App\Http\Controllers\Admin;

use App\Models\Favicon;
use Illuminate\Http\Request;
use Exception;

class FaviconController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Favicon';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.favicon.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Favicon'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.favicon.index', [
                'favicons' => Favicon::all(),
                'favicon' => new Favicon(),
                'action' => route('admin.favicon.update', 0),
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
        $training = Favicon::findOrFail($id);
        $training->is_active = !$training->is_active;
        $training->save();
        $message = $training->is_active == 0 ? 'Favicon De-Active Successfully' : 'Favicon Active Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add Favicon' : 'Edit Favicon');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            return view('admin.favicon.index', [
                'favicon' => Favicon::findOrFail($id),
                'favicons' => Favicon::all(),
                'action' => route('admin.favicon.update', $id),
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

            Favicon::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Favicon Updated Successfully' : 'Favicon Added Successfully';
            return redirect(route('admin.favicon.index'))->with('success', $message);
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
            $Favicon = Favicon::findOrFail($id);
            $Favicon->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Favicon Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Favicon Not Found.']);
        }
    }

    private function all(): string
    {
        $Favicons = Favicon::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                        <th>Sr#</th>
                                                         <th>FavIcon</th>
                                                         <th>Status</th>
                                                          <th>Created At</th>
                                                          <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($Favicons) > 0) {
            foreach ($Favicons as $key => $val) {
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
                    $data .= ' <a class="pr-2" href="' . route('admin.favicon.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.favicon.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.favicon.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.favicon.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }


}
