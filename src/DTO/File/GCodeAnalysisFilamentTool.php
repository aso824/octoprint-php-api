<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class GCodeAnalysisFilamentTool
{
    private ?int $length = null;
    private ?float $volume = null;

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function getVolume(): ?float
    {
        return $this->volume;
    }
}
