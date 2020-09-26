<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO;

interface RequestDTOInterface
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_DELETE = 'DELETE';

    public function getPath(): string;
    public function getMethod(): string;
    public function getResponseClass(): ?string;
    public function getBody(): ?array;
}
