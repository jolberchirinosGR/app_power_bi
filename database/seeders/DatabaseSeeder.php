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

        // Crear usuarios
        User::factory()->create([
            'name' => 'Jolber Chirinos',
            'email' => 'jrchirinos@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $superAdmin->id,
            'id_company' => null,
        ]);

        User::factory()->create([
            'name' => 'Admin Martin',
            'email' => 'admin_martin@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $admin->id,
            'id_company' => 8, // Martin
        ]);

        User::factory()->create([
            'name' => 'Empleado Martin',
            'email' => 'empleado_martin@gruporuiz.com',
            'password' => bcrypt(12345678),
            'id_role' => $employee->id,
            'id_company' => 8, // Martin
        ]);

        // Permisos de usuarios

        // AUTASA
        $autasaPermissions = [
            'Autasa - A3',
            'Autasa - Conducción Eficiente',
            'Autasa - Fichajes',
            'Autasa - Formación',
            'Autasa - Gnesis',
            'Autasa - Monética',
            'Autasa - SAE',
        ];
        foreach ($autasaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 1, // autasa
            ]);
        }

        // AUTOPERIFERIA
        $autoperiferiaPermissions = [
            'Autoperiferia - A3',
            'Autoperiferia - Conducción Eficiente',
            'Autoperiferia - Fichajes',
            'Autoperiferia - Formación',
            'Autoperiferia - Gnesis',
            'Autoperiferia - Monética',
            'Autoperiferia - SAE',
        ];
        foreach ($autoperiferiaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 21, // Autoperiferia
            ]);
        }

        // CASCAIS
        $cascaisPermissions = [
            'Cascais - A3',
            'Cascais - Conducción Eficiente',
            'Cascais - Fichajes',
            'Cascais - Formación',
            'Cascais - Gnesis',
            'Cascais - Monética',
            'Cascais - SAE',
        ];
        foreach ($cascaisPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 23, // Cascais
            ]);
        }

        // MARTIN
        $martinPermissions = [            
            'Martin - A3',
            'Martin - Conducción Eficiente',
            'Martin - Fichajes',
            'Martin - Formación',
            'Martin - Gnesis',
            'Martin - Monética',
            'Martin - SAE',
        ];
        foreach ($martinPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 8, // Martin
            ]);
        }

        // RUIZ
        $ruizPermissions = [            
            'Ruiz - A3',
            'Ruiz - Conducción Eficiente',
            'Ruiz - Fichajes',
            'Ruiz - Formación',
            'Ruiz - Gnesis',
            'Ruiz - Monética',
            'Ruiz - SAE',
        ];
        foreach ($ruizPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 9, // Ruiz
            ]);
        }

        // GNESIS
        $gnesisPermissions = [
            'Gnesis General',
        ];
        foreach ($gnesisPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => null, //Para todos
            ]);
        }

        // LINARES
        $linaresPermissions = [            
            'Linares - A3',
            'Linares - Conducción Eficiente',
            'Linares - Fichajes',
            'Linares - Formación',
            'Linares - Gnesis',
            'Linares - Monética',
            'Linares - SAE',
        ];
        foreach ($linaresPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 6, //Linares
            ]);
        }

        // MALLORCA
        $mallorcaPermissions = [            
            'Mallorca - A3',
            'Mallorca - Conducción Eficiente',
            'Mallorca - Fichajes',
            'Mallorca - Formación',
            'Mallorca - Gnesis',
            'Mallorca - Monética',
            'Mallorca - SAE',
        ];
        foreach ($mallorcaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 22, // Mallorca
            ]);
        }

        // MURCIA
        $murciaPermissions = [            
            'Murcia - A3',
            'Murcia - Conducción Eficiente',
            'Murcia - Fichajes',
            'Murcia - Formación',
            'Murcia - Gnesis',
            'Murcia - Monética',
            'Murcia - SAE',
        ];
        foreach ($murciaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 14, // MURCIA
            ]);
        }

        // Operaciones
        $operacionesPermissions = [            
            'Operaciones - Conducción Eficiente',
            'Operaciones - Gnesis',
            'Operaciones - Monética',
            'Operaciones - SAE',
        ];
        foreach ($operacionesPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => null, 
            ]);
        }

        // RRHH
        $rrhhPermissions = [            
            'RRHH - A3',
            'RRHH - Factorial',
            'RRHH - Fichaje',
            'RRHH - Formación',
            'RRHH - Jurídico',
        ];
        foreach ($rrhhPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => null,
            ]);
        }

        // TUBASA
        $tubasaPermissions = [            
            'Tubasa - A3',
            'Tubasa - Factorial',
            'Tubasa - Fichaje',
            'Tubasa - Formación',
            'Tubasa - Jurídico',
        ];
        foreach ($tubasaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 3,
            ]);
        }

        // SALAMANCA
        $salamancaPermissions = [            
            'Salamanca - A3',
            'Salamanca - Conducción Eficiente',
            'Salamanca - Fichajes',
            'Salamanca - Formación',
            'Salamanca - Gnesis',
            'Salamanca - Monética',
            'Salamanca - SAE',
        ];
        foreach ($salamancaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 7, // Salamanca
            ]);
        }

        // UNAUTO
        $UnautoPermissions = [            
            'Unauto - A3',
            'Unauto - Conducción Eficiente',
            'Unauto - Fichajes',
            'Unauto - Formación',
            'Unauto - Gnesis',
            'Unauto - Monética',
            'Unauto - SAE',
        ];
        foreach ($UnautoPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 10, // Unauto
            ]);
        }

        // VANWARDIA
        $vanwardiaPermissions = [
            'Vanwardia - Busme',
            'Vanwardia - Minits'
        ];
        foreach ($vanwardiaPermissions as $description) {
            Permission::factory()->create([
                'description' => $description,
                'id_company' => 26, // Vanwardia
            ]);
        }


        //Nuevos usuarios espesificos para la plataforma de las distintas sedes
                User::factory()->create([
                    'name' => 'Luis Alberto Egido',
                    'email' => 'laemontero@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 9, // Martín/Ruiz
                ]);
        
                User::factory()->create([
                    'name' => 'David Bonilla',
                    'email' => 'dbonilla@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Martín/Ruiz
                ]);
        
                User::factory()->create([
                    'name' => 'John Herrera',
                    'email' => 'jherrera@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 21, // Auto Periferia
                ]);
        
                User::factory()->create([
                    'name' => 'Diego Polo',
                    'email' => 'diegopolo@autoperiferia.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 21, // Auto Periferia
                ]);
        
                User::factory()->create([
                    'name' => 'Javier Badorrey',
                    'email' => 'jbadorrey@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 22, // Martín Mallorca
                ]);
        
                User::factory()->create([
                    'name' => 'Toni Dengra',
                    'email' => 'tallermallorca@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 22, // Martín Mallorca
                ]);
        
                User::factory()->create([
                    'name' => 'Iván Exquerra',
                    'email' => 'tallermallorca2@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 22, // Martín Mallorca
                ]);
        
                User::factory()->create([
                    'name' => 'Julián Pocostales',
                    'email' => 'jpocostales@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 6, // Tubasa
                ]);
        
                User::factory()->create([
                    'name' => 'Antonio Miranda',
                    'email' => 'amiranda@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 6, // Tubasa
                ]);
        
                User::factory()->create([
                    'name' => 'Jose María Lozano',
                    'email' => 'jmlozano@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 14, // Murcia
                ]);
        
                User::factory()->create([
                    'name' => 'Victor Hugo',
                    'email' => 'taller@tmurcia.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 14, // Murcia
                ]);
        
                User::factory()->create([
                    'name' => 'Miguel Alconchel',
                    'email' => 'malconchel@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 10, // Unauto
                ]);
        
                User::factory()->create([
                    'name' => 'Eduardo Ventura',
                    'email' => 'taller.unauto@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 10, // Unauto
                ]);
        
                User::factory()->create([
                    'name' => 'Enrique Barragán',
                    'email' => 'ebarragan@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 6, // Linares
                ]);
        
                User::factory()->create([
                    'name' => 'Cristián Fernández',
                    'email' => 'tallerlinares@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 6, // Linares
                ]);
        
                User::factory()->create([
                    'name' => 'Alfredo Ibáñez',
                    'email' => 'alibaesc@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 7, // Salamanca
                ]);
        
                User::factory()->create([
                    'name' => 'César Sánchez',
                    'email' => 'taller.salamanca.transporte@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 7, // Salamanca
                ]);
        
                User::factory()->create([
                    'name' => 'Diogo Ferreira',
                    'email' => 'dferreira@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $admin->id,
                    'id_company' => 23, // Cascais
                ]);
        
                User::factory()->create([
                    'name' => 'Gilberto Figueirido',
                    'email' => 'oficina_cascais@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 23, // Cascais
                ]);


                // O P E R A C I O N E S
                User::factory()->create([
                    'name' => 'David Gomez',
                    'email' => 'dgomez@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Cascais
                ]);
                User::factory()->create([
                    'name' => 'Pablo Caballero',
                    'email' => 'pcaballero@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Cascais
                ]);
                User::factory()->create([
                    'name' => 'Julia Lopez',
                    'email' => 'jlopez@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Cascais
                ]);
                User::factory()->create([
                    'name' => 'Carmelo Manresa',
                    'email' => 'crmanresa@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Cascais
                ]);
                User::factory()->create([
                    'name' => 'Belén Gonzalez',
                    'email' => 'bgonzalez@gruporuiz.com',
                    'password' => bcrypt(12345678),
                    'id_role' => $employee->id,
                    'id_company' => 9, // Cascais
                ]);
                //F I N     D E    O P E R A C I O N E S
    }
}
