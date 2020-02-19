<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions.
        app()['cache']->forget('spatie.permission.cache');

        // Create Permissions.
        $defaultActions = collect([
            'index' => 'See All',
            'create' => 'Create',
            'store' => 'Store',
            'show' => 'View',
            'edit' => 'Edit',
            'update' => 'Update',
            'destroy' => 'Delete',
        ]);

        $entitiesTables = collect([
            'users',
        ]);

        foreach ($entitiesTables as $entity) {
            foreach ($defaultActions as $action => $actionDescription) {
                Permission::create([
                    'label' => $actionDescription.' '.studly_case($entity),
                    'name' => $action.'.'.$entity,
                ]);
            }
        }

        // Create Roles.
        collect([
            [
                'role' => [
                    'name' => 'admin',
                    'label' => 'Administrator',
                ],
                'permissions' => Permission::pluck('name')->toArray(),
            ],
            [
                'role' => [
                    'name' => 'agent',
                    'label' => 'Agent',
                ],
                'permissions' => [],
            ],
            [
                'role' => [
                    'name' => 'client',
                    'label' => 'Client',
                ],
                'permissions' => [],
            ],
        ])->each(function ($item) {
            $role = Role::create($item['role']);

            foreach ($item['permissions'] as $permission) {
                $role->givePermissionTo($permission);
            }
        });
    }
}
