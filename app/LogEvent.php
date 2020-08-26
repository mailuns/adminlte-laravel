<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogEvent extends Model
{
    protected $table = 'LogEvent';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = ['addressId'];
}
