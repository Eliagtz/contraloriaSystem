<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    
    protected $fillable = ['start', 'end', 'description', 'initial_fund', 'final_fund'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    public function getTotalExpenses()
    {
        $total = $this->expenses->sum('quantity');
        return $total;
    }

    public function getTotalIncomes()
    {
        $total = $this->incomes->sum('quantity');
        return $total;
    }

    public function getActualFund()
    {
        $total = $this->initial_fund + ($this->getTotalIncomes() -  $this->getTotalExpenses());
        return $total;
    }
}
