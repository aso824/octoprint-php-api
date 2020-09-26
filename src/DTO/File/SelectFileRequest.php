<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class SelectFileRequest implements RequestDTOInterface
{
    private string $path;
    private bool $print;

    public function __construct(string $path, bool $print = false)
    {
        $this->path = $path;
        $this->print = $print;
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
            'command' => 'select',
            'print' => $this->print,
        ];
    }
}
