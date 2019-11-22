<?php 	

namespace APP\Services;
use GuzzleHttp\Client;

class Gurunavi
{
	private const REATAURANT_SEARCH_API_URL = 'https://api.gnavi.co.jp/RestSearchAPI/v3/';
	public function searchRestaurants(String $word): array
	{
		$client = new Client();
		$response = $client
		//selfはthisみたいな物
			->get(self::REATAURANT_SEARCH_API_URL,[
				'query' => [
					'keyid' => env('GURUNAVI_ACCESS_KEY'),
					'freeword' => str_replace(' ', ',', $word),
				],
				'http_errors' => false,
			]);
		
			return json_decode($response->getBody()->getContents(), true);
	}
}