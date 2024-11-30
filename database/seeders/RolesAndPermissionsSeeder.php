<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Define roles
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Help Desk']);
        Role::create(['name' => 'Fulfillment Desk']);
        Role::create(['name' => 'Data Entry Operator']);
        Role::create(['name' => 'Accounts']);
        Role::create(['name' => 'Franchise']);
        Role::create(['name' => 'Franchise Team Member']);
    }
}

