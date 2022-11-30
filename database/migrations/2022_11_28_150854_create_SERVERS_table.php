<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('SERVERS', function (Blueprint $table) {
			$table->id();
			$table->uuid('UUID')->unique();
			$table->string('TITLE');
			$table->longText('BODY')->nullable();
			$table->decimal('PRICE');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('SERVERS');
	}
};
