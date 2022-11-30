<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPTION extends Model
{
	use HasFactory;

	protected $table = 'OPTIONS';

	protected $fillable = ['UUID', 'NAME', 'TYPE'];

	public function VARIANTS()
	{
		return $this->hasMany(\App\Models\VARIANT::class, 'OPTION_ID');
	}
}
