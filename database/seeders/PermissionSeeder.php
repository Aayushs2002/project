<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permission = [
            'create news',
            'read news',
            'update news',
            'delete news',
            'create category',
            'read category',
            'update category',
            'delete category',
        ];

        Permission::insert($permission);


    }
}
