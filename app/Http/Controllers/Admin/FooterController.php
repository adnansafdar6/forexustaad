<?php

namespace App\Http\Controllers\Admin;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Footer';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.footer.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Footer'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            return view('admin.footer.index', [
                'footers' => Footer::all(),
                'action' => route('admin.footer.edit', 0),
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
        $Footer = Footer::findOrFail($id);
        $Footer->is_active = !$Footer->is_active;
        $Footer->save();
        $message = $Footer->is_active == 0 ? 'Footer De-Active Successfully' : 'Footer Active Successfully';
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
        $this->pageHeading = (($id == 0) ? 'Add Footer' : 'Edit Footer');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Footer = new Footer();
        } else {
            $Footer = Footer::findOrFail($id);
        }
        try {
            return view('admin.footer.edit', [
                'footer' => $Footer,
                'footers' => Footer::all(),
                'action' => route('admin.footer.update', $id),
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

//        dd($request);
        try {
            Footer::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Footer Updated Successfully' : 'Footer Added Successfully';
            return redirect(route('admin.footer.index'))->with('success', $message);
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
            $Footer = Footer::findOrFail($id);
            $Footer->delete();
            $data = $this->all();
            return response()->json(['msg' => 'footer Deleted Successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'footer Not Found.']);
        }
    }

    private function all(): string
    {
        $Footer=Footer::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
</tr></thead><tbody>';
        if (count($Footer) > 0) {
            foreach ($Footer as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15">' . strlimit($val->link) . '</td>';
                $data .= '<td class="width-15">' . $val->type . '</td>';
                $data .= '<td class="width-15">' . DateToHumanformat($val->created_at) . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td class="width-15">' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td class="width-15">' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-15">';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.footer.changeStatus', $val->id) . '" title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.footer.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.footer.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.footer.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>';
                $data .= '     </td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }

}


