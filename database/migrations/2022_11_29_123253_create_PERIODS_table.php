<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('PERIODS', function (Blueprint $table) {
			$table->id();
			$table->uuid('UUID')->unique();
			$table->string('NAME');
			$table->tinyInteger('PERIOD');
			$table->tinyInteger('TYPE');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('PERIODS');
	}
};
