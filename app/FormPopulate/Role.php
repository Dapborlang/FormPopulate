<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public function link()
    {
       return $this->hasMany('App\FormPopulate','role','role');
    }
}
