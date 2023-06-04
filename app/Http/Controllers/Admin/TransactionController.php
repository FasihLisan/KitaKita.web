<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionUpdateRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			$query = Transaction::with(['service.category']);

			return DataTables::of($query)
				->editColumn('status', function ($transaction) {
					if ($transaction->status == 'requested') {
						return '
							<span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Menunggu Konfirmasi</span>
						';
					} else if ($transaction->status == 'accepted') {
						return '
							<span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Sudah Dikonfirmasi</span>
						';
					} else if ($transaction->status == 'rejected') {
						return '
							<span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Ditolak</span>
						';
					} else {
						return '
							<span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Selesai</span>
						';
					}
				})
				->editColumn('date', function ($transaction) {
					return '<td>' . $transaction->date . '</td>';
				})
				->addColumn('action', function ($transaction) {
					return '
						<a href="' . route('admin.transactions.edit', $transaction->id) . '" class="bg-blue-500 hover:bg-blue-700 text-white font-semiboldpy-2 px-4 rounded-full">Edit</a>
					';
				})
				->rawColumns(['status', 'date', 'action'])
				->make();
		}

		return view('admin.transactions.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
	public function edit(Transaction $transaction)
	{
		return view('admin.transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(TransactionUpdateRequest $request, Transaction $transaction)
	{
		$data = $request->all();

		$transaction->update($data);

		return redirect()->route('admin.transactions.index')->with('success', 'Status Transaksi berhasil diupdate');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
