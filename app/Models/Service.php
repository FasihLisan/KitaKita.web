<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name', 'icon', 'icon_background', 'category_id', 'detail', 'motto'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
