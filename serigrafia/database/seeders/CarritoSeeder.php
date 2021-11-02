<?php

namespace Database\Seeders;

use App\Models\Carrito;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Carrito::truncate();
		$carrito = [
			['cliente_id' => 1,'producto_id' => 1,'cantidad' => 30],
			['cliente_id' => 1,'producto_id' => 4,'cantidad' => 30],
			['cliente_id' => 1,'producto_id' => 5,'cantidad' => 30],
			['cliente_id' => 1,'producto_id' => 2,'cantidad' => 30],
			['cliente_id' => 1,'producto_id' => 3,'cantidad' => 30],
			['cliente_id' => 1,'producto_id' => 6,'cantidad' => 30]
		];
        foreach ($carrito as $carrito_producto)
		{
			Carrito::create($carrito_producto);
		}
    }
}
