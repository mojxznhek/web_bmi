<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list bariophysicians']);
        Permission::create(['name' => 'view bariophysicians']);
        Permission::create(['name' => 'create bariophysicians']);
        Permission::create(['name' => 'update bariophysicians']);
        Permission::create(['name' => 'delete bariophysicians']);

        Permission::create(['name' => 'list children']);
        Permission::create(['name' => 'view children']);
        Permission::create(['name' => 'create children']);
        Permission::create(['name' => 'update children']);
        Permission::create(['name' => 'delete children']);

        Permission::create(['name' => 'list childcheckupinfos']);
        Permission::create(['name' => 'view childcheckupinfos']);
        Permission::create(['name' => 'create childcheckupinfos']);
        Permission::create(['name' => 'update childcheckupinfos']);
        Permission::create(['name' => 'delete childcheckupinfos']);

        Permission::create(['name' => 'list healthcategories']);
        Permission::create(['name' => 'view healthcategories']);
        Permission::create(['name' => 'create healthcategories']);
        Permission::create(['name' => 'update healthcategories']);
        Permission::create(['name' => 'delete healthcategories']);

        Permission::create(['name' => 'list allhealthtips']);
        Permission::create(['name' => 'view allhealthtips']);
        Permission::create(['name' => 'create allhealthtips']);
        Permission::create(['name' => 'update allhealthtips']);
        Permission::create(['name' => 'delete allhealthtips']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
