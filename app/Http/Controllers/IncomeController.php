<?php

namespace App\Http\Controllers;

Use App\Period;
use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Period $period)
    {
        $period->load('incomes');

        return view('income.incomeIndex', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period, Request $request)
    {
        $this->authorize('pass', $request->user());
        return view('income.incomeForm', compact('period'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('pass', $request->user());
        $this->validatorIncome($request->all())->validate();
        $income = new Income($request->all());
        $period = Period::find($request->period_id);
        $period->incomes()->save($income);
        return back()->with('Success', 'Income has been created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('income.incomeShow', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income, Request $request)
    {
        $this->authorize('pass', $request->user());
        $period = $income->period;
        return view('income.incomeForm', compact('income', 'period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $this->authorize('pass', $request->user());
        $this->validatorIncome($request->all())->validate();
        $income->fill($request->all())->save();
        return redirect()->route('income.show', compact('income', 'period'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }

    protected function validatorIncome(array $data)
    {
        return Validator::make($data, [
            'period_id' => ['exists:periods,id', 'required'],
            'quantity' => ['required'],
            'concept' => ['required', 'string', 'min:30', 'max:255'],
            'movement_type' => ['required'],
        ]);
    }
}
