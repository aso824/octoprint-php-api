<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\Version\Version;

interface VersionServiceInterface extends ServiceInterface
{
    public function __invoke(): Version;
}
