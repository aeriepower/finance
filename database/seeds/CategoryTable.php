<?php

use Illuminate\Database\Seeder;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            array(
                'id' => 1,
                'name_en' => 'Compras',
                'name_es' => 'Compras',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 2,
                'name_en' => 'Ocio y transporte',
                'name_es' => 'Ocio y transporte',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 3,
                'name_en' => 'Vivienda y vehículo',
                'name_es' => 'Vivienda y vehículo',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 4,
                'name_en' => 'Salud, saber y deporte',
                'name_es' => 'Salud, saber y deporte',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 5,
                'name_en' => 'Servicios típicos',
                'name_es' => 'Servicios típicos',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 6,
                'name_en' => 'Seguros',
                'name_es' => 'Seguros',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 7,
                'name_en' => 'Bancos y organismos',
                'name_es' => 'Bancos y organismos',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 8,
                'name_en' => 'Gastos varios',
                'name_es' => 'Gastos varios',
                'parent_id' => null,
                'created_at' => Date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 9,
                'name_en' => 'Hogar, ferretería, cocina...',
                'name_es' => 'Hogar, ferretería, cocina...',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 10,
                'name_en' => 'Electrónica, informática...',
                'name_es' => 'Electrónica, informática...',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 11,
                'name_en' => 'Supermercado, alimentación',
                'name_es' => 'Supermercado, alimentación',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 12,
                'name_en' => 'Ropa, complementos',
                'name_es' => 'Ropa, complementos',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 13,
                'name_en' => 'Material deportivo',
                'name_es' => 'Material deportivo',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 14,
                'name_en' => 'Librería, papelería',
                'name_es' => 'Librería, papelería',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 15,
                'name_en' => 'Niños, mascotas',
                'name_es' => 'Niños, mascotas',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 16,
                'name_en' => 'Regalos',
                'name_es' => 'Regalos',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 17,
                'name_en' => 'Otras compras',
                'name_es' => 'Otras compras',
                'parent_id' => 1,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 18,
                'name_en' => 'Restaurantes, bares...',
                'name_es' => 'Restaurantes, bares...',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 19,
                'name_en' => 'Hotel, alojamiento',
                'name_es' => '',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 20,
                'name_en' => 'Transporte, avión, tren...',
                'name_es' => 'Transporte, avión, tren...',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 21,
                'name_en' => 'Alquiler vehículo',
                'name_es' => 'Alquiler vehículo',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 22,
                'name_en' => 'Espectáculos, cine, teatro...',
                'name_es' => 'Espectáculos, cine, teatro...',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 23,
                'name_en' => 'Gasolina',
                'name_es' => 'Gasolina',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 24,
                'name_en' => 'Parking, peaje',
                'name_es' => 'Parking, peaje',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 25,
                'name_en' => 'Loterías, apuestas...',
                'name_es' => 'Loterías, apuestas...',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 26,
                'name_en' => 'Otros ocio',
                'name_es' => 'Otros ocio',
                'parent_id' => 2,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 27,
                'name_en' => 'Alquiler',
                'name_es' => 'Alquiler',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 28,
                'name_en' => 'Comunidad',
                'name_es' => 'Comunidad',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 29,
                'name_en' => 'Servicio doméstico',
                'name_es' => 'Servicio doméstico',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 30,
                'name_en' => 'Mantenimiento hogar',
                'name_es' => 'Mantenimiento hogar',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 31,
                'name_en' => 'Vehículo, taller, ITV',
                'name_es' => 'Vehículo, taller, ITV',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 32,
                'name_en' => 'Compra vehículo',
                'name_es' => 'Compra vehículo',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 33,
                'name_en' => 'Otros vivienda',
                'name_es' => 'Otros vivienda',
                'parent_id' => 3,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 34,
                'name_en' => 'Farmacia',
                'name_es' => 'Farmacia',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 35,
                'name_en' => 'Belleza, peluquería, spa...',
                'name_es' => 'Belleza, peluquería, spa...',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 36,
                'name_en' => 'Óptica, dentista...',
                'name_es' => 'Óptica, dentista...',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 37,
                'name_en' => 'Médico, clínica...',
                'name_es' => 'Médico, clínica...',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 38,
                'name_en' => 'Deportes, actividades, club...',
                'name_es' => 'Deportes, actividades, club...',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 39,
                'name_en' => 'Estudios, colegio',
                'name_es' => 'Estudios, colegio',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 40,
                'name_en' => 'Asociaciones, federaciones',
                'name_es' => 'Asociaciones, federaciones',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 41,
                'name_en' => 'Solidaridad, ONG, ayudas',
                'name_es' => 'Solidaridad, ONG, ayudas',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 42,
                'name_en' => 'Otros salud',
                'name_es' => 'Otros salud',
                'parent_id' => 4,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 43,
                'name_en' => 'Internet, teléfono fijo',
                'name_es' => 'Internet, teléfono fijo',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 44,
                'name_en' => 'Teléfono móvil',
                'name_es' => 'Teléfono móvil',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 45,
                'name_en' => 'Electricidad',
                'name_es' => 'Electricidad',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 46,
                'name_en' => 'Gas',
                'name_es' => 'Gas',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 47,
                'name_en' => 'Agua',
                'name_es' => 'Agua',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 48,
                'name_en' => 'Alarma',
                'name_es' => 'Alarma',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 49,
                'name_en' => 'Televisión',
                'name_es' => 'Televisión',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 50,
                'name_en' => 'Servicios online',
                'name_es' => 'Servicios online',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 51,
                'name_en' => 'Otros servicios',
                'name_es' => 'Otros servicios',
                'parent_id' => 5,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 52,
                'name_en' => 'Seguros auto',
                'name_es' => 'Seguros auto',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 53,
                'name_en' => 'Seguros moto',
                'name_es' => 'Seguros moto',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 54,
                'name_en' => 'Seguros hogar',
                'name_es' => 'Seguros hogar',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 55,
                'name_en' => 'Seguros salud',
                'name_es' => 'Seguros salud',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 56,
                'name_en' => 'Seguros vida',
                'name_es' => 'Seguros vida',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 57,
                'name_en' => 'Seguros viaje',
                'name_es' => 'Seguros viaje',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 58,
                'name_en' => 'Seguros animales',
                'name_es' => 'Seguros animales',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 59,
                'name_en' => 'Otros seguros',
                'name_es' => 'Otros seguros',
                'parent_id' => 6,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 60,
                'name_en' => 'Hipoteca',
                'name_es' => 'Hipoteca',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 61,
                'name_en' => 'Préstamos',
                'name_es' => 'Préstamos',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 62,
                'name_en' => 'Gastos, comisiones...',
                'name_es' => 'Gastos, comisiones...',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 63,
                'name_en' => 'Impuestos',
                'name_es' => 'Impuestos',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 64,
                'name_en' => 'Ayuntamiento, tasas',
                'name_es' => 'Ayuntamiento, tasas',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 65,
                'name_en' => 'Seguridad social',
                'name_es' => 'Seguridad social',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 66,
                'name_en' => 'Multas, licencias',
                'name_es' => 'Multas, licencias',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 67,
                'name_en' => 'Asesores',
                'name_es' => 'Asesores',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 68,
                'name_en' => 'Otros organismos',
                'name_es' => 'Otros organismos',
                'parent_id' => 7,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 69,
                'name_en' => 'Efectivo',
                'name_es' => 'Efectivo',
                'parent_id' => 8,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 70,
                'name_en' => 'Pensión familiar, otras ...',
                'name_es' => 'Pensión familiar, otras ...',
                'parent_id' => 8,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 71,
                'name_en' => 'Transferencias',
                'name_es' => 'Transferencias',
                'parent_id' => 8,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));
        DB::table('category')->insert(
            array(
                'id' => 72,
                'name_en' => 'Otros gastos',
                'name_es' => 'Otros gastos',
                'parent_id' => 8,
                'created_at' => DATE('Y-m-d'),
                'updated_at' => null,
                'deleted_at' => null,
            ));

    }
}
