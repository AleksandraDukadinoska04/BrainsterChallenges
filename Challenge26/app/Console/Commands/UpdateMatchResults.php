<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Matches;
use Carbon\Carbon;

class UpdateMatchResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-matchesResults';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the results of matches played in the last 24 hours with random outcomes.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $now = Carbon::today();
        $yesterday = Carbon::yesterday();

        $matches = Matches::whereBetween('date', [$yesterday, $now])
            ->whereNull('result')
            ->get();

        if ($matches->isEmpty()) {
            $this->info("No matches found in the last 24 hours to update.");
        }

        foreach ($matches as $match) {

            $homeScore = rand(0, 10);
            $guestScore = rand(0, 10);

            $match->update([
                'result' => $homeScore . ':' . $guestScore,
            ]);

            $this->info("Updated match {$match->id} with home score: $homeScore, guest score: $guestScore");
        }
    }
}
