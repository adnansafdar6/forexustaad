<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Pair;
use Illuminate\Http\Request;
use Exception;

class PairController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Pairs';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.pair.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Pairs'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.pair.index', [
            'pairs' => Pair::with('category')->get(),
            'pair'=>new Pair(),
            'categories' => Category::where('name', 'signal')->whereHas('subcategories')->with('subcategories')->get(),
            'action' => route('admin.pair.update', 0),
        ]);
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
        $this->pageHeading = (($id == 0) ? 'Add Pair' : 'Edit Pair');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            return view('admin.pair.index', [
                'pair' => Pair::findOrFail($id),
                'pairs' => Pair::with('category')->get(),
                'categories' => Category::where('name', 'signal')->whereHas('subcategories')->with('subcategories')->get(),
                'action' => route('admin.pair.update', $id),
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
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        unset($request['image']);
//        dd( $request );
        try {
            Pair::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Pair Updated Successfully' : 'Pair Added Successfully';
            return redirect(route('admin.pair.index'))->with('success', $message);
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
            $Pair = Pair::findOrFail($id);
            $Pair->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Pair Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Pair Not Found.']);
        }
    }

    private function all(): string
    {
        $pair = Pair::with('category')->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                        <th>Sr#</th>
                                    <th>Image</th>
                                    <th>Pair</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($pair) > 0) {
            foreach ($pair as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td><img  src="'.asset($val->img).'" alt="No image" width="100px"></td>';
                $data .= '<td class="width-15">' .$val->pair . '</td>';
                $data .= '<td class="width-15">' .$val['category']->name . '</td>';
                $data .= '<td class="width-15">' .DateToHumanformat($val->created_at) . '</td>';
                $data .= '<td class="width-15">';
                $data .= '<a class="pr-2" href="' . route('admin.pair.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.pair.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }

}
