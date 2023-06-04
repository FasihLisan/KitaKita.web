<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;

class ServiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			$query = Service::with(['category']);

			return DataTables::of($query)
				->editColumn('thumbnail', function ($service) {
					return '<img src="' . $service->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md" />';
				})
				->addColumn('action', function ($service) {
					return '
						<a class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700" href="' . route('admin.services.edit', $service->id) . '">
							<i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit
						</a>
						<form class="inline-block" onsubmit="return confirm(\'Apakah Anda yakin?\');" action="' . route('admin.services.destroy', $service->id) . '" method="POST">
							' . csrf_field() . method_field('DELETE') . '
							<button class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
								<i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete
							</button>
						</form>
					';
				})
				->rawColumns(['thumbnail', 'detail', 'action'])
				->make();
		}

		return view('admin.services.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = Category::all();

		return view('admin.services.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ServiceRequest $request)
	{
		$data = $request->all();

		$icon_background = [];
		array_push($icon_background, $data['r'], $data['g'], $data['b'], $data['a']);
		$data['icon_background'] = json_encode($icon_background);

		if ($request->hasFile('images')) {
			$images = [];

			foreach ($request->file('images') as $image) {
				$imagePath = $image->store('uploads/services', 'public');
				array_push($images, $imagePath);
			}

			$data['images'] = json_encode($images);
		}

		Service::create($data);

		return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan');
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
	public function edit(Service $service)
	{
		$service->load('category');

		$categories = Category::all();

		return view('admin.services.edit', compact('service', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ServiceRequest $request, Service $service)
	{
		$data = $request->all();

		$icon_background = [];
		array_push($icon_background, $data['r'], $data['g'], $data['b'], $data['a']);
		$data['icon_background'] = json_encode($icon_background);

		if ($request->hasFile('images')) {
			$images = [];

			foreach ($request->file('images') as $image) {
				$imagePath = $image->store('uploads/services', 'public');
				array_push($images, $imagePath);
			}

			$data['images'] = json_encode($images);
		} else {
			$data['images'] = $service->images;
		}

		$service->update($data);

		return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Service $service)
	{
		$service->delete();

		return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus');
	}
}
