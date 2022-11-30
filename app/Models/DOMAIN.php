<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DOMAIN extends Model
{
	use HasFactory;

	protected $table = 'DOMAINS';

	protected $fillable = ['UUID', 'EXTENSION', 'PRICE'];
}
