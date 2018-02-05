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
		/*Initialize*/
		$users = $invalid_IDs = $invalid_user_IDs = $invalid_users = [];
		
		/*Define Datetimee*/
		$date_now = Carbon::now()->toDateString();
		
		/*Get Invalid Membership Periods*/
		$invalid_periods = MembershipPeriod::where('end_date', '<', $date_now)->get();
		
		if($invalid_periods){
			foreach($invalid_periods as $invalid_period){
			    $invalid_period->status = 0;
			    $invalid_IDs[] = $invalid_period->id;
			    $invalid_period->save();
			}
			
			foreach($invalid_IDs as $invalid_ID){
			    $users = Membership::where('membership_period_id',$invalid_ID)->get();
			    foreach($users as $user){
			        $invalid_user_IDs[] = $user->user_id;
			    }
			}
			
			foreach($invalid_user_IDs as $user_ID){
			    $user = User::findorfail($user_ID);
			    $user->payment_status = 0;
			    $invalid_users[] = $user_ID;
			    $user->save();
			}    
		}
		
		/*Initialize*/
		$users = $valid_IDs = $valid_user_IDs = $valid_users = [];
		
		/*Get Valid Membership Periods*/
		$valid_periods = MembershipPeriod::where('end_date', '>=', $date_now)->get();
		
		if($valid_periods){
			foreach($valid_periods as $valid_period){
			    $valid_IDs[] = $valid_period->id;
			}
			
			foreach($valid_IDs as $valid_ID){
			    $users = Membership::where('membership_period_id',$valid_ID)->get();
			    foreach($users as $user){
			        $valid_user_IDs[] = $user->user_id;
			    }
			}
			
			foreach($valid_user_IDs as $user_ID){
			    $user = User::findorfail($user_ID);
			    $user->payment_status = 1;
			    $valid_users[] = $user_ID;
			    $user->save();
			}    
		}
    }
}