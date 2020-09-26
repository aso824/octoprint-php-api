<?php

declare(strict_types=1);

namespace aso824\OctoPrintPHP\DTO\File;

/**
 * @package aso824\OctoPrintPHP
 * @internal
 */
final class GCodeAnalysis
{
    private float $estimatedPrintTime;

    /** @var GCodeAnalysisFilamentTool[] */
    private ?array $filament = null;

    private ?GCodeAnalysisDimensions $dimensions = null;
    private ?GCodeAnalysisPrintingArea $printingArea = null;

    public function getEstimatedPrintTime(): float
    {
        return $this->estimatedPrintTime;
    }

    public function getFilament(): array
    {
        return $this->filament;
    }

    public function getDimensions(): ?GCodeAnalysisDimensions
    {
        return $this->dimensions;
    }

    public function getPrintingArea(): ?GCodeAnalysisPrintingArea
    {
        return $this->printingArea;
    }
}
