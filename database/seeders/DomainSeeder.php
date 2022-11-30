<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DomainSeeder extends Seeder
{
	public function run()
	{
		DB::table('DOMAINS')->insert([
			'UUID' => Str::uuid(),
			'EXTENSION' => 'com',
			'PRICE' => 150,
		]);

		DB::table('DOMAINS')->insert([
			'UUID' => Str::uuid(),
			'EXTENSION' => 'net',
			'PRICE' => 125,
		]);

		DB::table('DOMAINS')->insert([
			'UUID' => Str::uuid(),
			'EXTENSION' => 'org',
			'PRICE' => 100,
		]);
	}
}
