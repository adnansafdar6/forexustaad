<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Role';
        $this->breadcrumbs[route('admin.home')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.role.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Role'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.index', [
            'role' => Role::all(),

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

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Role' : 'Edit Role');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        if ($id == 0) {
            $role = new Role();
        } else {
            $role = Role::findOrFail($id);
        }
        return view('admin.role.edit', [
            'role' => $role,
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'guards' => ['web', 'admin'],

            'action' => route('admin.role.update', $id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $roleRequest, $id)
    {
        $data = $roleRequest->only('name', 'guard_name', 'permissions');

        $role = Role::updateOrCreate(['id' => $id], $data);
        $role->permissions()->sync($data['permissions']);
        $message = $id > 0 ? 'Role Updated Successfully' : 'Role Added Successfully';
        return redirect(route('admin.role.index'))->with('success', $message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
           $role= Role::findOrFail($id);
            $role->delete();
            $data = $this->all();
            return response()->json(['msg' => 'Role deleted successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'Role Not Found.']);
        }
    }

    private function all(): string
    {
        $role = Role::all();
        $data = '<table id="dataTable" class="datatable table table-stripped" ><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if(count($role) > 0){
            foreach ($role as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-15">'.$val->name.'</td>';
                $data .= '<td class="width-15">'.$val->guard_name.'</td>';
                $data .= '<td class="width-15">'.$val->created_at.'</td>';
                $data .= '<td class="width-15">'.$val->updated_at.'</td>';
                $data .= '<td class="width-15"><a class="pr-2" href="' . route('admin.role.edit', $val->id) . '" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                     <a href="javascript:{};" data-url="' . route('admin.role.destroy', $val->id) . '" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a></td></tr>';
            }
        } else{
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        return $data;
    }
}
