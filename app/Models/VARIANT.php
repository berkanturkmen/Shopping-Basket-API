<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VARIANT extends Model
{
	use HasFactory;

	protected $table = 'VARIANTS';

	protected $fillable = ['OPTION_ID', 'UUID', 'NAME', 'PRICE', 'TYPE'];

	public function OPTION()
	{
		return $this->belongsTo(\App\Models\OPTION::class, 'OPTION_ID');
	}
}
