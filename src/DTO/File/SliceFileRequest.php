<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class SliceFileRequest implements RequestDTOInterface
{
    private string $path;
    private SliceFileParameters $parameters;

    public function __construct(string $path, SliceFileParameters $parameters)
    {
        $this->path = $path;
        $this->parameters = $parameters;
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
        return File::class;
    }

    public function getBody(): ?array
    {
        return ['command' => 'select'] + array_filter($this->parameters->toArray());
    }
}
