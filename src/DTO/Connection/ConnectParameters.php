<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Connection;

final class ConnectParameters
{
    private ?string $port;
    private ?int $baudrate;
    private ?string $printerProfile;
    private ?bool $save;
    private ?bool $autoconnect;

    public function __construct(
        ?string $port = null,
        ?int $baudrate = null,
        ?string $printerProfile = null,
        ?bool $save = null,
        ?bool $autoconnect = null
    ) {
        $this->port = $port;
        $this->baudrate = $baudrate;
        $this->printerProfile = $printerProfile;
        $this->save = $save;
        $this->autoconnect = $autoconnect;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function getBaudrate(): ?int
    {
        return $this->baudrate;
    }

    public function getPrinterProfile(): ?string
    {
        return $this->printerProfile;
    }

    public function getSave(): ?bool
    {
        return $this->save;
    }

    public function getAutoconnect(): ?bool
    {
        return $this->autoconnect;
    }

    public function toArray(): array
    {
        return [
            'port' => $this->port,
            'baudrate' => $this->baudrate,
            'printerProfile' => $this->printerProfile,
            'save' => $this->save,
            'autoconnect' => $this->autoconnect,
        ];
    }
}
