<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use App\Notifier\DuePaymentSMSNotifier;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function due_payment()
    {
        /* @TODO - show list of unpaid dues*/
        $overDuecreditApplications = CreditApplication::all();// get all overdue
        return view('payment.over_due')->with(compact('overDuecreditApplications'));
    }

    public function send_due_notification(DuePaymentSMSNotifier $duePaymentSMSNotifier)
    {
        $username_api = setting('API_USERNAME');
        $password_api = setting('API_PASSWORD');
        $duePaymentSMSNotifier->setCredential($username_api, $password_api);

        /* @TODO - get all overdued payment */
        /* foreach  customer  , get their mobile number*/
        /* prepare message  */
        /* send message */
        $duePaymentSMSNotifier->send();
    }
}
