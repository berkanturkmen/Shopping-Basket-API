<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VariantSeeder extends Seeder
{
	public function run()
	{
		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 1,
			'UUID' => Str::uuid(),
			'NAME' => 'No, thanks.',
			'PRICE' => 0,
			'TYPE' => 1,
		]);

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 1,
			'UUID' => Str::uuid(),
			'NAME' => 'Yes, please.',
			'PRICE' => 10,
			'TYPE' => 1,
		]);

		//

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 2,
			'UUID' => Str::uuid(),
			'NAME' => 'Ubuntu 18.04',
			'PRICE' => 0,
			'TYPE' => 2,
		]);

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 2,
			'UUID' => Str::uuid(),
			'NAME' => 'Ubuntu 20.04',
			'PRICE' => 0,
			'TYPE' => 2,
		]);

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 2,
			'UUID' => Str::uuid(),
			'NAME' => 'Ubuntu 22.04',
			'PRICE' => 0,
			'TYPE' => 2,
		]);

		//

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 3,
			'UUID' => Str::uuid(),
			'NAME' => "I don't want.",
			'PRICE' => 0,
			'TYPE' => 2,
		]);

		DB::table('VARIANTS')->insert([
			'OPTION_ID' => 3,
			'UUID' => Str::uuid(),
			'NAME' => '+1 IP',
			'PRICE' => 20,
			'TYPE' => 2,
		]);
	}
}
