<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP;

interface ConfigurationInterface
{
    public function getHost(): string;
    public function getKey(): ?string;
}
