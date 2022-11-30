<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServerSeeder extends Seeder
{
	public function run()
	{
		DB::table('SERVERS')->insert([
			'UUID' => Str::uuid(),
			'TITLE' => 'Server #1',
			'BODY' => null,
			'PRICE' => 50,
		]);

		DB::table('SERVERS')->insert([
			'UUID' => Str::uuid(),
			'TITLE' => 'Server #2',
			'BODY' => null,
			'PRICE' => 100,
		]);

		DB::table('SERVERS')->insert([
			'UUID' => Str::uuid(),
			'TITLE' => 'Server #3',
			'BODY' => null,
			'PRICE' => 150,
		]);
	}
}
