<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;
use Exception;

class FaqController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = "FAQ'S";
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.faq.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => "FAQ'S"];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try{
            return view('admin.faq.index', [
                'faqs' => Faq::with('category')->get(),
                'categories' => Category::where('parent_id', 0)->where('name','faq')->with('subcategories')->get(),
                'faq' => new Faq(),
                'action' => route('admin.faq.update', 0),
            ]);
        } catch (Exception $exception){
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add FAQ"S' : 'Edit FAQ"S');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.faq.index', [
                'faq' => Faq::findOrFail($id),
                'categories' => Category::where('name', 'faq')->get(),
                'faqs' => Faq::with('category')->get(),
                'action' => route('admin.faq.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $FaqRequest, $id)
    {
        $data = $FaqRequest->only('question','category_id','answer');
//        dd($data);
        try {
            Faq::updateOrCreate(['id' => $id], $data);
            $message = $id > 0 ? 'FAQ"S Updated Successfully' : 'FAQ"S Added Successfully';
            return redirect(route('admin.faq.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        try {
            $Faq = Faq::findOrFail($id);
            $Faq->delete();
            $data = $this->all();
            return response()->json(['msg' => 'FAQ"S Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'FAQ"S Not Found.']);
        }
    }
    private function all(): string
    {
        $faq = Faq::with('category')->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead>
                                                        <tr>
                                                      <th>Sr#</th>
<th>Category</th>
   <th>Question</th>
   <th>Answer</th>
   <th>Date</th>
<th>Action</th>
                                                         </tr></thead><tbody>';

        if(count($faq) > 0){
            foreach ($faq as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-15">' . $val['category']->name . '</td>';
                $data .= '<td class="width-15">'.strlimit($val->question).'</td>';
                $data .= '<td class="width-15">'.strlimit($val->answer).'</td>';
                $data .= '<td class="width-15">' .DateToHumanformat($val->created_at) . '</td>';
                $data .= '<td class="width-15"><a class="pr-2" href="' . route('admin.faq.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.faq.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }

        } else {
            $data .= '<tr><td colspan="3">No Record Found.</td></tr>';
        }
        return $data;
    }

}
