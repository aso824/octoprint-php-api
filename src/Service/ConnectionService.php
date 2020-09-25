<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\Connection\ConnectionStatus;
use aso824\OctoPrintPHP\DTO\Connection\ConnectionStatusRequest;
use aso824\OctoPrintPHP\DTO\Connection\ConnectParameters;
use aso824\OctoPrintPHP\DTO\Connection\ConnectRequest;
use aso824\OctoPrintPHP\DTO\Connection\DisconnectRequest;
use aso824\OctoPrintPHP\DTO\Connection\FakeAckRequest;

/**
 * @package aso824\OctoPrintPHP\Service
 * @internal
 */
final class ConnectionService extends AbstractService implements ConnectionServiceInterface
{
    public function getStatus(): ConnectionStatus
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new ConnectionStatusRequest());
    }

    public function connect(?ConnectParameters $parameters = null): void
    {
        $this->doRequest(new ConnectRequest($parameters ?? new ConnectParameters()));
    }

    public function disconnect(): void
    {
        $this->doRequest(new DisconnectRequest());
    }

    public function fakeAck(): void
    {
        $this->doRequest(new FakeAckRequest());
    }
}
