<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'applier']);
        $role->givePermissionTo(Permission::all());

        // Assign roles to demo users
        $superadmin = new User();
        $superadmin->name = "waqar";
        $superadmin->email = "waqar@gmail.com";
        $superadmin->password = Hash::make("test1234");
        
        $superadmin->assignRole('super-admin');
        $superadmin->save();
        // applier
        $applier = new User();
        $applier->name = "employe1";
        $applier->email = "employe1@gmail.com";
        $applier->password = Hash::make("test1234");
        
        $applier->assignRole('applier');
        $applier->save();

    }
}

