<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
        ]);
        
        // Crear roles
        $superAdmin = Role::factory()->create([
            'name' => 'Super Admin',
        ]);
        $admin = Role::factory()->create([
            'name' => 'Admin',
        ]);
        $employee = Role::factory()->create([
            'name' => 'Empleado',
        ]);

        // Crear más usuarios
        User::factory()->count(30)->create();

        // Crear usuarios
        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'email' => 'jrchirinos@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $superAdmin->id,
            'id_company' => null,
        ]);

        User::factory()->create([
            'name' => 'Alejandro Aceituno',
            'email' => 'aaceituno@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $superAdmin->id,
            'id_company' => null,
        ]);

        User::factory()->create([
            'name' => 'Admin Ejemplo',
            'email' => 'admin_test@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $admin->id, // Asignar role de usuario
            'id_company' => 21, // Autoperiferia
        ]);

        User::factory()->create([
            'name' => 'Empleado',
            'email' => 'empleado_test@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $employee->id, // Asignar role de usuario
            'id_company' => 21, // Autoperiferia
        ]);

        //Permisos de usuarios
        Permission::factory()->create([
            'description' => 'Monetica',
        ]);
        Permission::factory()->create([
            'description' => 'Busme',
        ]);
        Permission::factory()->create([
            'description' => 'Minits',
        ]);
        Permission::factory()->create([
            'description' => 'Autoperiferia',
        ]);
    }
}
