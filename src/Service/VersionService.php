<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\Service;

use aso824\OctoPrintPHP\DTO\Version\Version;
use aso824\OctoPrintPHP\DTO\Version\VersionRequest;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
class VersionService extends AbstractService implements VersionServiceInterface
{
    public function __invoke(): Version
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->doRequest(new VersionRequest());
    }
}
