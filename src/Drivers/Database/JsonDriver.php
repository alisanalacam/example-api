<?php
namespace App\Drivers\Database;

use App\Abstracts\DatabaseAbstract;
use App\Interfaces\IDatabase;

class JsonDriver extends DatabaseAbstract implements IDatabase
{
    /**
     * @var
     */
    private $path;

    public function __construct()
    {
        $this->connection();
    }

    /**
     * @return string
     */
    public function getAllData()
    {
        return $this->getData();
    }

    /**
     * @return string
     */
    public function getData()
    {
        $path = $this->path. "/". $this->getTable().".json";
        $data = file_get_contents($path);
        return json_decode($data);
    }

    /**
     * @description connection
     */
    public function connection()
    {
        $this->path = __DIR__.'/../../../jsonData';
    }


}