<?php
 
namespace App\Traits;
use  GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

trait ApiTrait 
{
    private $apiKey;
    private $apiKeyQueryParameter;
    private $baseUri;
    private $client;

    protected function loadApiData() {
        $this->apiKey = '4ec327e462149c3710d63be84b81cf4f';
        $this->apiKeyQueryParameter = '?api_key=';
        $this->baseUri = 'https://api.themoviedb.org/3/';
        $this->client = new Client(['base_uri' => $this->baseUri]); 
    }

    protected function doRequest($uri): Response
    {
        return $this->client->request(
            'GET', 
            $uri . $this->apiKeyQueryParameter . $this->apiKey
        );
    }


}