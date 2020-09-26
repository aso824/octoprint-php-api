<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class CopyFileRequest implements RequestDTOInterface
{
    private string $path;
    private string $destination;

    public function __construct(string $path, string $destination)
    {
        $this->path = $path;
        $this->destination = $destination;
    }

    public function getPath(): string
    {
        return '/api/files/' . $this->path;
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
        return [
            'command' => 'copy',
            'destination' => $this->destination,
        ];
    }
}
