<?php

namespace App\Enums;


abstract class NotificationEnum  
{   
    const SUCCESS = 'success'; 
    const CREATE = 'create success';
    const UPDATE = 'update success';
    const DELETE = 'delete success';
    const ERROR = 'error';
    const CREATE_ERROR = 'create error';
    const UPDATE_ERROR = 'update error';
    const DELETE_ERROR = 'deleted error';
    const WARNING = 'warning';
    const INFO = 'info';
}
