<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
	public function index($slug)
	{
		$portfolio = Portfolio::with(['service'])->whereSlug($slug)->firstOrFail();

		return view('front.portfolio', compact('portfolio'));
	}
}
