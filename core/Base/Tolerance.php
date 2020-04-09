<?php

namespace MachOrgUa\Base;


use MachOrgUa\Interfaces\ToleranceInterface;

class Tolerance implements ToleranceInterface
{
    /**
     * @var float
     */
    protected $minValue;

    /**
     * @var float
     */
    protected $maxValue;

    /**
     * Tolerance constructor.
     * @param float $minValue
     * @param float $maxValue
     */
    public function __construct($minValue, $maxValue)
    {
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
    }

    /**
     * @return float
     */
    public function getMaxValue(): float
    {
        return $this->maxValue;
    }

    /**
     * @return float
     */
    public function getMinValue(): float
    {
        return $this->minValue;
    }
}