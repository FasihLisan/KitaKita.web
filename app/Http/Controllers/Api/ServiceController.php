<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Category::get();

        $response = [];

        for ($a = 0; $a < count($category); $a++) {
            $response[$a]['category'] = $category[$a]->name;

            $servics = DB::table('services')
                ->select(DB::raw('*,categories.name as category_name,services.name as services_name, services.id as servicesId'))
                ->join('categories', 'categories.id', '=', 'services.category_id')
                ->where('categories.id', '=', $category[$a]->id)
                ->get();

            for ($b = 0; $b < count($servics); $b++) {

                $response[$a]['services'][$b]['serviceId'] = $servics[$b]->servicesId;

                if (json_decode(json_decode($servics[$b]->images))) {
                    for ($g = 0; $g < count(json_decode(json_decode($servics[$b]->images))); $g++) {
                        $response[$a]['services'][$b]['image'][$g] = explode("/", json_decode(json_decode($servics[$b]->images))[$g])[2];
                    }
                } else {
                    $response[$a]['services'][$b]['image'] = null;
                }

                $response[$a]['services'][$b]['name'] = $servics[$b]->services_name;
                $response[$a]['services'][$b]['description'] = $servics[$b]->detail;
                $response[$a]['services'][$b]['icon'] = $servics[$b]->icon;


                $response[$a]['services'][$b]['icon_background']['r'] = (float) json_decode(json_decode($servics[$b]->icon_background))[0];
                $response[$a]['services'][$b]['icon_background']['g'] = (float) json_decode(json_decode($servics[$b]->icon_background))[1];
                $response[$a]['services'][$b]['icon_background']['b'] = (float) json_decode(json_decode($servics[$b]->icon_background))[2];
                $response[$a]['services'][$b]['icon_background']['o'] = (float) json_decode(json_decode($servics[$b]->icon_background))[3];


                $response[$a]['services'][$b]['details']['nama_produk'] = $servics[$b]->services_name;
                $response[$a]['services'][$b]['details']['category'] = $servics[$b]->category_name;
                $response[$a]['services'][$b]['details']['detail_produk'] = $servics[$b]->detail;
            }
        }

        return response()->json($response);
    }

    function getImages($filename)
    {
        $ekstensiFile = explode('.', $filename);
        $ekstensiFile = strtolower(end($ekstensiFile));

        $ekstensiImageValid = ['jpg', 'jpeg', 'png'];
        $ekstensiPdfValid = ['pdf'];

        if (in_array($ekstensiFile, $ekstensiImageValid)) {
            header('Content-Type: image/png');
            header('Content-Length: ' . Storage::size('public/uploads/services/' . $filename));

            @readfile(Storage::path('public/uploads/services/' . $filename));
        } elseif (in_array($ekstensiFile, $ekstensiPdfValid)) {
            header("Content-type: application/$ekstensiFile");
            header("Content-Disposition: inline; filename=$filename");
            header('Content-Length: ' . Storage::size('public/uploads/services/' . $filename));

            @readfile(Storage::path('public/uploads/services/' . $filename));
        } else {
            echo "Ekstensi file tidak cocok";
        }
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
