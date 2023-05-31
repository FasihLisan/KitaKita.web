<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			$query = Category::query();

			return DataTables::of($query)
				->addColumn('action', function ($category) {
					return '
						<a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700" href="' . route('admin.categories.edit', $category->id) . '">
							<i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit
						</a>
						<form class="inline-block" onsubmit="return confirm(\'Apakah Anda yakin?\');" action="' . route('admin.categories.destroy', $category->id) . '" method="POST">
							' . csrf_field() . method_field('DELETE') . '
							<button class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
								<i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete
							</button>
						</form>
					';
				})
				->rawColumns(['action'])
				->make();
		}

		return view('admin.categories.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

		Category::create($data);

		return redirect()->route('admin.categories.index')->with('success', 'Category berhasil ditambahkan');
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
	public function edit(Category $category)
	{
		return view('admin.categories.edit', [
			'category' => $category,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryRequest $request, Category $category)
	{
		$data = $request->all();
		$data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));

		$category->update($data);

		return redirect()->route('admin.categories.index')
			->with('success', 'Category berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();

		return redirect()->route('admin.categories.index')
			->with('success', 'Category berhasil dihapus');
	}
}
