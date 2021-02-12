<?php

namespace App\Console\Commands;

use App\Models\PI;
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
     * @var integer
     */
    protected const INCREMENT_VALUE = 8;

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
        $new_pi->value = $latest_pi->value;
        $next_starter = $latest_pi->next_starter == 0 ? 2 : $latest_pi->next_starter;

        for ($i = 1; $i < 5; $i++) {
            if ($i % 2 === 0) {
                $new_pi->value -= (4 / ($next_starter * ($next_starter + 1) * ($next_starter + 2)));
            } else {
                $new_pi->value += (4 / ($next_starter * ($next_starter + 1) * ($next_starter + 2)));
            }
            $next_starter = $next_starter + 2;
        }

        $new_pi->next_starter = $next_starter;
        $new_pi->save();

        return 0;
    }
}
