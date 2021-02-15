<?php

namespace App\Http\Controllers;

use App\Models\PI;
use Decimal\Decimal;

class SunCircumferenceController extends Controller
{
    /**
     * @link https://solarsystem.nasa.gov/solar-system/sun/by-the-numbers/
     */
    protected const SUN_RADIUS = 695508;

    public function show()
    {
        $latest_pi = PI::latest()->limit(1)->first();

        $circumference_of_the_sun = new Decimal($latest_pi->value, $latest_pi->precision);
        $circumference_of_the_sun = $circumference_of_the_sun
            ->mul(new Decimal(self::SUN_RADIUS * 2));
        return response()->json([
            'current_pi' => $latest_pi->value,
            'circumference_of_the_sun' =>  $circumference_of_the_sun->toString(),
        ]);
    }
}
