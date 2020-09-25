<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class ConnectionPrinterProfile
{
    private string $id;
    private string $name;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
