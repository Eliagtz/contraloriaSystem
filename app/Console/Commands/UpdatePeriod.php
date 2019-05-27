<?php

namespace App\Console\Commands;

use App\Period;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdatePeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'periods:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'End periods with date today';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $periods = Period::where('status', 1)->get();
        
        foreach($periods as $period){
            $end = Carbon::createFromFormat('Y-m-d', $period->end);

            if($end->isBirthday()){
                $period->status = 2;
                $period->save();
                Log::info('Updated period: '.$period->id);
            }
        }
    }
}
