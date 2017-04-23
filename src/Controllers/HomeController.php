<?php 

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{

	public function index(Request $request, Response $response)
	{
		$message = 'Slim-API-Skeleton';

		$data = [
			'by'	=> 'Muhammad Iqbal',
		];

		return $this->responseDetail($message, $data);
	}
}