<?php
/**
 * Created by PhpStorm.
 * User: asad
 * Date: 2019-03-09
 * Time: 11:46
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timelog()
    {
        return $this->hasMany(TimeLog::class);
    }
}