<?php

namespace MachOrgUa\Interfaces;


use MachOrgUa\Base\Range;
use MachOrgUa\Base\Zone;

interface ToleranceRepositoryInterface
{
    /**
     * @param Range $range
     * @param Zone $zone
     * @return ToleranceInterface
     */
    public function getTolerance(Range $range, Zone $zone): ToleranceInterface;
}