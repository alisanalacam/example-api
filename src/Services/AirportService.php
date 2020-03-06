<?php
namespace App\Services;

use App\Models\Airport;
use App\Repositories\AirportRepository;

class AirportService
{
    protected $airportRepository;

    public function __construct(AirportRepository $airportRepository)
    {
        $this->airportRepository = $airportRepository;
    }

    /**
     * @param $params
     * @return Airport
     */
    public function getAirport(array $params): array
    {
        $airports = $this->airportRepository->getAirports($params);

        if (isset($params['type'])) {
            $airports = array_filter($airports, function ($airport) use($params) {
                return $airport->type == $params['type'];
            });
        }

        if (isset($params['elevation_ft'])) {
            $airports = array_filter($airports, function ($airport) use($params) {
                return $airport->elevation_ft >= $params['elevation_ft'];
            });
        }

        $airports = array_values($airports);


        return $airports;
    }
}