<?php

namespace App\Repositories;


use App\Models\TolerancesView;
use MachOrgUa\Base\Range;
use MachOrgUa\Base\Tolerance;
use MachOrgUa\Base\Zone;
use MachOrgUa\Interfaces\ToleranceInterface;
use MachOrgUa\Interfaces\ToleranceRepositoryInterface;

class DbToleranceRepository implements ToleranceRepositoryInterface
{

    /**
     * @param Range $range
     * @param Zone $zone
     * @return ToleranceInterface
     */
    public function getTolerance(Range $range, Zone $zone): ToleranceInterface
    {
        /** @var TolerancesView $result */
        $result = TolerancesView::query()->select('min_val', 'max_val')
            ->where('min_size', '=', $range->getMinSize())
            ->where('max_size', '=', $range->getMaxSize())
            ->where('system', '=', $zone->getSystem()->getValue())
            ->where('field', '=', $zone->getField()->getValue())
            ->where('quality', '=', $zone->getQuality()->getValue())
            ->first();

        return new Tolerance($result->min_val, $result->max_val);
    }
}