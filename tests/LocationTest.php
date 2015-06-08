<?php

use App\Number;
use App\Location;

class LocationTest extends TestCase {
    
	public function testAddNumberToLocation()
	{
		$location = new Location();
		$location->save();
		$number = rand(9057640000, 9057649999);
		$data = ['number' => $number];
		$this->call('POST', '/locations/' . $location->id . '/numbers', $data);
		
		$this->assertContains($number, $location->numbers()->lists('number'));
	}
	
	public function testRemoveNumberFromLocation()
	{
		$location = new Location();
		$location->save();
		$num = rand(9057640000, 9057649999);
		$data = ['number' => $num];
		$this->call('POST', '/locations/' . $location->id . '/numbers', $data);
		$this->assertContains($num, $location->numbers()->lists('number'));
		
		$numberModel = new Number();
		$number = $numberModel::where('number', '=', $num)->firstOrFail();
		
		$this->call('DELETE', '/locations/' . $location->id . '/numbers/' . $number->id);
		
		$this->assertNotContains($num, $location->numbers()->lists('number'));
	}

}
