<?php
namespace App\Interfaces;

interface IResponse
{
    public function response(array $data, int $statusCode = 200);
}