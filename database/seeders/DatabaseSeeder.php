<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $adminRole = Role::create(['name' => 'admin']);
        $categoryAdminRole = Role::create(['name' => 'category-admin']);

        $permissions = [
            'create news',
            'read news',
            'update news',
            'delete news',
            'create category',
            'read category',
            'update category',
            'delete category',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole->givePermissionTo(Permission::all());
        $categoryAdminRole->givePermissionTo(['create news', 'read news', 'update news', 'delete news']);
        // $superadmin->assignRole("admin");
    }
}
