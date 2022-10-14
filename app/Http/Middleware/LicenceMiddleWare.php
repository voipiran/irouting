<?php

namespace App\Http\Middleware;

use App\Licence;
use Closure;

class LicenceMiddleWare
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$callStatsLicense   = Licence::where('app', 'irouting')->first();
		if (!$callStatsLicense) {
			return abort(404, 'permission denied');
		}

		return $next($request);
	}
}
