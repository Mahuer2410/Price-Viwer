<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que el rol admin ya existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Asignar el rol admin al primer usuario
        $user = User::find(1); // Encuentra al primer usuario
        if ($user) {
            $user->assignRole($adminRole); // Asigna el rol admin
        }
    }
}
