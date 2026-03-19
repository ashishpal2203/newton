<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view dashboard',
            'manage settings',
            'manage users',
            'manage pages',
            'manage media',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign created permissions

        // Viewer gets only dashboard view
        $viewerRole = Role::findOrCreate('Viewer', 'web');
        $viewerRole->givePermissionTo('view dashboard');

        // Editor gets content and media
        $editorRole = Role::findOrCreate('Editor', 'web');
        $editorRole->givePermissionTo(['view dashboard', 'manage pages', 'manage media']);

        // Admin gets everything
        $adminRole = Role::findOrCreate('Admin', 'web');
        $adminRole->givePermissionTo(Permission::all());

        // Manager gets everything except manage settings
        $managerRole = Role::findOrCreate('Manager', 'web');
        $managerRole->givePermissionTo(['view dashboard', 'manage users', 'manage pages', 'manage media']);
    }
}
