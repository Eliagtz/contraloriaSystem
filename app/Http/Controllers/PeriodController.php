<?php

namespace App\Http\Controllers;

use App\User;
use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::with(['user'])->get();
        return view('period.periodIndex', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('period.periodForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatorPeriod($request->all())->validate();
        $period = new Period($request->all());
        $period->final_fund = $request->initial_fund;
        $user = User::find($request->user()->id);
        $user->periods()->save($period);
        return back()->with('Success', 'Period has been created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return view('period.periodShow', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('period.periodForm', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $this->validatorPeriodEdit($request->all())->validate();
        $period->final_fund = $request->initial_fund;
        $period->fill($request->all())->save();
        return redirect()->route('period.show', $period->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->status = 0;
        $period->save();
        return redirect()->route('period.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorPeriod(array $data)
    {
        return Validator::make($data, [
            'start' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:yesterday'],
            'end' => ['required', 'date', 'date_format:Y-m-d', 'after:start'],
            'description' => ['required', 'string', 'min:30', 'max:255'],
            'initial_fund' => ['required'],
        ]);
    }
    protected function validatorPeriodEdit(array $data)
    {
        return Validator::make($data, [
            'start' => ['date', 'date_format:Y-m-d', 'after_or_equal:yesterday'],
            'end' => ['required', 'date', 'date_format:Y-m-d', 'after:start'],
            'description' => ['required', 'string', 'min:30', 'max:255'],
            'initial_fund' => ['required'],
        ]);
    }

    

}
