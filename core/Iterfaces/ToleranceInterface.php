<?php

namespace MachOrgUa\Interfaces;


interface ToleranceInterface
{
    /**
     * @return float
     */
    public function getMaxValue() : float;

    /**
     * @return float
     */
    public function getMinValue() : float;
}