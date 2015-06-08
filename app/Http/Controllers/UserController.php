<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Number;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct(
		Number $number,
		User $user,
		Request $request
	) {
		$this->phone = $number;
		$this->user = $user;
		$this->request = $request;
	}
	
	public function addNumber($userId)
	{
		$user = $this->user->findOrFail($userId);
		
		//insert phone number into the number model
		$this->phone->number = $this->request->input('number');
		
		$user->numbers()->save($this->phone);
		
		return $user->numbers;
	}
	
	public function removeNumber($userId, $phoneId)
	{
		$user = $this->user->findOrFail($userId);
		
		//insert phone number into the number model
		$user->numbers()->where('id', '=', $phoneId)->delete();
		
		return $user->numbers;
	}

}
