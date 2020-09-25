<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class CurrentConnectionStatus
{
    private string $state;
    private ?string $port;
    private ?int $baudrate;
    private string $printerProfile;

    public function getState(): string
    {
        return $this->state;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function getBaudrate(): ?int
    {
        return $this->baudrate;
    }

    public function getPrinterProfile(): string
    {
        return $this->printerProfile;
    }
}
