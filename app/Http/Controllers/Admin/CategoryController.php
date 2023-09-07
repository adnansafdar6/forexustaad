<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Categories';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.categories.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Categories'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.categories.index', [
                'categories' => Category::where('parent_id', 0)->get(),
                'category' => new Category(),
                'action' => route('admin.categories.update', 0),
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
        $this->pageHeading = (($id == 0) ? 'Add Category' : 'Edit Category');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            return view('admin.categories.index', [
                'category' => Category::findOrFail($id),
                'categories' => Category::where('parent_id', 0)->get(),
                'action' => route('admin.categories.update', $id),
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
        $data = $categoryRequest->only('name');
        try {
            Category::updateOrCreate(['id' => $id], $data);
            $message = $id > 0 ? 'Category Updated Successfully' : 'Category Added Successfully';
            return redirect(route('admin.categories.index'))->with('success', $message);
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
            $category = Category::findOrFail($id);
            $category->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Category Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Category Not Found.']);
        }
    }

    private function all(): string
    {
        $categories = Category::where('parent_id', 0)->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                        <th>Sr#</th>
                                                         <th>Category</th>
                                                          <th>Created At</th>
                                    <th>Updated At</th>
                                                          <th>Action</th>
                                                         </tr></thead><tbody>';

        if (count($categories) > 0) {
            foreach ($categories as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15">' . $val->created_at . '</td>';
                $data .= '<td class="width-15">' . $val->updated_at . '</td>';
                $data .= '<td class="width-15"><a class="pr-2" href="' . route('admin.categories.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.categories.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }
}
