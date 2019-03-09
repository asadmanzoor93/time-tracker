<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 11:45
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    protected $fillable = [
        'name', 'team_id', 'user_id', 'login_at', 'logout_at'
    ];

    protected $dates = ['login_at', 'logout_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}