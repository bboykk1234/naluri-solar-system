<?php

namespace App\Http\Controllers;

use App\Models\PI;
use Illuminate\Http\Request;

class SunCircumferenceController extends Controller
{
    /**
     * @link https://solarsystem.nasa.gov/solar-system/sun/by-the-numbers/
     */
    protected const SUN_RADIUS = 695508;

    public function show(Request $req)
    {
        $latest_pi = PI::latest()->limit(1)->first();

        return response()->json([
            'current_pi' => $latest_pi->value,
            'circumference_of_the_sun' =>  (self::SUN_RADIUS * $latest_pi->value) * 2,
        ]);
    }
}
