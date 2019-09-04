<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User; 
use App\Http\Resources\User\UserResource;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    //
    public function index()
    {
        return UserResource::collection(User::latest()->get());
    }

    public function show($android_id)
    {   
        $user=User::where('android_id', $android_id)->first();
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $user =User::create($request->all());
        if ($user) {
            return response()->json([
                'status' => 'success'
            ]);
        }
    }

    public function update(Request $request, $android_id)
    {   
        $user=User::where('android_id', $android_id)->first();
        $user->update($request->all());
        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response('Deleted', Response::HTTP_OK);
    }

}
