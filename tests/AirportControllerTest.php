<?php
namespace Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class AirportControllerTest extends TestCase
{
    public function testGetAirportsSuccess()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/airports']);

        $response  = $client->request('GET');

        $body = json_decode($response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, $body->error);
    }

    public function testGetAirportsWithTypeSuccess()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/airports?type=heliport']);

        $response  = $client->request('GET');

        $body = json_decode($response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, $body->error);
    }

    public function testGetAirportsWithElevationFtSuccess()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/airports?elevation_ft=1100']);

        $response  = $client->request('GET');

        $body = json_decode($response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, $body->error);
    }

    public function testGetAirportsWithElevationFtAndTypeSuccess()
    {
        $client = new Client(['base_uri' => 'http://localhost:8080/airports?elevation_ft=1100&type=heliport']);

        $response  = $client->request('GET');

        $body = json_decode($response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, $body->error);
    }
}
