<?php
namespace App\Repositories;

use App\Models\Airport;

class AirportRepository
{
    protected $airportModel;

    /**
     * AirportRepository constructor.
     * @param Airport $airport
     */
    public function __construct(Airport $airport)
    {
        $this->airportModel = $airport;
    }

    public function getAirports(array $params)
    {
        return $this->airportModel->getAll($params);
    }
}