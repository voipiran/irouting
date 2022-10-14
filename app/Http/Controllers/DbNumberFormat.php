<?php

namespace App\Http\Controllers;


use App\SettingDbNumberformatter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class DbNumberFormat extends Controller
{
	public function actions(Request $request)
	{
		$method = $request->method;

		switch ($method) {

			case 'getData':
				$res  = $this->getData($request);
				break;
			case 'update':
				$res  = $this->update($request);
				break;
			default:
				$res = [
					'status' => 500,
					'message' => 'no command found'
				];
		}
		return response()->json($res, $res['status']);
	}
	/** update data  ... */
	public function update($request)
	{
		try {

			$update = SettingDbNumberformatter::where('name', $request->data['name'])->where('descrioption', $request->data['descrioption'])->first();
			$update->enable = !$update->enable;
			$update->save();

			return [
				'status' => 200,
				'message' => 'success',
				'data' => $request->data,
				'update' => $update,
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}
	/** get data  ... */
	public function getData($request)
	{
		try {

			$setting = SettingDbNumberformatter::all();
			return [
				'status' => 200,
				'message' => 'success',
				'data' => $setting,
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}
}
