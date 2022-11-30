<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeriodSeeder extends Seeder
{
	public function run()
	{
		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Yearly',
			'PERIOD' => 1,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '2 Years',
			'PERIOD' => 2,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '3 Years',
			'PERIOD' => 3,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '4 Years',
			'PERIOD' => 4,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '5 Years',
			'PERIOD' => 5,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '6 Years',
			'PERIOD' => 6,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '7 Years',
			'PERIOD' => 7,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '8 Years',
			'PERIOD' => 8,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '9 Years',
			'PERIOD' => 9,
			'TYPE' => 1,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => '10 Years',
			'PERIOD' => 10,
			'TYPE' => 1,
		]);

		//

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Monthly',
			'PERIOD' => 1,
			'TYPE' => 2,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Quarterly',
			'PERIOD' => 3,
			'TYPE' => 2,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Semi-Annually',
			'PERIOD' => 6,
			'TYPE' => 2,
		]);

		DB::table('PERIODS')->insert([
			'UUID' => Str::uuid(),
			'NAME' => 'Annually',
			'PERIOD' => 12,
			'TYPE' => 2,
		]);
	}
}
