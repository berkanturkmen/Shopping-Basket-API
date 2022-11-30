<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SERVER extends Model
{
	use HasFactory;

	protected $table = 'SERVERS';

	protected $fillable = ['UUID', 'TITLE', 'BODY', 'PRICE'];
}
