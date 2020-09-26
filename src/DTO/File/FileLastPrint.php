<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class FileLastPrint
{
    private int $date;
    private int $printTime;
    private bool $success;

    public function getDate(): int
    {
        return $this->date;
    }

    public function getPrintTime(): int
    {
        return $this->printTime;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }
}
