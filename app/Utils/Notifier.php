<?php

namespace App\Utils;

use App\Enums\NotificationEnum;

class Notifier
{
    public static function success($object, $alertType): array
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::CREATE:
                $notification = [
                    'message' => $object .' Created Successfully',
                    'alert_type' => NotificationEnum::SUCCESS
                ];
                break;
            case NotificationEnum::UPDATE:
                $notification = [
                    'message' => $object .' Updated Successfully',
                    'alert_type' => NotificationEnum::SUCCESS
                ];
                break;
            case NotificationEnum::DELETE:
                $notification = [
                    'message' => $object .' Deleted Successfully',
                    'alert_type' => NotificationEnum::SUCCESS
                ];
                break;
        }

        return $notification;
    }

    public static function error($object, $alertType): array
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::CREATE_ERROR:
                $notification = [
                    'message' => $object .' Creation Failed',
                    'alert_type' => NotificationEnum::ERROR
                ];
                break;
            case NotificationEnum::UPDATE_ERROR:
                $notification = [
                    'message' => $object .' Update Failed',
                    'alert_type' => NotificationEnum::ERROR
                ];
                break;
            case NotificationEnum::DELETE_ERROR:
                $notification = [
                    'message' => $object .' Deletion Failed',
                    'alert_type' => NotificationEnum::ERROR
                ];
                break;
        }

        return $notification;
    }

    public static function custom($message, $alertType): array
    {
        $notification = [];

        switch($alertType) 
        {
            case NotificationEnum::SUCCESS:
                $notification = [
                    'message' => $message,
                    'alert_type' => NotificationEnum::SUCCESS
                ];
                break;
            case NotificationEnum::ERROR:
                $notification = [
                    'message' => $message,
                    'alert_type' => NotificationEnum::ERROR
                ];
                break;
            
        }

        return $notification;
    }
}