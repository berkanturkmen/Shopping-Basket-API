<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->uuid('UUID')->unique();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table
				->string('API_TOKEN')
				->unique()
				->nullable()
				->default(null);
			$table->enum('PERMISSION', ['SuperAdmin', 'Admin', 'Personnel'])->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('users');
	}
};
