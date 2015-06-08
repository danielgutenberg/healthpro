<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	public function locations()
	{
	    return $this->belongsToMany('App\Location');
	}
	
	public function numbers()
    {
        return $this->morphMany('App\Number', 'assigned');
    }

}
