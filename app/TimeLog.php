<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 11:45
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeLog extends Model
{
    protected $fillable = [
        'user_id', 'login_at', 'logout_at', 'date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function fetchIndexTimeLogs(){
        return $this->with('user')->orderBy('date','desc')
                    ->offset(0)->limit(5)->get();
    }

    public function fetchTimeLogsAjax($user_id='', $team_id='', $search_filter='', $year='', $week='', $day='',
                                      $offset=0, $limit=5){

        $query = $this->with('user')
                      ->join('users','users.id','=','time_logs.user_id');

        if(!empty($user_id)){
            $query = $query->where('users.id',$user_id);
        }

        if(!empty($team_id)){
            $query = $query->where('users.team_id',$team_id);
        }

        if(!empty($search_filter)){
            $from_date = '';
            if($search_filter == 'current_week'){
                $from_date = Carbon::now()->subWeeks(1);
            }elseif($search_filter == 'current_month'){
                $from_date = Carbon::now()->subMonth(1);
            }elseif($search_filter == 'last_3_week'){
                $from_date = Carbon::now()->subMonth(3);
            }

            if(!empty($from_date)){
                $query = $query->where('time_logs.date','>=', $from_date);
            }
        }

        if(!empty($year)){
            $query = $query->whereYear('time_logs.date',$year);
        }

        if(!empty($week)){
            $week_start_date = date('Y-m-d', strtotime($week));
            $week_end_date = date('Y-m-d', strtotime($week_start_date. ' + 6 day'));
            $query = $query->where('time_logs.date','>=',$week_start_date)
                           ->where('time_logs.date','<=',$week_end_date);
        }

        if(!empty($day)){
            $query = $query->whereDate('time_logs.date',$day);
        }

        $time_logs = $query->orderBy('time_logs.date','desc')
                          ->offset($offset)->limit($limit)->get();
        return $time_logs;
    }
}