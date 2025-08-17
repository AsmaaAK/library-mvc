<?php
namespace App\Notifications;

use App\Interfaces\NotificationInterface;

class EmailNotification implements NotificationInterface {
    public function send($message){
        echo "Email sent: $message<br>";
    }
}
