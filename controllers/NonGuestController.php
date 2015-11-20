<?php
/**
 * Created by PhpStorm.
 * User: acyuta
 * Date: 19.11.15
 * Time: 21:16
 */

namespace app\controllers;


use yii\web\Controller;

abstract class NonGuestController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return false;
        } else return parent::beforeAction($action);
    }

}