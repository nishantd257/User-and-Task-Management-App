<?php



namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'mobile'=>'0123456789',
            'password'=>bcrypt('password'),
            //'profile' => 'user.avif'
        ]);

        $writer = User::create([
            'name'=>'writer',
            'email'=>'writer@admin.com',
            'mobile'=>'9876543210',
            'password'=>bcrypt('password')
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'writer']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Task access']);
        $permission = Permission::create(['name' => 'Task edit']);
        $permission = Permission::create(['name' => 'Task create']);
        $permission = Permission::create(['name' => 'Task delete']);

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);

        $admin_role->syncPermissions(Permission::all());

        $writer_permissions = [
            'Task access',
            'Task create'
        ];

        foreach ($writer_permissions as $permission) {
            $writer_role->givePermissionTo($permission);
        }
    }
}




