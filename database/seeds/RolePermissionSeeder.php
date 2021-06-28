<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableNames = config('permission.table_names');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($tableNames['role_has_permissions'])->truncate();
        DB::table($tableNames['model_has_roles'])->truncate();
        DB::table($tableNames['model_has_permissions'])->truncate();
        DB::table($tableNames['roles'])->truncate();
        DB::table($tableNames['permissions'])->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'update-settings',

            'view-admin',
            'create-admin',
            'update-admin',
            'destroy-admin',

            'view-auction',
            'create-auction',
            'update-auction',
            'destroy-auction',

            'view-category',
            'create-category',
            'update-category',
            'destroy-category',

            'view-slider',
            'create-slider',
            'update-slider',
            'destroy-slider',

            'view-user',
            'create-user',
            'update-user',
            'destroy-user',

            'view-type',
            'create-type',
            'update-type',
            'destroy-type',

            'view-wallet',
            'create-wallet',

            'view-transaction',
            'show-transaction',

            'view-contactus',
            'show-contactus',

            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',

            'view-activity-log',

            'view-refund-request',
            'create-refund-request',
            'update-refund-request',
            'destroy-refund-request',

            'view-donation',
            'create-donation',
            'update-donation',
            'destroy-donation',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'display_name' => $permission, 'guard_name' => 'admin']);
        }

        // Create Super user & role
        $admin = Role::create(['name' => 'super-admin', 'display_name' => 'super-admin', 'guard_name' => 'admin']);
        $admin->syncPermissions($permissions);

        $usr = Admin::query()->firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@email.com'
        ], [
            'password' => '123456789',
            'status' => true,
            'phone_number' => '+201003003200',
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);

        $usr->syncPermissions($permissions);

        // Create user & role
        $role = Role::create(['name' => 'user', 'display_name' => 'user', 'guard_name' => 'admin']);
        $role->givePermissionTo('update-settings');
        $role->givePermissionTo('view-admin');

        $user = Admin::query()->firstOrCreate([
            'name' => 'User',
            'email' => 'user@email.com',
        ], [
            'password' => '123456789',
            'status' => true,
            'phone_number' => '+201003003201',
            'email_verified_at' => now(),
        ]);

        $user->assignRole($role);
    }
}
