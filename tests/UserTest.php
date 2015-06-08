<?php

use App\Number;
use App\User;

class UserTest extends TestCase {

	public function testAddNumberToUser()
	{
		$user = new User();
		$user->save();
		$number = rand(9057640000, 9057649999);
		$data = ['number' => $number];
		$this->call('POST', '/users/' . $user->id . '/numbers', $data);
		
		$this->assertContains($number, $user->numbers()->lists('number'));
	}
	
	public function testRemoveNumberFromUser()
	{
		$user = new User();
		$user->save();
		$num = rand(9057640000, 9057649999);
		$data = ['number' => $num];
		$this->call('POST', '/users/' . $user->id . '/numbers', $data);
		$this->assertContains($num, $user->numbers()->lists('number'));
		
		$numberModel = new Number();
		$number = $numberModel::where('number', '=', $num)->firstOrFail();
		
		$this->call('DELETE', '/users/' . $user->id . '/numbers/' . $number->id);
		
		$this->assertNotContains($num, $user->numbers()->lists('number'));
	}

}
