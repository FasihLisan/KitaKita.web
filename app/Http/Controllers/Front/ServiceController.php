<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		// dd($categories);

		return view('front.service', [
			'categories' => $categories,
		]);
	}
}
