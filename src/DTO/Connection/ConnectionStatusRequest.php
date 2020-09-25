<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class ConnectionStatusRequest implements RequestDTOInterface
{
    public function getPath(): string
    {
        return '/api/connection';
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_GET;
    }

    public function getResponseClass(): string
    {
        return ConnectionStatus::class;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
