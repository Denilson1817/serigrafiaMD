<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Pedido::truncate();
		$pedidos = [
			['id' => 1,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 2,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 3,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39'],
			['id' => 4,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35'],
			['id' => 5,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09'],
			['id' => 6,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37'],
            ['id' => 7,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 8,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 9,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39'],
			['id' => 10,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35'],
			['id' => 11,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09'],
			['id' => 12,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37'],
            ['id' => 13,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 14,'FechaRealizado' => '2021-10-05 20:36:26','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 2,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
			['id' => 15,'FechaRealizado' => '2021-10-05 04:15:58','FechaEntraga' => '2021-10-07 03:59:09','NumProductos' => 5,'IDCliente' => 1,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39']
		];
        foreach ($pedidos as $pedido)
		{
			Pedido::create($pedido);
		}

    }
}
