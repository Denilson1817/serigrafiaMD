<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Producto::truncate();
		$products = [
			['id' => 1,'Material' => 'vidrio','IDDiseno' => 1,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 2,'Material' => 'Cerámica','IDDiseno' => 3,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 3,'Material' => 'Cerámica','IDDiseno' => 4,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39'],
			['id' => 4,'Material' => 'vidrio','IDDiseno' => 6,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35'],
			['id' => 5,'Material' => 'Tela','IDDiseno' => 1,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09'],
			['id' => 6,'Material' => 'Tela','IDDiseno' => 3,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37']
		];
        foreach ($products as $product)
		{
			Producto::create($product);
		}
    }
}
