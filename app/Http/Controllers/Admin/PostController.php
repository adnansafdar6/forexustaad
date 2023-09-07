<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Post';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.post.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Post'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index', [
            'post' => Post::with('category')->get(),
            'roles' => Role::all(),
            'categories' => Category::where('parent_id', 0)->where('name', 'post')->whereHas('subcategories')->with('subcategories')->get(),

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
        $post = Post::findOrFail($id);
        $post->is_feature = !$post->is_feature;
        $post->save();
        $message = $post->is_feature == 0 ? 'Post Down Successfully' : 'Post Up Successfully';
//        return response()->json([$message, 'data' => $products]);
        return redirect()->back()->with('success', $message);
    }

    public function status($id, $type)
    {
//        dd($id,$type);
        $message = "Post status changed";
        $table = Post::findOrFail($id);
        if ($table->status == 'pending' || $table->status == 'public') {
            $table->status = $type;
        } else {
            $message = "No action performed";
            return redirect()->back()->with('error', $message);
        }
        $table->save();
        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->pageHeading = ('Post View');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        return view('admin.post.view', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Post' : 'Edit Post');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $post = new Post();
        } else {
            $post = Post::findOrFail($id);
        }
        return view('admin.post.edit', [
            'post' => $post,
            'roles' => Role::all(),
            'categories' => Category::where('parent_id', 0)->where('name', 'post')->whereHas('subcategories')->with('subcategories')->get(),
            'action' => route('admin.post.update', $id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $roleRequest, $id)
    {
        $request = $roleRequest->except('_token', '_method');
//        dd($request);
        $random = random_int(10, 999);
        if (is_null($request['slug'])) {
            $request['slug'] = Str::slug($request['title'] . '-' . $random);
        } elseif ($id == 0) {
            $request['slug'] = Str::slug($request['slug'] . '-' . $random);
        }
//        dd($request);
        if (is_null($request['datetime'])) {
            $request['is_active'] = 1;
        } else {
            $request['is_active'] = 0;
        }
        if (!isset($request['is_feature'])) {
            $request['is_feature'] = 0;
        } else {
            $request['is_feature'] = 1;
        }
        if ((isset($request['img']))) {
            $request['img'] = $this->saveImage($request['img'], $request['image']);
        }
        unset($request['image']);
//        dd($request);
        try {
            Post::updateOrCreate(['id' => $id], $request);
            $message = $id > 0 ? 'Post Updated Successfully' : 'Post Added Successfully';
            return redirect(route('admin.post.index'))->with('success', $message);
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
            $post = Post::findOrFail($id);
            $post->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Post deleted successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Post Not Found.']);
        }
    }

    private function all(): string
    {

        $post = Post::with('category')->get();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr>
    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
</tr></thead><tbody>';
        if (count($post) > 0) {
            foreach ($post as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-20">' . $val->title . '</td>';
                $data .= '<td class="width-20">' . $val['category']->name . '</td>';
                $data .= '<td class="width-20">Comments</td>';
                $data .= '<td class="width-20">' . \Carbon\Carbon::parse($val->created_at)->format('d/m/Y h:i') . '</td>';

                if ($val->status == "pending") {
                    $data .= '<td class="width-20"><a href="' . route('admin.post.status', [$val->id, 'public']) . '" title="Public Now"><button class="btn btn-outline-danger">Public Now</button></a></td>';
                } else {
                    $data .= '<td class="width-20"><a href="' . route('admin.post.status', [$val->id, 'pending']) . '" title="Private Now"><button class="btn btn-outline-success">Private Now</button></a></td>';
                }

                $data .= '<td class="width-20">
                     <a class="pr-2" href="' . route('admin.post.show', $val->slug) . '" title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>';
                if ($val->is_feature == 1) {
                    $data .= ' <a class="pr-2" href="' . route('admin.post.changeStatus', $val->id) . '" title="Post Up"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>';
                } else {
                    $data .= ' <a class="pr-2" href="' . route('admin.post.changeStatus', $val->id) . '" title="Post Down"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>';
                }
                $data .= '<a class="pr-2" href="' . route('admin.post.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>';
                $data .= ' <a href="javascript:{};" data-url="' . route('admin.post.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
//
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
}


