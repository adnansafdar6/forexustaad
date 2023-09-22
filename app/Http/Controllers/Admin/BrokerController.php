<?php

namespace App\Http\Controllers\Admin;

use App\Models\Broker;
use App\Models\Category;
use Illuminate\Http\Request;

class BrokerController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'broker';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.broker.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'broker'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $broker = Broker::with('category','user',)->get();
        return view('admin.broker.index', [
            'broker' => $broker,
//            'categories' => Category::where('parent_id', 0)->where('name', 'broker')->whereHas('subcategories')->with('subcategories')->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function changeStatus($id)
    {
        $Broker = Broker::findOrFail($id);
        $Broker->is_active = !$Broker->is_active;
        $Broker->save();
        $message = $Broker->is_active == 0 ? 'Broker De-Active Successfully' : 'Broker Active Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Broker = Broker::findOrFail($id);
        $this->pageHeading = ('Broker Detail');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        return view('admin.broker.view', [
            'broker' => $Broker,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Broker' : 'Edit Broker');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $Broker = new Broker();
        } else {
            $Broker = Broker::findOrFail($id);
        }
        return view('admin.broker.edit', [
            'broker' => $Broker,
            'categories' => Category::where('parent_id', 0)->where('name', 'broker')->whereHas('subcategories')->with('subcategories')->get(),
            'action' => route('admin.broker.update', $id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request['data'] = [
            'COMPANY_INFORMATION' => [
                'name' => $request['name'],
                'regulations' => $request['regulations'],
                'headcount' => $request['headcount'],
                'foundation' => $request['foundation'],
                'publictrade' => $request['publictrade'],
                'noe' => $request['noe'],
                'sdate' => $request['sdate'],
                'edate' => $request['edate'],
            ],
            'DEPOSIT_&_WITHDRAWAL' => [
                'depositoption' => $request['depositoption'],
                'withdrawaloption' => $request['withdrawaloption'],
            ],
            'COMMISSIONS_&_FEES' => [
                'commission' => $request['commission'],
                'fees' => $request['fees'],
            ],
            'ACCOUNT_INFORMATION' => [
                'tgt' => $request['tgt'],
                'md' => $request['md'],
                'ml' => $request['ml'],
                'ma' => $request['ma'],
                'pa' => $request['pa'],
                'da' => $request['da'],
                'ia' => $request['ia'],
                'sa' => $request['sa'],
                'sfb' => $request['sfb'],
                'sfp' => $request['sfp'],
                'sfs' => $request['sfs'],
                'sfdt' => $request['sfdt'],
                'sfwt' => $request['sfwt'],
                'sfst' => $request['sfst'],
            ],
            'TRADABLE_ASSETS' => [
                'tcu' => $request['tcu'],
                'tco' => $request['tco'],
                'ti' => $request['ti'],
                'ts' => $request['ts'],
                'tcc' => $request['tcc'],
                'tes' => $request['tes'],
                'tb' => $request['tb'],
                'tf' => $request['tf'],
                'to' => $request['to'],
                'scc' => $request['scc'],
                'nots' => $request['nots'],
                'nocp' => $request['nocp'],
                'nocc' => $request['nocc'],
                'nos' => $request['nos'],
                'nof' => $request['nof'],
                'noi' => $request['noi'],
                'noc' => $request['noc'],
                'noo' => $request['noo'],
                'nob' => $request['nob'],
            ],
            'TRADING_PLATFORMS' => [
                'tp' => $request['tp'],
                'osp' => $request['osp'],
                'mt' => $request['mt'],
                'tpsl' => $request['tpsl'],
            ],
            'TRADING_FEATURES' => [
                'es' => $request['es'],
                'sct' => $request['sct'],
                'ema' => $request['ema'],
                'gsl' => $request['gsl'],
                'glo' => $request['glo'],
                'gfl' => $request['gfl'],
                'oco' => $request['oco'],
                'rst' => $request['rst'],
                'at' => $request['at'],
                'ts' => $request['ts'],
                'apit' => $request['apit'],
                'vpss' => $request['vpss'],
                'tfc' => $request['tfc'],
                'iom' => $request['iom'],
                'oh' => $request['oh'],
                'ops' => $request['ops'],
                'oct' => $request['oct'],
                'ea' => $request['ea'],
                'otf' => $request['otf'],
            ],
            'CUSTOMER_SERVICE' => [
                'csl' => $request['csl'],
                't4hs' => $request['t4hs'],
                'sdw' => $request['sdw'],
                'lc' => $request['lc'],
            ],
            'RESEARCH_&_EDUCATION' => [
                'dmc' => $request['dmc'],
                'ntts' => $request['ntts'],
                'ac' => $request['ac'],
                'tcr' => $request['tcr'],
                'dr' => $request['dr'],
                'act' => $request['act'],
                'webinar' => $request['webinar'],
                've' => $request['ve'],
                'ec' => $request['ec'],
            ],
            'PROMOTIONS' => [
                'promotion' => $request['promotion'],
                'rr' => $request['rr'],
                'link' => $request['link'],

            ],
        ];
        $request = $request->only(
            'data',
            'image',
            'img',
            'id',
            'is_active',
            'category_id'
        );
        $request['user_id'] = auth()->user()->id;

        if (isset($request['is_active'])) {
            $request['is_active'] = 1;
        } else {
            $request['is_active'] = 0;
        }
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        unset($request['image']);
//        dd($request);
        try {
            Broker::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Broker Updated Successfully' : 'Lecture Broker Successfully';
            return redirect(route('admin.broker.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $post = Broker::findOrFail($id);
            $post->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Broker deleted successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Broker Not Found.']);
        }
    }

    private function all(): string
    {

        $post = Broker::with('category','user',)->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
         <th>Sr#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Reviews</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($post) > 0) {
            foreach ($post as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td><img  src="'.asset($val->img).'" alt="No image" width="100px"></td>';
                $data .= '<td class="width-20">' . $val->data['COMPANY_INFORMATION']['name'] . '</td>';
                $data .= '<td class="width-20">' . $val['category']['name'] . '</td>';
                $data .= '<td class="width-20">' . $val['user']['fullName'] . '</td>';
                $data .= '<td class="width-20">Reviews</td>';
                $data .= '<td class="width-15">' . DateToHumanformat($val->created_at) . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td>' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td>' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-20">
                     <a class="pr-2" href="' . route('admin.broker.show', $val->id) . '" title="View"><i class="fa-solid fa-circle-info" style="color: #d292d3;"></i></a>';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.broker.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.broker.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.broker.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.broker.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }

    public function saveImage($image, $img)
    {
        $ext = $image->getClientOriginalExtension();
        $ext = strtolower($ext);
//        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'svg' || $ext == 'webp'){
        if (!is_null($img)) {
            $path = public_path($img);
            if (is_file($path)) {
                unlink($path);
            }
        }
        $path = 'assets/front/uploads/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $i = $image->move($path, $profileImage);
        return $path . $profileImage;
//        }
    }


    public function uploadCkImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }


    private function sortData($id): string
    {
        if ($id == "-1") {
            $Broker = Broker::with('category')->get();
        } else {

            $Broker = Broker::where('category_id', $id)->with('category')->get();
        }

        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($Broker) > 0) {
            foreach ($Broker as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-20">' . $val->title . '</td>';
                $data .= '<td class="width-20">' . $val['category']->name . '</td>';
                $data .= '<td class="width-20">Comments</td>';
                $data .= '<td class="width-20">' . \Carbon\Carbon::parse($val->created_at)->format('d/m/Y h:i') . '</td>';
                if ($val->is_active == 0) {
                    $data .= '<td>' . "<span>De-Active</span>" . '</td>';
                } else {
                    $data .= '<td>' . "<span>Active</span>" . '</td>';
                }
                $data .= '<td class="width-20">
                     <a class="pr-2" href="' . route('admin.broker.show', $val->slug) . '" title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>';
                if ($val->is_active == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.broker.changeStatus', $val->id) . '" title="Active"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.broker.changeStatus', $val->id) . '" title="De-Active"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.broker.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.broker.destroy', $val->id) . '" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }
}
