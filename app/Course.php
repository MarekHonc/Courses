<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'name', 'description', 'capacity', 'from', 'to', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function hasSpace(){
        return $this->capacity-count($this->users) >= 1;
    }

    public function creator() {
        return $this->belongsTo('App\User','user_id');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
