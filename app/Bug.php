<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $guarded = ['id'];

    public function bugBelongsToApplication()
    {
        return $this->belongsTo('App\Application', 'applicationId', 'id');
    }

    public function bugBelongsToReporter()
    {
        return $this->belongsTo('App\User', 'reporterId', 'id');
    }
}
