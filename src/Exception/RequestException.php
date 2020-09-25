<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Exception;

use aso824\OctoPrintPHP\DTO\RequestDTOInterface;
use RuntimeException;
use Throwable;

final class RequestException extends RuntimeException implements OctoPrintPHPException
{
    public function __construct(RequestDTOInterface $requestDTO, Throwable $previous)
    {
        parent::__construct(
            sprintf('Request to endpoint [%s] failed: %s', $requestDTO->getPath(), $previous->getMessage()),
            0,
            $previous
        );
    }
}
