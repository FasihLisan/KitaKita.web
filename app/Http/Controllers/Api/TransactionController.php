<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
            'rfp' => 'required|mimes:pdf,doc,docx',
            'proposal' => 'required',
            'email' => 'required',
            'status' => 'required',
            'serviceId' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        } else {

            $name = $request->input('name');
            $subject = $request->input('subject');
            $pesan = $request->input('pesan');
            $rfp = $request->file('rfp');
            $attachments = $request->file('proposal');
            $email = $request->input('email');
            $status = $request->input('status');
            $serviceId = $request->input('serviceId');

            $rfpName =  $rfp->store('uploads/attachments', 'public');

            $proposalName =  $attachments->store('uploads/attachments', 'public');

            $rfpName = explode('/', $rfpName)[2];
            $proposalName = explode('/', $proposalName)[2];

            $data = [
                'name' => $name,
                'subject' => $subject,
                'note' => $pesan,
                'rfp' => $rfpName,
                'attachments' => $proposalName,
                'email' => $email,
                'status' => $status,
                'service_id' => $serviceId
            ];

            if (Transaction::insert($data)) {
                return response()->json([
                    'status' => 201,
                    'message' => 'Data Berhasil Ditambahkan'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Data Gagal Ditambahkan'
                ]);
            }
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
