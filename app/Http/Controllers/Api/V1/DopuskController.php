<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Models\Range;
use App\Models\Tolerance;
use App\Models\TolerancesView;
use App\Repositories\DbToleranceRepository;
use Illuminate\Http\Request;
use MachOrgUa\Base\Zone;

class DopuskController extends Controller
{
    /**
     * @return array
     */
    public function rangesLimits()
    {
        return Range::query()->selectRaw('MAX(max_val) AS max_val, MIN(min_val) AS min_val')->first();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection|static
     */
    public function fieldsQualities(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|numeric|min:0',
        ]);

        $results = TolerancesView::query()->select('field', 'quality', 'system')
            ->bySize($request->get('size'))
            ->get();

        return $results->map(function (TolerancesView $result) {
            return ($result->system == Tolerance::SYSTEM_HOLE ? strtoupper($result->field) : $result->field) . $result->quality;
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function tolerance(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|numeric|min:0',
            'field-quality' => 'required|string|regex:' . Zone::PATTERN,
        ]);

        $zone = Zone::createFromString($request->get('field-quality'));
        $range = new \MachOrgUa\Base\Range((float) $request->get('size'));

        $tolerance = (new DbToleranceRepository())->getTolerance($range, $zone);

        return [
            'min_val' => $tolerance->getMinValue(),
            'max_val' => $tolerance->getMaxValue(),
        ];
    }
}