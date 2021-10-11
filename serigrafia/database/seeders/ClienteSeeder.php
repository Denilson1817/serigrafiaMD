<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Cliente::truncate();
		$clients = [
			['id' => 1,'Telefono' => '2255698575','Nombre' => 'Ángel Contreras','Domicilio' => 'asdfg', 'CorreoElectronico' => 'mailfalso1@mail.com','created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58'],
			['id' => 2,'Telefono' => '1245369870','Nombre' => 'Jorge Dominguez','Domicilio' => 'asdfg', 'CorreoElectronico' => 'mailfalso2@mail.com','created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49'],
		];
        foreach ($clients as $client)
		{
			Cliente::create($client);
		}
    }
}
