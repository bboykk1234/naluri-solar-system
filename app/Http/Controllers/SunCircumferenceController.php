<?php

namespace App\Http\Controllers;

use App\Models\PI;
use Illuminate\Http\Request;

class SunCircumferenceController extends Controller
{
    /**
     * @link https://www.nasa.gov/sun converted from miles to km, and rounded up
     */
    protected const SUN_DIAMETER = 1392000;

    public function show(Request $req)
    {
        $latest_pi = PI::latest()->limit(1)->first();

        return response()->json([
            'current_pi' => $latest_pi->value,
            'circumference_of_the_sun' => $latest_pi->value * self::SUN_DIAMETER,
        ]);
    }
}
