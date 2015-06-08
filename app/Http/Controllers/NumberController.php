<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Number;

use Illuminate\Http\Request;

class NumberController extends Controller {

	public function __construct(
		Number $number,
		Request $request
	) {
		$this->number = $number;
		$this->request = $request;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$numbers = $this->number->all();
		return $numbers;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$number = $this->number->create($this->request->all());
		return $number;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$number = $this->number->findOrFail($id);
		$number->fill($this->request->all());
		$number->save();
		return $number;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$number = $this->number->findOrFail($id);
		$number->destroy($id);
	}

}
