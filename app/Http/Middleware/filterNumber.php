<?php namespace App\Http\Middleware;

use Closure;
use libphonenumber\PhoneNumberUtil;

class filterNumber {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$number = $request->input('number');
		$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
		try {
		    $numberProto = $phoneUtil->parse($number, "US");
		} catch (\libphonenumber\NumberParseException $e) {
		    var_dump($e->getMessage());
		}
		$isValid = $phoneUtil->isValidNumber($numberProto);
		if (!$isValid) {
			abort(400);
		}
		
		return $next($request);
	}

}
