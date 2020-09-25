<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Request;

use aso824\OctoPrintPHP\ConfigurationInterface;
use aso824\OctoPrintPHP\DTO\RequestDTOInterface;
use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

interface RequestHandlerInterface
{
    public function setConfiguration(ConfigurationInterface $configuration): void;
    public function execute(RequestDTOInterface $requestDTO): ResponseDTOInterface;
}
