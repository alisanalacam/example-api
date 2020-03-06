<?php
namespace App\Drivers;

use App\Drivers\Database\MysqlDriver;
use App\Drivers\Database\JsonDriver;
use App\Interfaces\IDatabase;

class DatabaseLayer
{
    public function generate(string $driver): IDatabase
    {
        switch ($driver) {
            case 'Mysql':
                return new MysqlDriver();
            case 'Json':
            default:
                return new JsonDriver();
        }
    }
}