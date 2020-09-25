<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\Connection\ConnectionStatus;
use aso824\OctoPrintPHP\DTO\Connection\ConnectParameters;

interface ConnectionServiceInterface extends ServiceInterface
{
    public function getStatus(): ConnectionStatus;
    public function connect(?ConnectParameters $parameters = null): void;
    public function disconnect(): void;
    public function fakeAck(): void;
}
