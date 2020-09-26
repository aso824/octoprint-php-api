<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class DeleteFileRequest implements RequestDTOInterface
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return '/api/files/' . $this->path;
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_DELETE;
    }

    public function getResponseClass(): ?string
    {
        return null;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
