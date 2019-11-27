<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationHistory extends Model
{
    protected $table = 'sms_notification_history';
    protected $dates = ['created_at', 'updated_at'];
}
