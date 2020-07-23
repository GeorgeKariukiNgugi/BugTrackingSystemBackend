<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstLineSupportApplication extends Model
{
    protected $guarded = ['id'];

    public function bugBelongsToApplication()
    {
        return $this->belongsTo('App\Application', 'applicationId', 'id');
    }

    public function bugBelongsToUser()
    {
        return $this->belongsTo('App\User', 'firstLineSupportId', 'id');
    }
}
