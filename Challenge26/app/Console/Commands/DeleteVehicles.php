<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;
use Carbon\Carbon;

class DeleteVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-vehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all soft-deleted vehicles and vehicles whose insurance date is expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $softDeletedVehicles = Vehicle::onlyTrashed()->count();
        Vehicle::onlyTrashed()->forceDelete();

        $expiredVehicles = Vehicle::where('insurance_date', '<', Carbon::today())->count();
        Vehicle::where('insurance_date', '<', Carbon::today())->forceDelete();

        $this->info("Deleted $softDeletedVehicles soft-deleted vehicles.");
        $this->info("Deleted $expiredVehicles vehicles with expired insurance dates.");
    }
}
