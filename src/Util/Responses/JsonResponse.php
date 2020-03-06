<?php
namespace App\Util\Responses;

use Symfony\Component\HttpFoundation\Response;
use App\Interfaces\IResponse;

class JsonResponse implements IResponse
{
    private $_response;

    /**
     * JsonResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->_response = $response;
    }

    /**
     * @param array $data
     * @param int $statusCode
     * @return Response
     */
    public function response(array $data, int $statusCode = 200): Response
    {
        $this->_response->setStatusCode($statusCode);
        $this->_response->setContent(json_encode(
            [
                'error' => $statusCode === 200 ? true : false,
                'data' => $data,
            ]
        ));
        $this->_response->headers->set('Content-Type', 'application/json');
        return $this->_response;
    }
}