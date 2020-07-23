<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingBug extends Model
{
    protected $guarded = ['id'];

    public function imageBelongsToBug()
    {
        return $this->belongsTo('App\Bug', 'bugId', 'id');
    }

    public function bugBelongsToFirstLineSupport()
    {
        return $this->belongsTo('App\FirstLineSupportApplication', 'firstLineSupportId', 'id');
    }
    public function bugBelongsToApplicationLead()
    {
        return $this->belongsTo('App\ApplicationLead', 'technicalLead', 'id');
    }
    public function bugClosedByUser()
    {
        return $this->belongsTo('App\User', 'closedBy', 'id');
    }
}
