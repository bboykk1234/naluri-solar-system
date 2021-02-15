<?php

namespace App\Console\Commands;

use App\Models\PI;
use Decimal\Decimal;
use Illuminate\Console\Command;

class CalculatePI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pi:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate PI to increase accuracy';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $latest_pi = PI::latest()->limit(1)->first();

        $new_pi = new PI;
        $new_pi->precision = $latest_pi->precision + 1;
        $new_pi->value = $this->calculatePiUsingBBPFormula($new_pi->precision);

        $new_pi->save();

        return 0;
    }

    /**
     * @param integer $old_precision
     * @param integer $new_precision
     * @return string
     */
    protected function calculatePiUsingBBPFormula(int $precision)
    {
        $elements = [];
        foreach (range(0, $precision) as $k) {
            $first = (new Decimal(1, $precision))->div((new Decimal(16, $precision))->pow($k));
            $second = (new Decimal(4, $precision))->div(new Decimal(8 * $k + 1, $precision));
            $third = (new Decimal(2, $precision))->div(new Decimal(8 * $k + 4, $precision));
            $fourth = (new Decimal(1, $precision))->div(new Decimal(8 * $k + 5, $precision));
            $fifth = (new Decimal(1, $precision))->div(new Decimal(8 * $k + 6, $precision));
            $elements[] = $first * ($second->sub($third)->sub($fourth)->sub($fifth));
        }

        $pi = new Decimal(0, $precision);

        foreach ($elements as $element) {
            $pi = $pi->add($element);
        }

        return $pi->toString();
    }
}
