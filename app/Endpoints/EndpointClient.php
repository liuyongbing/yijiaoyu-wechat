<?php

namespace App\Endpoints;

use Exception;
use GuzzleHttp\Client;

class EndpointClient
{
    public $requestUrl;
    public $port;
    public $client;

    public function __construct(Client $client)
    {
        $this->requestUrl = env('APP_API_HOST');
        $this->port = env('APP_API_PORT');
        $this->client = $client;
    }

    public function getBodyByUrl($url)
    {
        return $this->client->request('GET', $url)->getBody();
    }

    public function get($uri, $parameters = [])
    {
        $contents = $this->getContents($uri, ['query' => $parameters], 'GET');

        return $contents;
    }

    public function post($uri, $parameters, $headers = [])
    {
        $contents = $this->getContents($uri, [
            'form_params' => $parameters,
            'headers' => $headers
        ], 'POST');

        return $contents;
    }

    public function put($uri, $parameters, $headers = [])
    {
        $contents = $this->getContents($uri, [
            'form_params' => $parameters,
            'headers' => $headers
        ], 'PUT');

        return $contents;
    }

    public function delete($uri, $parameters)
    {
        $contents = $this->getContents($uri, ['query' => $parameters], 'DELETE');

        return $contents;
    }
    
    public function upload($uri, $parameters, $headers = [])
    {
        $contents = $this->getContents($uri, [
            'multipart' => [$parameters],
            'headers' => $headers
        ], 'POST');
        
        return $contents;
    }

    private function getContents($uri, $parameters, $method = 'GET')
    {
        $body = $this->getBody($uri, $parameters, $method);
        $contents = $body->getContents();
        $contents = json_decode($contents, true);

        return $contents;
    }

    private function getBody($uri, $parameters, $method = 'GET')
    {
        $res = $this->request($uri, $parameters, $method);
        $statusCode = $res->getStatusCode();

        if (200 !== $statusCode) {
            throw new Exception("Error Request");
        }

        return $res->getBody();
    }

    private function request($uri, $parameters, $method = 'GET')
    {
        $url = $this->requestUrl . ':' . $this->port . '/' . $uri;

        if (empty($parameters['headers'])) {
            $parameters['headers']['Accept'] = 'application/x..v1+json';
        }
        return $this->client->request($method, $url, $parameters);
    }
}
