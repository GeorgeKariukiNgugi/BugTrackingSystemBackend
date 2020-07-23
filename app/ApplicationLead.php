<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationLead extends Model
{
    protected $guarded = ['id'];

    public function applicationLeadIsAUser()
    {
        return $this->belongsTo('App\User', 'userId', 'id');
    }

    public function applicationLeadBelongsToApplication()
    {
        return $this->belongsTo('App\Application', 'applicationId', 'id');
    }
}
