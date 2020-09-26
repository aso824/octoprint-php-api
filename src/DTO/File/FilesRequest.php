<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

final class FilesRequest implements RequestDTOInterface
{
    private bool $recursive;
    private ?string $location;

    public function __construct(bool $recursive = false, ?string $location = null)
    {
        $this->recursive = $recursive;
        $this->location = $location;
    }

    public function getPath(): string
    {
        $path = '/api/files';

        if ($this->location) {
            $path .= '/' . $this->location;
        }

        $path .= '?recursive=' . ($this->recursive ? 'true' : 'false');

        return $path;
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_GET;
    }

    public function getResponseClass(): ?string
    {
        return FileList::class;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
