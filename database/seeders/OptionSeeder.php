<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OptionSeeder extends Seeder
{
	public function run()
	{
		DB::table('OPTIONS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Privacy',
			'TYPE' => 1,
		]);

		DB::table('OPTIONS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Operating System',
			'TYPE' => 2,
		]);

		DB::table('OPTIONS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Additional IP',
			'TYPE' => 2,
		]);
	}
}
