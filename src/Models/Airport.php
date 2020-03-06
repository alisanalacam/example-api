<?php
namespace App\Models;

use App\Abstracts\DatabaseAbstract;
use App\Abstracts\ModelAbstract;
use App\Interfaces\IDatabase;

class Airport extends ModelAbstract
{
    private $elevation_ft = 'elevation_ft';
    private $type = 'type';
    private $coordinates = 'coordinates';
    private $gps_code = 'gps_code';
    private $iata_code = 'iata_code';
    private $ident = 'ident';
    private $iso_country = 'iso_country';
    private $iso_region = 'iso_region';
    private $local_code = 'local_code';
    private $municipality = 'municipality';
    private $name = 'name';

    private $tableName = 'airports';

    private $databaseLayer;

    public function __construct(IDatabase $databaseLayer)
    {
        /** @var DatabaseAbstract $databaseLayer */
        $databaseLayer->setTable($this->tableName);
        $this->databaseLayer = $databaseLayer;
    }

    /**
     * @return string
     */
    public function getElevationFt(): string
    {
        return $this->elevation_ft;
    }

    /**
     * @param string $elevation_ft
     */
    public function setElevationFt(string $elevation_ft)
    {
        $this->elevation_ft=$elevation_ft;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type=$type;
    }

    /**
     * @return string
     */
    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    /**
     * @param string $coordinates
     */
    public function setCoordinates(string $coordinates)
    {
        $this->coordinates=$coordinates;
    }

    /**
     * @return string
     */
    public function getGpsCode(): string
    {
        return $this->gps_code;
    }

    /**
     * @param string $gps_code
     */
    public function setGpsCode(string $gps_code)
    {
        $this->gps_code=$gps_code;
    }

    /**
     * @return string
     */
    public function getIataCode(): string
    {
        return $this->iata_code;
    }

    /**
     * @param string $iata_code
     */
    public function setIataCode(string $iata_code)
    {
        $this->iata_code=$iata_code;
    }

    /**
     * @return string
     */
    public function getIdent(): string
    {
        return $this->ident;
    }

    /**
     * @param string $ident
     */
    public function setIdent(string $ident)
    {
        $this->ident=$ident;
    }

    /**
     * @return string
     */
    public function getIsoCountry(): string
    {
        return $this->iso_country;
    }

    /**
     * @param string $iso_country
     */
    public function setIsoCountry(string $iso_country)
    {
        $this->iso_country=$iso_country;
    }

    /**
     * @return string
     */
    public function getIsoRegion(): string
    {
        return $this->iso_region;
    }

    /**
     * @param string $iso_region
     */
    public function setIsoRegion(string $iso_region)
    {
        $this->iso_region=$iso_region;
    }

    /**
     * @return string
     */
    public function getLocalCode(): string
    {
        return $this->local_code;
    }

    /**
     * @param string $local_code
     */
    public function setLocalCode(string $local_code)
    {
        $this->local_code=$local_code;
    }

    /**
     * @return string
     */
    public function getMunicipality(): string
    {
        return $this->municipality;
    }

    /**
     * @param string $municipality
     */
    public function setMunicipality(string $municipality)
    {
        $this->municipality=$municipality;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name=$name;
    }

    public function getAll()
    {
        $this->setData($this->databaseLayer->getData());
        return $this->getData();
    }


}