<?php

namespace Database\Seeders;

use App\Models\Diseno;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Diseno::truncate();
		$desings = [
			['id' => 1,'Textura' => 'mml','Foto' => 'C:\Users\Lenovo\AppData\Local\Temp\phpB57D.tmp','Estado' => 1, 'ID_Catalago' => 3,'created_at' => '2021-10-05 04:15:58','updated_at' => '2021-10-05 04:15:58','Nombre'=>'Diseño 1'],
			['id' => 2,'Textura' => 'omndsmlñs','Foto' => 'diseños','Estado' => 0, 'ID_Catalago' => 4,'created_at' => '2021-10-05 20:36:26','updated_at' => '2021-10-07 04:01:49','Nombre'=>'Diseño 2'],
			['id' => 3,'Textura' => 'omndsmlñs','Foto' => 'diseños','Estado' => 1, 'ID_Catalago' => 5,'created_at' => '2021-10-05 20:56:39','updated_at' => '2021-10-05 20:56:39','Nombre'=>'Diseño 3'],
			['id' => 4,'Textura' => 'n.jkmlkl','Foto' => 'public/diseños/IAENUsfF3GC3UxLbEJsNYV0KltuSQlA6GNC...','Estado' => 1, 'ID_Catalago' => 6,'created_at' => '2021-10-05 21:04:35','updated_at' => '2021-10-05 21:04:35','Nombre'=>'Diseño 4'],
			['id' => 5,'Textura' => 'n.jkmlkl','Foto' => 'public/diseños/gPEr2IiKWrsHp7KqbMIer3p88P1v3rX3OTP...','Estado' => 0, 'ID_Catalago' => 6,'created_at' => '2021-10-05 21:14:02','updated_at' => '2021-10-07 03:59:09','Nombre'=>'Diseño 5'],
			['id' => 6,'Textura' => 'mml','Foto' => 'diseños/tWcllaZu5Z8dxHikcCLkIGEaX7EX9I4RaRng9yBa.j...','Estado' => 1, 'ID_Catalago' => 7,'created_at' => '2021-10-05 21:25:37','updated_at' => '2021-10-05 21:25:37','Nombre'=>'Diseño 6']
		];
        foreach ($desings as $desing)
		{
			Diseno::create($desing);
		}
    }
}