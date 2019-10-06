<?php

namespace App\Http\Controllers\Api\Peraturan;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;



use App\Pengaturan;
use App\Http\Resources\Peraturan\PeraturanResource;


class PeraturanController extends Controller
{
    //

    public function index()
    {
        //  return PeraturanResource::collection(Pengaturan::latest()->get(1));
        return new PeraturanResource(Pengaturan::find(1));
    }

    public function update(Request $request)
    {
        $id = 1;
        $peraturan=Pengaturan::find($id);
        $peraturan->update($request->all());
        return response(new PeraturanResource($peraturan), Response::HTTP_CREATED);
    }
}
