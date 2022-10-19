<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request as RequestsRequest;
use Illuminate\Http\Request;
use App\Setting_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Setting_Controller extends Controller
{
	/** action  */
	public function actions(Request $request)
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);


		$method = $request->method;
		switch ($method) {
			case 'getData':
				$res  = $this->getData($request);
				break;
			case 'getSetting':
				$res  = $this->getSetting($request);
				break;
			case 'uploadAndEdit':
				$res  = $this->uploadAndEdit($request);
				break;
			case 'resetAudio':
				$res  = $this->resetAudio($request);
				break;
			default:
				$res = [
					'status' => 500,
					'message' => 'no command found'
				];
		}

		return response()->json($res, $res['status']);
	}

	public function getData($request)
	{
		try {
			$data = Setting_::all();

			return [
				'status' => 200,
				'message' => 'success',
				'data' => $data
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}

	public function getSetting($request)
	{
		try {
			$data = Setting_::find($request->id);
			return [
				'status' => 200,
				'message' => 'success',
				'data' => $data
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}

	public function uploadAndEdit($request)
	{
		try {

			/** edit table */
			$data = Setting_::findOrFail($request->id);

			$data->enable = filter_var($request->enable, FILTER_VALIDATE_BOOLEAN) ? '1' : '0';
			$data->play_agent_num = filter_var($request->play_agent_num, FILTER_VALIDATE_BOOLEAN) ? '1' : '0';

			$data->accept_digit	 = $request->accept_digit;

			if ($request->agent_num_prefix)
				$data->agent_num_prefix	 = $request->agent_num_prefix;

			if ($request->priority)
				$data->priority = $request->priority;


			$data->timespan = $request->timespan;

			$data->save();

			return [
				'status' => 200,
				'message' => 'success',
				'data' => $data,
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}

	public function resetAudio($request)
	{
		try {
			switch ($request->id) {
				case 1:
					$nameFile = "prompt-ltt";
					break;
				case 2:
					$nameFile = "prompt-ltf";
					break;
				case 3:
					$nameFile = "prompt-lmf";
					break;
				default:
					$nameFile  = null;
			}

			$data = Setting_::find($request->id);

			if ($request->audioNum == 1)
				$data->prompt1 = "$nameFile-1.wav";

			if ($request->audioNum == 2)
				$data->prompt2 = "$nameFile-2.wav";

			if ($request->audioNum == 3)
				$data->prompt3 = "$nameFile-3.wav";

			$data->save();

			return [
				'status' => 200,
				'message' => 'success',
				'data' => $data
			];
		} catch (\Throwable $th) {
			return [
				'status' => 500,
				'message' => 'faild',
				'error' => $th->getMessage()
			];
		}
	}

	public function uploads(Request $request)
	{
		try {
			$data = Setting_::find($request->id);
			
			switch ($request->id) {
				case 1:
					$nameFile = "prompt-ltt";
					break;
				case 2:
					$nameFile = "prompt-ltf";
					break;
				case 3:
					$nameFile = "prompt-lmf";
					break;
				default:
					$nameFile  = null;
			}
			if ($request->file('promp1')) {
				$files =  storage_path("app/$nameFile-1-New.wav");
				if (File::exists($files)) {
					Storage::disk('local')->delete("$nameFile-1-New.wav");
				}

				 Storage::disk('local')->put("$nameFile-1-New.wav", \File::get($request->file('promp1')));


				$data->prompt1 = "$nameFile-1-New.wav";
			}
			if ($request->file('promp2')) {
				$files =  storage_path("app/$nameFile-2-New.wav");
				if (File::exists($files)) {
					Storage::disk('local')->delete("$nameFile-2-New.wav");
				}

				 Storage::disk('local')->put("$nameFile-2-New.wav", \File::get($request->file('promp2')));
				$data->prompt2 = "$nameFile-2-New.wav";
			}
			if ($request->file('promp3')) {

				$files =  storage_path("app/$nameFile-3-New.wav");
				if (File::exists($files)) {
					Storage::disk('local')->delete("$nameFile-3-New.wav");
				}

				  Storage::disk('local')->put("$nameFile-3-New.wav", \File::get($request->file('promp3')));

				$data->prompt3 = "$nameFile-3-New.wav";
			}

			$data->save(); 

			return response()->json([
				'status'  => 200,
				'message' => 'success',
				 "data" => $data,
			], 200);
		} catch (\Throwable $th) {
			return 'unSuccess';
		}

			
	}
}
