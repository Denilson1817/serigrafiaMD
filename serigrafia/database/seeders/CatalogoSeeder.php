<?php

namespace Database\Seeders;

use App\Models\Catalogo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Catalogo::truncate();
		$catalogs = [
			['id' => '1','Nombre' => 'Jorge','Categoria' => 'ññññ','Estado' => 1,'created_at' => '2021-10-05 04:13:06','updated_at' => '2021-10-05 04:13:06'],
			['id' => '2','Nombre' => 'Jorgese','Categoria' => 'ññññ','Estado' => 1,'created_at' => '2021-10-05 04:13:41','updated_at' => '2021-10-05 04:13:41'],
			['id' => '3','Nombre' => 'Jorgese3','Categoria' => 'ññññ','Estado' => 0,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-07 22:42:48'],
			['id' => '4','Nombre' => 'Jorgese4','Categoria' => 'ññññ','Estado' => 1,'created_at' => '2021-10-05 20:36:25','updated_at' => '2021-10-05 20:36:25'],
			['id' => '5','Nombre' => 'oppk','Categoria' => 'km','Estado' => 1,'created_at' => '2021-10-05 20:56:38','updated_at' => '2021-10-05 20:56:38'],
			['id' => '6','Nombre' => 'Jorgeoiioiioioi','Categoria' => 'ññññ','Estado' => 0,'created_at' => '2021-10-05 21:00:27','updated_at' => '2021-10-07 03:58:47'],
			['id' => '7','Nombre' => 'Jorge7','Categoria' => 'ññññ','Estado' => 0,'created_at' => '2021-10-05 21:25:36','updated_at' => '2021-10-07 03:58:35'],
		];
        foreach ($catalogs as $catalog)
		{
			Catalogo::create($catalog);
		}
    }
}