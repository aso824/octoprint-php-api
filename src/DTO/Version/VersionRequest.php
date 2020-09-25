<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\Version;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

final class VersionRequest implements RequestDTOInterface
{
    public function getPath(): string
    {
        return '/api/version';
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_GET;
    }

    public function getResponseClass(): string
    {
        return Version::class;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
