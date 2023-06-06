<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name', 'slug', 'service_id', 'year_created', 'photos'
	];

	public function getThumbnailAttribute()
	{
		if ($this->photos) {
			return Storage::url(json_decode($this->photos)[0]);
		}

		return 'https://via.placeholder.com/800x600';
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
