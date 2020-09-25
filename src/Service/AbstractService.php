<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;
use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;
use aso824\OctoPrintPHP\Request\RequestHandlerInterface;

abstract class AbstractService implements ServiceInterface
{
    private RequestHandlerInterface $requestHandler;

    public function __construct(RequestHandlerInterface $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    protected function doRequest(RequestDTOInterface $requestDTO): ResponseDTOInterface
    {
        return $this->requestHandler->execute($requestDTO);
    }
}
