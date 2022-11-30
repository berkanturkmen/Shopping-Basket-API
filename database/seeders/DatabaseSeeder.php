<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([DomainSeeder::class, ServerSeeder::class, OptionSeeder::class, VariantSeeder::class, PeriodSeeder::class]);
	}
}
