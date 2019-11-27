<?php

namespace App\Http\Controllers;

use App\Customer;
use App\NotificationHistory;
use App\Notifier\DuePaymentSMSNotifier;
use App\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class NotificationController extends Controller
{
    public function sendNotification(Request $request, DuePaymentSMSNotifier $notifier)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'overdue_date' => 'required',
            'product_id' => 'required',
        ]);

        $customer = Customer::findOrFail($validatedData['customer_id']);
        $product = Product::findOrFail($validatedData['product_id']);
        $messageTemplate = setting('overdue_notification_message_template');
        $messageTemplate = str_replace("[name]", $customer->getFullName(), $messageTemplate);
        $messageTemplate = str_replace("[overdue_date]", $validatedData['overdue_date'], $messageTemplate);
        $messageTemplate = str_replace("[product]", $product->name, $messageTemplate);
        $notifier->setMessage($messageTemplate);
        $notifier->setRecipient($customer->mobile_number);
        $retMessage = [
            'status' => 'Sending failed'
        ];
        if ($notifier->send()) {
            $retMessage = [
                'status' => "Notification sent!"
            ];
        }
        return redirect(url()->previous())->with($retMessage);
    }

    public function history()
    {
        $smsHistory = NotificationHistory::orderBy('id', 'desc')->get();
        return view('notif.history')->with([
            'smsHistory' => $smsHistory
        ]);
    }
}
