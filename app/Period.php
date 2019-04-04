<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //

    protected $fillable = ['start', 'end', 'description', 'initial_fund', 'final_fund'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
