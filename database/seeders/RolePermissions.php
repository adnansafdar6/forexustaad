<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_permissions')->truncate();
        Role::insert([
            'name' => 'Super Admin',
            'guard_name' => 'admin'
        ]);
        $permissions = [
            ['id' => 1, 'name' => 'admin.roles.index', 'guard_name' => 'admin'],
            ['id' => 2, 'name' => 'admin.roles.edit', 'guard_name' => 'admin'],
        ];
        Permission::insert($permissions);
        $data = [];
        foreach ($permissions as $key => $permission){
            $role_permission = ['role_id' => 1, 'permission_id' => $permission['id']];
            array_push($data, $role_permission);
        }
        DB::table('role_permissions')->insert($data);
    }
}
