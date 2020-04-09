<?php

namespace MachOrgUa\Base;


use MachOrgUa\Exceptions\Exception;

class Range
{
    const _1_3 = [1, 3];
    const _3_6 = [3, 6];
    const _6_10 = [6, 10];
    const _10_14 = [10, 14];
    const _14_18 = [14, 18];
    const _18_24 = [18, 24];
    const _24_30 = [24, 30];
    const _30_40 = [30, 40];
    const _40_50 = [40, 50];
    const _50_65 = [50, 65];
    const _65_80 = [65, 80];
    const _80_100 = [80, 100];
    const _100_120 = [100, 120];
    const _120_140 = [120, 140];
    const _140_160 = [140, 160];
    const _160_180 = [160, 180];
    const _180_200 = [180, 200];
    const _200_225 = [200, 225];
    const _225_250 = [225, 250];
    const _250_280 = [250, 280];
    const _280_315 = [280, 315];
    const _315_355 = [315, 355];
    const _355_400 = [355, 400];
    const _400_450 = [400, 450];
    const _450_500 = [450, 500];

    /**
     * @var int
     */
    protected $minSize;

    /**
     * @var int
     */
    protected $maxSize;

    /**
     * @return array
     */
    public static function getAll() : array
    {
        $class = new \ReflectionClass(self::class);
        return array_values($class->getConstants());
    }

    /**
     * Range constructor.
     * @param float $size
     * @throws Exception
     */
    public function __construct($size)
    {
        $currentRange = null;
        if ($size == self::_1_3[0]) {
            $currentRange = self::_1_3;
        } else {
            $ranges = self::getAll();
            foreach ($ranges as $range) {
                if ($size <= $range[1]) {
                    $currentRange = $range;
                    break;
                }
            }
        }

        if ($currentRange) {
            $this->minSize = $currentRange[0];
            $this->maxSize = $currentRange[1];
        } else {
            throw new Exception("Size '$size' is out of the possible ranges");
        }
    }

    /**
     * @return int
     */
    public function getMaxSize(): int
    {
        return $this->maxSize;
    }

    /**
     * @return int
     */
    public function getMinSize(): int
    {
        return $this->minSize;
    }
}