<?php

namespace App\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function sendResponse($result, $message)
	{
		$response = [
			'success' => true,
			'data'    => $result,
			'message' => $message,
		];

		return response()->json($response, 200);
	}

	public function sendError($error, $errorMessages = [], $code = 404)
	{
		$response = [
			'success' => false,
			'message' => $error,
		];

		if (!empty($errorMessages)) {
			$response['data'] = $errorMessages;
		}

		return response()->json($response, $code);
	}

	/**
	 * return menu of API routes
	 *
	 * @return Array String
	 */
	public function availableMenu () {
		$result = [
			'/menu:GET',
			'/register:POST|both-roles',
			'/login:POST|both-roles',
			'/logout:POST|both-roles',
			'/profile:RESOURCES|both-roles',
			'/report:RESOURCES|both-roles',
			'/donor:RESOURCES|admin',
			'/gallery:RESOURCES|admin',
			'/pendonoran:RESOURCES|admin'
		];
		$message = 'route yang tersedia pada API';
		return $this->sendResponse($result, $message);
	}
}
