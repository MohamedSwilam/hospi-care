<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = config('permissions');
        $roles = config('roles');

        Model::unguard();

        foreach ($permissions as $group_key => $permission_group) {
            foreach ($permission_group as $key=>$permission) {
                $record = Permission::where('name', $permission['name'])->first();
                if (!$record) {
                    $permission['group'] = $group_key;
                    Permission::create($permission);
                }
            }
        }

        foreach ($roles as $role){
            $record = Role::where('name', $role['name'])->first();
            if (!$record) {
                Role::create($role);
            }
        }

        $role = Role::where('name', 'Super Admin')->first();
        $role->givePermissionTo(Permission::all());
    }
}
