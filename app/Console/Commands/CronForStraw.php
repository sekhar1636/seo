<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Membership;
use App\MembershipPeriod;
use Validator;
use Carbon\Carbon;


class CronForStraw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:straw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will update the payment status based on user subscription';

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
        $dt = Carbon::now()->toDateString();
        $jobs = MembershipPeriod::where('end_date', '<', $dt)->get();
        $valll = [];
        foreach($jobs as $value)
        {
            $value->status = 0;
            $valll[] = $value->id;
            $value->save();
        }

        $cute = [];
        foreach($valll as $val)
        {

            $users = Membership::where('membership_period_id',$val)->get();
            foreach($users as $vin)
            {
                $cute[] = $vin->user_id;
            }
        }
        $cu = [];
        foreach($cute as $nig)
        {
            $user = User::findorfail($nig);
            $user->payment_status = 0;
            $cu[] = $nig;
            $user->save();
        }
    }

}
