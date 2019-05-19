<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['quantity', 'concept', 'movement_type'];


    public function period()
    {
        return $this->belongsTo('App\Period');
    }
}
