<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;

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
        logger()->info("INICIANDO->payment-type-update-upcoming-dates");

        $paymentTypes = PaymentType::where('installment_enable', '=', 1)->get();

        foreach ($paymentTypes as $payType) {

            if (! $payType->next_processing) {
                continue;
            }

            $nextProcessing = Carbon::createFromFormat('Y-m-d', $payType->next_processing);
            $nextPayment = Carbon::createFromFormat('Y-m-d', $payType->next_payment);

            if (! $this->mustUpdate($nextProcessing)) {
                continue;
            }
                
            $update = [];
            $update['previous_processing'] = $nextProcessing->format('Y-m-d');
            $update['processing_day'] = $nextProcessing->format('d');
            $update['payment_day'] = $nextPayment->format('d');

            $updateNextProcessing = $nextProcessing->addMonth()->format('Y-m-d');
            $updateNextPayment = $nextPayment->addMonth()->format('Y-m-d');
            
            $update['next_processing'] = $updateNextProcessing;
            $update['next_payment'] = $updateNextPayment;

            $payType->update($update);

            logger()->info("Datas de processamento atualizadas: {$payType->description}");
        }
    }

    private function mustUpdate($nextProcessing)
    {
        $now = Carbon::now();

        logger()->info("DATA/HORARIO: {$now->format('Y-m-d H:i:s')}");

        if ($now >= $nextProcessing) {
            return true;
        }

        return false;
    }
}
