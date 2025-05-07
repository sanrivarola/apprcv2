<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasInventarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('area_inventario')->delete(); // Evita duplicados

        DB::table('area_inventario')->insert([
            ['id' => 1, 'nombre' => 'Casa Central'],
            ['id' => 2, 'nombre' => 'Salasur'],
            ['id' => 3, 'nombre' => 'Galpon'],
            ['id' => 6, 'nombre' => 'Area verde'],
        ]);
    }
}
