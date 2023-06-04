<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name', 'icon', 'icon_background', 'category_id', 'detail', 'motto', 'images'
	];

	protected $casts = [
		'icon_background' => 'array',
		'images' => 'array',
	];

	public function getThumbnailAttribute()
	{
		if ($this->images) {
			return Storage::url(json_decode($this->images)[0]);
		}

		return 'https://via.placeholder.com/800x600';
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
