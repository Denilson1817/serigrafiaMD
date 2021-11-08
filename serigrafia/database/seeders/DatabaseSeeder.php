<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarritoSeeder::class);
		$this->call(CatalogoSeeder::class);
		$this->call(ClienteSeeder::class);
		$this->call(DisenoSeeder::class);
		$this->call(PedidoSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ProductoPedidoSeeder::class);
		$this->command->info("Database seeded.");
    }
}
