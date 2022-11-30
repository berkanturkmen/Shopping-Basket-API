<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('DOMAINS', function (Blueprint $table) {
			$table->id();
			$table->uuid('UUID')->unique();
			$table->string('EXTENSION');
			$table->decimal('PRICE');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('DOMAINS');
	}
};
