<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos específicos
        $companies = [
            ['id' => 8, 'empresa' => 'EMPRESA MARTIN', 'mid' => 8, 'rowid' => null, 'idempresa' => 8, 'foto' => null, 'razonsocial' => 'EMPRESA MARTÍN', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 9, 'empresa' => 'RUIZ', 'mid' => 9, 'rowid' => null, 'idempresa' => 9, 'foto' => null, 'razonsocial' => 'GRUPO RUIZ', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 6, 'empresa' => 'TULINARES', 'mid' => 6, 'rowid' => null, 'idempresa' => 6, 'foto' => null, 'razonsocial' => 'AUTOBUSES DE LINARES', 'cif' => 'B-84358456', 'direccion' => 'POL.IND.LOS JARALES II S/N', 'poblacion' => 'LINARES', 'codpostal' => '23700', 'provincia' => 'JAEN'],
            ['id' => 26, 'empresa' => 'MINITS', 'mid' => 26, 'rowid' => null, 'idempresa' => 26, 'foto' => null, 'razonsocial' => 'MINITS BADAJOZ', 'cif' => '', 'direccion' => 'MINITS', 'poblacion' => 'BADAJOZ', 'codpostal' => '0', 'provincia' => 'BADAJOZ'],
            ['id' => 21, 'empresa' => 'AUTOPERIFERIA', 'mid' => 21, 'rowid' => null, 'idempresa' => 21, 'foto' => null, 'razonsocial' => 'AUTOPERIFERIA', 'cif' => null, 'direccion' => 'NEPTUNO, 6', 'poblacion' => 'VILLANUEVA DEL PARDILLO', 'codpostal' => null, 'provincia' => null],
            ['id' => 7, 'empresa' => 'SALAMANCA', 'mid' => 7, 'rowid' => null, 'idempresa' => 7, 'foto' => null, 'razonsocial' => 'SALAMANCA', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 10, 'empresa' => 'UNAUTO', 'mid' => 10, 'rowid' => null, 'idempresa' => 10, 'foto' => null, 'razonsocial' => 'UNAUTO', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 22, 'empresa' => 'MALLORCA', 'mid' => 22, 'rowid' => null, 'idempresa' => 22, 'foto' => null, 'razonsocial' => 'MALLORCA', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 3, 'empresa' => 'TUBASA', 'mid' => 3, 'rowid' => null, 'idempresa' => 3, 'foto' => null, 'razonsocial' => 'BADAJOZ', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 14, 'empresa' => 'MURCIA', 'mid' => 14, 'rowid' => null, 'idempresa' => 14, 'foto' => null, 'razonsocial' => 'MURCIA', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 1, 'empresa' => 'AUTASA', 'mid' => 1, 'rowid' => null, 'idempresa' => 1, 'foto' => null, 'razonsocial' => 'TANGER', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
            ['id' => 23, 'empresa' => 'CASCAIS', 'mid' => 24, 'rowid' => null, 'idempresa' => 24, 'foto' => null, 'razonsocial' => 'CASCAIS', 'cif' => null, 'direccion' => null, 'poblacion' => null, 'codpostal' => null, 'provincia' => null],
        ];

        foreach ($companies as $company) {
            Company::factory()->create($company);
        }
    }
}