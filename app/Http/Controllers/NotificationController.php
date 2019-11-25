<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class NotificationController extends Controller
{
    public function sendNotification(Customer $customer)
    {
        throw new Exception('Not yet implemented')
    }
}
