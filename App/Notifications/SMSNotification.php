<?php
namespace App\Notifications;

use App\Interfaces\NotificationInterface;

class SMSNotification implements NotificationInterface {
    public function send($message){
        echo "SMS sent: $message<br>";
    }
}
