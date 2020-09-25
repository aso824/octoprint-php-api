<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Exception;

use RuntimeException;
use Throwable;

final class ServiceNotFoundException extends RuntimeException implements OctoPrintPHPException
{
    public function __construct(string $name, Throwable $previous = null)
    {
        parent::__construct(sprintf('OctoPrint service [%s] does not exist', $name), 0, $previous);
    }
}
