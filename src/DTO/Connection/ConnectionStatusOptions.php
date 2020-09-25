<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class ConnectionStatusOptions
{
    /** @var string[] */
    private array $ports;

    /** @var int[] */
    private array $baudrates;

    /** @var ConnectionPrinterProfile[] */
    private array $printerProfiles;

    private ?string $portPreference;
    private ?int $baudratePreference;
    private string $printerProfilePreference;
    private bool $autoconnect;

    public function getPorts(): array
    {
        return $this->ports;
    }

    public function getBaudrates(): array
    {
        return $this->baudrates;
    }

    public function getPrinterProfiles(): array
    {
        return $this->printerProfiles;
    }

    public function getPortPreference(): ?string
    {
        return $this->portPreference;
    }

    public function getBaudratePreference(): ?int
    {
        return $this->baudratePreference;
    }

    public function getPrinterProfilePreference(): string
    {
        return $this->printerProfilePreference;
    }

    public function isAutoconnect(): bool
    {
        return $this->autoconnect;
    }
}
