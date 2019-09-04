<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'android_id'    => $this->android_id,
            'email'         => $this->email,
            'password'      => $this->password,
            'alamat'        => $this->alamat,
            'name'          => $this->name,
            'jenis_kelamin' => $this->jenis_kelamin,
            'status'        => $this->status,
            'kelas'         => $this->kelas,
            'nik'           => $this->nik,
            'no_hp_ortu'    => $this->no_hp_ortu,

        ];
    }
}
