<?php

namespace app\models;

use yii\base\Model;

class Telegram extends Model
{
    public $message;

    public function rules()
    {
        return [
            ["message", "required"],
        ];
    }
}