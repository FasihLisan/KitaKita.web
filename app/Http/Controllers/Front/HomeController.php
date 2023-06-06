<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$portfolios = Portfolio::with(['service'])->latest()->take(6)->get();

		return view('home', [
			'portfolios' => $portfolios
		]);
	}
}
