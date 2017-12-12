<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditionExtra extends Model
{
    protected $table = 'audition_extra';

    protected $fillable = ['user_id', 'last_audition_year','last_audition_two','last_year_year','audition_last_apply','summer_stock_last_year','where_place','unpaid_apprentice','internship','standby_appointment','emca','sag','aftra','agva','agma','friday_m','friday_af','saturday_m','saturday_af','sunday_m','sunday_af'];

    public function audition()
    {
        return $this->belongsTo('App\Actor','user_id');
    }
}