<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'proveedor' => Str::random(10),
            'marca' => Str::random(10),
            'contacto' => Str::random(10),
            'telefono' => mt_rand() . "\n",
            'email' => Str::random(10).'@gmail.com',
            'pais' => Str::random(10),
            'direccion' => Str::random(10),
            'calidad' => Str::random(10),
            'pedidos' => Str::random(10),
        ]);
    }
}
