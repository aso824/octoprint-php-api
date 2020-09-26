<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class FilePrint
{
    private int $success;
    private int $failure;
    private ?FileLastPrint $last = null;

    public function getSuccess(): int
    {
        return $this->success;
    }

    public function getFailure(): int
    {
        return $this->failure;
    }

    public function getLast(): ?FileLastPrint
    {
        return $this->last;
    }
}
