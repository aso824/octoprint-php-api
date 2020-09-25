<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class DisconnectRequest implements RequestDTOInterface
{
    public function getPath(): string
    {
        return '/api/connection';
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_POST;
    }

    public function getResponseClass(): ?string
    {
        return null;
    }

    public function getBody(): ?array
    {
        return ['command' => 'disconnect'];
    }
}
