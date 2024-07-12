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
        
        //Crear roles
        $superAdmin = Role::factory()->create([
            'name' => 'Super Admin',
        ]);
        $admin = Role::factory()->create([
            'name' => 'Admin',
        ]);
        $employee = Role::factory()->create([
            'name' => 'Empleado',
        ]);

        //Crear usuarios
        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'email' => 'jrchirinos@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $superAdmin->id,
            'id_company' => null,
        ]);

        User::factory()->create([
            'name' => 'Admin Vanwardia',
            'email' => 'admin_vanwardia@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $admin->id, //Asignar role de usuario
            'id_company' => 26, //Vanwardia
        ]);

        User::factory()->create([
            'name' => 'Empleado Vanwardia',
            'email' => 'empleado_vanwardia@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $employee->id, //Asignar role de usuario
            'id_company' => 26, //Vanwardia
        ]);

        User::factory()->create([
            'name' => 'Admin Martin',
            'email' => 'admin_martin@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $admin->id, //Asignar role de usuario
            'id_company' => 8, //Martin
        ]);

        User::factory()->create([
            'name' => 'Empleado Martin',
            'email' => 'empleado_martin@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $employee->id, //Asignar role de usuario
            'id_company' => 8, //Martin
        ]);


        //Permisos de usuarios

        //AUTOPERIFERIA
        Permission::factory()->create([
            'description' => 'Autoperiferia',
            'id_company' => 21,
        ]);
        Permission::factory()->create([
            'description' => 'Fichajes',
            'id_company' => 21, //Autoperiferia
        ]);
        Permission::factory()->create([
            'description' => 'Conducción Eficiente',
            'id_company' => 21, //Autoperiferia
        ]);
        Permission::factory()->create([
            'description' => 'Operaciones',
            'id_company' => 21, //Autoperiferia
        ]);


        //BAJAJOZ (UNAUTO)
        Permission::factory()->create([
            'description' => 'Badajoz',
            'id_company' => 10,
        ]);
        Permission::factory()->create([
            'description' => 'Informe de Cámara',
            'id_company' => 10, //Unauto
        ]);


        //CASCAIS
        Permission::factory()->create([
            'description' => 'Cascais',
            'id_company' => 23,
        ]);
        Permission::factory()->create([
            'description' => 'Informe de Cámara',
            'id_company' => 23, //Cascais
        ]);


        //MARTIN
        Permission::factory()->create([
            'description' => 'Martin',
            'id_company' => 8,
        ]);
        Permission::factory()->create([
            'description' => 'Fichajes',
            'id_company' => 8, //Martin
        ]);
        Permission::factory()->create([
            'description' => 'Conducción Eficiente',
            'id_company' => 8, //Martin
        ]);
        Permission::factory()->create([
            'description' => 'Operaciones',
            'id_company' => 8, //Martin
        ]);
        Permission::factory()->create([
            'description' => 'Ruade',
            'id_company' => 8,
        ]);


        //RUIZ
        Permission::factory()->create([
            'description' => 'Ruiz',
            'id_company' => 9,
        ]);
        Permission::factory()->create([
            'description' => 'Fichajes',
            'id_company' => 9, //Ruiz
        ]);
        Permission::factory()->create([
            'description' => 'Conducción Eficiente',
            'id_company' => 9, //Ruiz
        ]);
        Permission::factory()->create([
            'description' => 'Operaciones',
            'id_company' => 9, //Ruiz
        ]);


        //MALLORCA
        Permission::factory()->create([
            'description' => 'Mallorca',
            'id_company' => 22,
        ]);
        Permission::factory()->create([
            'description' => 'Fichajes',
            'id_company' => 22, //Mallorca
        ]);
        Permission::factory()->create([
            'description' => 'Conducción Eficiente',
            'id_company' => 22, //Mallorca
        ]);
        Permission::factory()->create([
            'description' => 'Operaciones',
            'id_company' => 22, //Mallorca
        ]);


        //SALAMANCA
        Permission::factory()->create([
            'description' => 'Salamanca',
            'id_company' => 7,
        ]);
        Permission::factory()->create([
            'description' => 'Fichajes',
            'id_company' => 7, //Salamanca
        ]);
        Permission::factory()->create([
            'description' => 'Conducción Eficiente',
            'id_company' => 7, //Salamanca
        ]);
        Permission::factory()->create([
            'description' => 'Operaciones',
            'id_company' => 7, //Salamanca
        ]);


        //VANWARDIA
        Permission::factory()->create([
            'description' => 'Vanwardia',
            'id_company' => 26,
        ]);
        Permission::factory()->create([
            'description' => 'Busme',
            'id_company' => 26, //Vanwardia
        ]);
        Permission::factory()->create([
            'description' => 'Minits',
            'id_company' => 26, //Vanwardia
        ]);
    }
}
