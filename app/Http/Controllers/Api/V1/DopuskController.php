<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Models\Range;
use App\Models\Tolerance;
use App\Models\TolerancesView;
use Illuminate\Http\Request;

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
     * @return array
     */
    public function systems()
    {
        return Tolerance::SYSTEMS;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection|static
     */
    public function fieldsQualities(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|numeric|min:0',
            'system' => 'required|in:' . implode(',', Tolerance::SYSTEMS),
        ]);

        $system = $request->get('system');

        $results = TolerancesView::query()->select('field', 'quality')
            ->where('min_size', '<', $request->get('size'))
            ->where('max_size', '>', $request->get('size'))
            ->where('system', '=', $system)
            ->get();

        return $results->map(function (TolerancesView $result) use ($system) {
            return ($system == Tolerance::SYSTEM_HOLE ? strtoupper($result->field) : $result->field) . $result->quality;
        });
    }

    public function tolerance(Request $request)
    {
        $pattern = '~([a-zA-z]+)([0-9]+)~';
        $this->validate($request, [
            'size' => 'required|numeric|min:0',
            'field-quality' => 'required|string|regex:' . $pattern,
        ]);

        preg_match($pattern, $request->get('field-quality'), $fieldQuality);
        $field = $fieldQuality[1];
        $quality = $fieldQuality[2];

        $fieldLower = strtolower($field);
        $system = ($field === $fieldLower) ? Tolerance::SYSTEM_SHAFT : Tolerance::SYSTEM_HOLE;

        return TolerancesView::query()->select('min_val', 'max_val')
            ->where('min_size', '<', $request->get('size'))
            ->where('max_size', '>', $request->get('size'))
            ->where('system', '=', $system)
            ->where('field', '=', $fieldLower)
            ->where('quality', '=', $quality)
            ->first();
    }
}