<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Create users',
                'slug' => 'create.users',
                'description' => 'Create users', // optional
            ],
            [
                'name' => 'Delete users',
                'slug' => 'delete.users',
                'description' => 'Delete users', // optional
            ],
            [
                'name' => 'Edit users',
                'slug' => 'edit.users',
                'description' => 'Edit users', // optional
            ],
            [
                'name' => 'Create Customers',
                'slug' => 'create.customers',
                'description' => 'Create Customers', // optional
            ],
            [
                'name' => 'Delete Customers',
                'slug' => 'delete.customers',
                'description' => 'Delete Customers', // optional
            ],
            [
                'name' => 'Edit Customers',
                'slug' => 'edit.customers',
                'description' => 'Edit Customers', // optional
            ],
            [
                'name' => 'Create Orders',
                'slug' => 'create.orders',
                'description' => 'Create Orders', // optional
            ],
            [
                'name' => 'Cancel Orders',
                'slug' => 'cancel.orders',
                'description' => 'Cancel Orders', // optional
            ],
            [
                'name' => 'Delete Rollovers',
                'slug' => 'delete.rollovers',
                'description' => 'Delete Rollovers', // optional
            ],
            [
                'name' => 'Create Rollovers',
                'slug' => 'create.rollovers',
                'description' => 'Create Rollovers', // optional
            ],
        ];

        $adminRole = Role::find(2); // Attach all permissions to Admin

        foreach($permissions as $permission){
        	$rolePermission = Permission::create($permission);
            $adminRole->attachPermission($rolePermission);
        }

        $cashierPermissions = Permission::find([4,6,7]);
        $cashierRole = Role::find(1); // Attach all permissions to Cashier

        foreach($cashierPermissions as $cashierPermission){
            $cashierRole->attachPermission($cashierPermission);
        }


    }
}
