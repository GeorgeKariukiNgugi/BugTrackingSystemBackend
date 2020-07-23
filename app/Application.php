<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $guarded = ['id'];
    // ! adding the relationship to the bugs. 
    public function applicationHasManyBugs()
    {
        return $this->hasMany('App\Bug', 'applicationId', 'id');
    }

    // ! adding the relationship to the applicationLeads. 

    public function applicationHasManyApplicationLeads()
    {
        return $this->hasMany('App\ApplicationLead', 'applicationId', 'id');
    }

    public function applicationHasManyFirstLineSupport()
    {
        return $this->hasMany('App\FirstLineSupportApplication', 'applicationId', 'id');
    }
}
