<?php

namespace app\controllers;


use yii\web\Controller;
use app\models\Telegram;


class TelegramController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionTest()
    {
        $form_model = new Telegram();
        if($form_model->load(\Yii::$app->request->post())){

            $message = $form_model['message'];
            $result = $this->sendMessage($message);
            return $this->render('receive', compact('result'));
        }
        return $this->render('message', compact('form_model'));
    }


    public function actionReceive()
    {
        $bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";

        $url = 'https://api.telegram.org/bot' . $bot_id . '/getUpdates?offset=0';
        $result = file_get_contents($url);
        $result = json_decode($result, true);


        return $this->render('receive', compact('result'));
    }


    public function sendMessage($text)
    {

        $bot_id = "1372199341:AAEG7UXyMvVYpHukmbnAwvwh4VU7rxH1gQk";
        $message = $text;
        $url = 'https://api.telegram.org/bot' . $bot_id . '/sendMessage?text='.$message.'&chat_id=285297695';
        $result = file_get_contents($url);
        $result = json_decode($result, true);

        return $result;



    }

}