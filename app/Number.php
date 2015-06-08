<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model {
    
    protected $fillable = ['number'];
    
	public function assigned()
	{
	    return $this->morphTo();
	}

}
