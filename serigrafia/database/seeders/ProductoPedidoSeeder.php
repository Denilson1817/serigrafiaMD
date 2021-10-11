<?php

namespace Database\Seeders;

use App\Models\Producto_Pedido;
use Illuminate\Database\Seeder;

class ProductoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Producto_Pedido::truncate();
		$productosPedidos = [
			['id' => 1,'IDPedido' => 2,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 3,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 2,'IDPedido' => 2,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 3,'IDPedido' => 3,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 1,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39'],
			['id' => 4,'IDPedido' => 5,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 3,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35'],
			['id' => 5,'IDPedido' => 8,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 1,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09'],
			['id' => 6,'IDPedido' => 1,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 2,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37'],
            ['id' => 7,'IDPedido' => 2,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 4,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 8,'IDPedido' => 8,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 9,'IDPedido' => 3,'PrecioTotal' => 100,'NumProductos' => 5,'IDproducto' => 5,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39'],
			['id' => 10,'IDPedido' => 11,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 5,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35'],
			['id' => 11,'IDPedido' => 9,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 1,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09'],
			['id' => 12,'IDPedido' => 10,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 2,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37'],
            ['id' => 13,'IDPedido' => 9,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 6,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 14,'IDPedido' => 15,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 15,'IDPedido' => 12,'PrecioTotal' => 150,'NumProductos' => 5,'IDproducto' => 6,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39']
		];

        foreach ($productosPedidos as $producto)
		{
			Producto_Pedido::create($producto);
		}
    }
}
