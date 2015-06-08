<?php

use App\Number;

class NumberTest extends TestCase {
    
	public function testAddNumber()
	{
		// find a number that is a valid US number
		$num = rand(9057640000, 9057649999);
		$data = ['number' => $num];
		$response = $this->call('POST', '/numbers/', $data);
		
		$this->assertEquals(200, $response->getStatusCode());
	}
	
	public function testAddNumberInvalid()
	{
		// find a number that is a valid US number
		$num = '7777';
		$data = ['number' => $num];
		$response = $this->call('POST', '/numbers/', $data);
		
		$this->assertEquals(400, $response->getStatusCode());
	}
	
	public function testEditNumber()
	{
		// find a number that is a valid US number
		$num = rand(9057640000, 9057649999);
		$data = ['number' => $num];
		$this->call('POST', '/numbers/', $data);
		
		$numberModel = new Number();
		$number = $numberModel::where('number', '=', $num)->firstOrFail();
		$editNum = rand(9057640000, 9057649999);
		$editData = ['number' => $num];
		$response = $this->call('PUT', '/numbers/' . $number->id, $editData);
		
		$this->assertEquals(200, $response->getStatusCode());
	}
	
	public function testEditNumberInvalid()
	{
		// find a number that is a valid US number
		$num = rand(9057640000, 9057649999);
		$data = ['number' => $num];
		$this->call('POST', '/numbers/', $data);
		
		$numberModel = new Number();
		$number = $numberModel::where('number', '=', $num)->firstOrFail();
		$editNum = '777777';
		$editData = ['number' => $editNum];
		$response = $this->call('PUT', '/numbers/' . $number->id, $editData);
		
		$this->assertEquals(400, $response->getStatusCode());
	}

}
