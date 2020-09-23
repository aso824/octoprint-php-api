<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP;

final class Configuration implements ConfigurationInterface
{
    private string $host;
    private ?string $key;

    public function __construct(string $host, ?string $key = null)
    {
        $this->host = $host;
        $this->key = $key;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }
}
