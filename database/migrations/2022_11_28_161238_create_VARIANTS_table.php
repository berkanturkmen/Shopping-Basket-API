<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('VARIANTS', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('OPTION_ID');
			$table->uuid('UUID')->unique();
			$table->string('NAME');
			$table->decimal('PRICE');
			$table->tinyInteger('TYPE');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('VARIANTS');
	}
};
