<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $guarded = ['id'];

    public function imageBelongsToBug()
    {
        return $this->belongsTo('App\Bug', 'bugId', 'id');
    }
}
