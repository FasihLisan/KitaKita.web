<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Http\Requests\PortfolioUpdateRequest;

class PortfolioController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			$query = Portfolio::all();

			return DataTables::of($query)
				->editColumn('thumbnail', function ($portfolio) {
					return '<img src="' . $portfolio->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md" />';
				})
				->addColumn('action', function ($portfolio) {
					return '
						<a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700" href="' . route('admin.portfolios.edit', $portfolio->id) . '">
							<i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit
						</a>
						<form class="inline-block" onsubmit="return confirm(\'Apakah Anda yakin?\');" action="' . route('admin.portfolios.destroy', $portfolio->id) . '" method="POST">
							' . csrf_field() . method_field('DELETE') . '
							<button class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
								<i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete
							</button>
						</form>
					';
				})
				->rawColumns(['thumbnail', 'action'])
				->make();
		}

		return view('admin.portfolios.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.portfolios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PortfolioRequest $request)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

		if ($request->hasFile('photos')) {
			$photos = [];

			foreach ($request->file('photos') as $photo) {
				$photoPath = $photo->store('uploads/portfolios', 'public');
				array_push($photos, $photoPath);
			}

			$data['photos'] = json_encode($photos);
		}

		Portfolio::create($data);

		return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Portfolio $portfolio)
	{
		return view('admin.portfolios.edit', compact('portfolio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PortfolioUpdateRequest $request, Portfolio $portfolio)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

		if ($request->hasFile('photos')) {
			$photos = [];

			foreach ($request->file('photos') as $photo) {
				$photoPath = $photo->store('uploads/portfolios', 'public');
				array_push($photos, $photoPath);
			}

			$data['photos'] = json_encode($photos);
		} else {
			$data['photos'] = $portfolio->photos;
		}

		$portfolio->update($data);

		return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Portfolio $portfolio)
	{
		$portfolio->delete();

		return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus');
	}
}
