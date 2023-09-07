<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionsRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Permissions';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.permissions.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Permissions'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.permissions.index', [
                'permissions' => Permission::all(),

            ]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
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

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Permission' : 'Edit Permission');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try {
            if ($id == 0) {
                $permission = new permission();
            } else {
                $permission = permission::findOrFail($id);
            }
            return view('admin.permissions.edit', [
                'permission' => $permission,
                'permissions' => Permission::all(),
                'guards' => ['web', 'admin'],
                'action' => route('admin.permissions.update', $id),
            ]);
        } catch (Exception $exception) {
            return redirect()->route('admin.home')->with('error', $exception->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionsRequest $permissionsRequest, $id)
    {
        $data = $permissionsRequest->only('name', 'guard_name');
        try {
            Permission::updateOrCreate(['id' => $id], $data);
            $message = $id > 0 ? 'Permissions Updated Successfully' : 'Permission Added Successfully';
            return redirect(route('admin.permissions.index'))->with('success', $message);
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
            $permissions = Permission::findOrFail($id);
            $permissions->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Permission deleted successfully.', 'data' => $data]);
        } catch (Exception $exception) {
            return response()->json(['msg' => 'Permission Not Found.']);
        }
    }

    private function all(): string
    {
        $permissions = Permission::all();
        $data = '<table id="dataTable" class="datatable table table-stripped"><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if (count($permissions) > 0) {
            foreach ($permissions as $key => $val) {
                $data .= '<tr><td class="width-10">' . ($key + 1) . '</td>';
                $data .= '<td class="width-15">' . $val->name . '</td>';
                $data .= '<td class="width-15">' . $val->guard_name . '</td>';
                $data .= '<td class="width-15">' . $val->created_at . '</td>';
                $data .= '<td class="width-15">' . $val->updated_at . '</td>';
                $data .= '<td class="width-15"><a class="pr-2" href="' . route('admin.permissions.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.permissions.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';            }
        } else {
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }
}
