<?php

namespace App\Http\Controllers\Api\Soal;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Soal;
use App\http\Resources\Soal\SoalResource;  

class SoalController extends Controller
{
    //

    public function index() 
    {
        return SoalResource::collection(Soal::latest()->get());
    }

    public function store(Request $request) 
    {
        $soal = Soal::create($request->all());
        return response(new SoalResource($soal), Response::HTTP_CREATED);

    }

    public function show(Soal $soal)
    {
        return new SoalResource($soal);
    }

    public function update(Request $request, $id)
    {
        $soal = Soal::find($id);
        $soal->update($request->all());
        return response(new SoalResource($soal), Response::HTTP_CREATED);
    }

    public function destroy (Soal $soal)
    {
        $soal->delete();
        return response('Deleted', Response::HTTP_OK);
    }
}
  