<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name', 'subject', 'note', 'rfp', 'attachments', 'email', 'status', 'service_id'
	];

	public function getDateAttribute()
	{
		return $this->created_at->format('d/m/Y');
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
