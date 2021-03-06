<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\AccessControl;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class CurrentUserRequest implements RequestDTOInterface
{
    public function getPath(): string
    {
        return '/api/currentuser';
    }

    public function getMethod(): string
    {
        return RequestDTOInterface::METHOD_GET;
    }

    public function getResponseClass(): string
    {
        return CurrentUser::class;
    }

    public function getBody(): ?array
    {
        return null;
    }
}
