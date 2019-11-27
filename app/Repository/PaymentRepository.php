<?php


namespace App\Repository;


use App\Sale;
use Carbon\Carbon;

class PaymentRepository
{

    public function getOverDuePayments()
    {
        $overdueCollection = [];
        /* get the last payments of all sales that are not yet paid  */
        $ongoingSale = Sale::where('remaining_balance', '>', 0)->get();
        $currentDate = Carbon::now();
        foreach ($ongoingSale as $currentOngoingSale) {

            $lastPayment = $currentOngoingSale->getLastPaymentHistory();
            $currentpaymentDate = Carbon::parse(strtotime($lastPayment->date_received));
            $nextPaymentDate = Carbon::parse($currentpaymentDate)->addMonths(1);

            if ($currentDate->greaterThan($nextPaymentDate)) {
                /*overdue*/
                $overdueCollection[] = [
                    "sale"=>$currentOngoingSale,
                    "overdue_date"=>$nextPaymentDate->format("F d,Y")
                ];
            }

        }

        return $overdueCollection;
        /*nice to have : if within 3 days , suggest to send notification  */
    }
}
