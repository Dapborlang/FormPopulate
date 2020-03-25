<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPopulate extends Model
{
    public function index()
    {
       return $this->hasOne('App\FormPopulateIndex');
    }
}
