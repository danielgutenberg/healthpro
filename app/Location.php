<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	public function users()
	{
	    return $this->belongsToMany('App\User');
	}
	
	public function numbers()
    {
        return $this->morphMany('App\Number', 'assigned');
    }

}
