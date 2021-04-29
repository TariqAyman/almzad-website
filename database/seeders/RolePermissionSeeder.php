<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
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
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'update-settings',
            'view-admin',
            'create-admin',
            'update-admin',
            'destroy-admin',
            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',
            'view-activity-log',
            'view-category',
            'create-category',
            'update-category',
            'destroy-category',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'display_name' => $permission, 'guard_name' => 'admin']);
        }

        // Create Super user & role
        $admin = Role::create(['name' => 'super-admin', 'display_name' => 'super-admin', 'guard_name' => 'admin']);
        $admin->syncPermissions($permissions);

        $usr = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => '12345678',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);

        $usr->syncPermissions($permissions);

        // Create user & role
        $role = Role::create(['name' => 'user', 'display_name' => 'user', 'guard_name' => 'admin']);
        $role->givePermissionTo('update-settings');
        $role->givePermissionTo('view-admin');

        $user = Admin::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => '12345678',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $user->assignRole($role);
    }
}
