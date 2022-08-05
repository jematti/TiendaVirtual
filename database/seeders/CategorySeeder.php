<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nombre_categoria' => 'Publicaciones',
            'descripcion' => 'Publicaciones de FC-BCB'
        ]);

        // DB::table('categories')->insert([
        //     'nombre_categoria' => 'Boletin',
        //     'descripcion' => 'El Boletín Bibliográfico reúne todos los registros ingresados en el período consignado: publicaciones monográficas, trabajos de investigación y extensión de investigadores del CURZA, trabajos finales y tesis de alumnos, además de las publicaciones periódicas recibidas.'
        // ]);
    }
}
