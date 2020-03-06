<?php
namespace App\Controllers;

use App\Services\AirportService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Util\Responses\JsonResponse;

class AirportController
{
    protected $airportService;

    public function __construct(AirportService $airportService)
    {
        $this->airportService = $airportService;
    }

    /**
     * Havayolu listelemesi yapar
     * Aldığı query parametreler: elevation_ft, type
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        $requestData = [];
        if ($request->query->has('elevation_ft')) {
            $requestData['elevation_ft'] = $request->query->get('elevation_ft');
        }
        if ($request->query->has('type')) {
            $requestData['type'] = $request->query->get('type');
        }

        $data = $this->airportService->getAirport($requestData);

        $jsonResponse = new JsonResponse($response);
        return $jsonResponse->response($data);
    }

    public function create()
    {

    }
}


