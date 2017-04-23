<?php

namespace App\Controllers;

use Slim\Container;

abstract class BaseController
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function __get($property)
	{
		if ($this->container->{$property}) {
			return $this->container->{$property};
		}
	}

	/**
	 * Give Description About Response
	 * @param  int|200    $status   HTTP status code
	 * @param  string     $message
	 * @param  array      $data     [description]
	 * @param  array|null $meta     additional data
	 * @return $this->response->withHeader('Content-type', 'application/json')->withJson($response, $response['status']);
	 */
	public function responseDetail($message, $data = [], array $meta = null, $status = 200)
	{
		$response = [
			'status'	=> $status,
			'message'	=> $message,
			'data'		=> $data,
			'meta'		=> $meta,
		];

		if (empty($data) && !meta) {
			array_pop($response);
			array_pop($response);
		} elseif (!$meta) {
			array_pop($response);
		}

		return $this->response->withHeader('Content-type', 'application/json')->withJson($response, $response['status']);
	}
}