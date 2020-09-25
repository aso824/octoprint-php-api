<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Version;

use aso824\OctoPrintPHP\DTO\ResponseDTOInterface;

final class Version implements ResponseDTOInterface
{
    private string $api;
    private string $server;
    private string $text;

    public function getApi(): string
    {
        return $this->api;
    }

    public function setApi(string $api): void
    {
        $this->api = $api;
    }

    public function getServer(): string
    {
        return $this->server;
    }

    public function setServer(string $server): void
    {
        $this->server = $server;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
