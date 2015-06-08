<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Number;
use App\Location;

use Illuminate\Http\Request;

class LocationController extends Controller {
	
	public function __construct(
		Number $number,
		Location $location,
		Request $request
	) {
		$this->number = $number;
		$this->location = $location;
		$this->request = $request;
	}
	
	public function addNumber($locationId)
	{
		$location = $this->location->findOrFail($locationId);
		
		//create phone number if it doesnt exist and connect it to the location
		$number = $this->number->firstOrCreate(['number' => $this->request->input('number')]);
		$location->numbers()->save($number);
		
		return $location->numbers;
	}
	
	public function removeNumber($locationId, $phoneId)
	{
		$location = $this->location->findOrFail($locationId);
		
		//insert phone number into the number model
		$location->numbers()->where('id', '=', $phoneId)->delete();
		
		return $location->numbers;
	}

}
