<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
            'supplier-list',
            'category-create',
            'category-edit',
            'category-delete'
        ];

      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }
    }
}
