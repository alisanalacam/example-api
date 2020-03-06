<?php
/**
 * Project core
 */
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Drivers\DatabaseLayer;

$request = Request::createFromGlobals();
$response = new Response();

$map = [
    '/airports' => 'AirportController@index|GET',
    '/airports/create' => 'AirportController@create|POST',
];

$path = $request->getPathInfo();
/** @var Symfony\Component\HttpFoundation\int $methodNotAllowed */
$methodNotAllowed = 405;
/** @var Symfony\Component\HttpFoundation\int $notFound */
$notFound = 405;

// route var ie
if (isset($map[$path])) {

    ob_start();
    extract($request->query->all(), EXTR_SKIP);

    $controllerPath = explode('@', $map[$path]);
    // controller ismini alır
    $controllerName = $controllerPath[0];

    $methodExplode = explode('|', $controllerPath[1]);
    $methodName = $methodExplode[0];
    $method = $methodExplode[1];

    if ($request->getMethod() !== $method) {
        $response->setStatusCode($methodNotAllowed);
    } else {

        // TODO: config'ten çekilecek
        $driver = 'Json';

        // Database katmanı ayarlanır
        $databaseLayer = new DatabaseLayer();
        $databaseLayer = $databaseLayer->generate($driver);

        // modele database katmanı injecte edilir.
        $modelClassName = 'App\Models\\'.str_replace('Controller', '', $controllerName);
        $model = new $modelClassName($databaseLayer);

        // repositorye model katmanı injecte edilir.
        $repositoryClassName = 'App\Repositories\\'.str_replace('Controller', 'Repository', $controllerName);
        $repository = new $repositoryClassName($model);

        // service repository katmanı injecte edilir.
        $serviceClassName = 'App\Services\\'.str_replace('Controller', 'Service', $controllerName);
        $service = new $serviceClassName($repository);

        // controllera service katmanı injecte edilir.
        $className = 'App\Controllers\\'.$controllerName;
        $controller = new $className($service);

        // route a göre controller içindeki metod çalıştırılır.
        $response = $controller->{$methodName}($request, $response);
    }
} else {
    $response->setStatusCode($notFound);
}

$response->send();
