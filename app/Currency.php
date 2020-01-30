<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','Cur_ID','Date','Cur_Abbreviation','Cur_Scale','Cur_Name','Cur_OfficialRate'];
}
