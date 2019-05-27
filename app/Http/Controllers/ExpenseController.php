<?php

namespace App\Http\Controllers;

use App\Period;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Period $period)
    {

        $period->load('expenses');

        return view('expense.expenseIndex', compact('period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period, Request $request)
    {
        $this->authorize('pass', $request->user());
        return view('expense.expenseForm', compact('period'));
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
        $this->validatorExpense($request->all())->validate();
        $expense = new Expense($request->all());
        $period = Period::find($request->period_id);
        $period->expenses()->save($expense);
        return back()->with('Success', 'Expense has been created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expense.expenseShow', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense, Request $request)
    {
        $this->authorize('pass', $request->user());
        $period = $expense->period;
        return view('expense.expenseForm', compact('expense', 'period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $this->authorize('pass', $request->user());
        $this->validatorExpense($request->all())->validate();
        $expense->fill($request->all())->save();
        return redirect()->route('expense.show', compact('expense', 'period'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }

    protected function validatorExpense(array $data)
    {
        return Validator::make($data, [
            'period_id' => ['exists:periods,id', 'required'],
            'quantity' => ['required'],
            'concept' => ['required', 'string', 'min:15', 'max:255'],
            'movement_type' => ['required'],
        ]);
    }
}
