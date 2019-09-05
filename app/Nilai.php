<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // 
    protected $table = "table_nilais";
    protected $guarded = ['id'];






    function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
