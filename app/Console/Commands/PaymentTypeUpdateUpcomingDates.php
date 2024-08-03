<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PaymentTypeUpdateUpcomingDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'control-finance:payment-type-update-upcoming-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger()->info('control-finance:payment-type-update-upcoming-dates');
    }
}
