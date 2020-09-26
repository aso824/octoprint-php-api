<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class GCodeAnalysisDimensions
{
    private ?float $width = null;
    private ?float $height = null;
    private ?float $depth = null;

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }
}
