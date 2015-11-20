<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;


class ConfigController extends Controller
{
    /**
     * Добавления пользователя
     * @param $name string
     * @param $password string
     */
    public function actionUserAdd($name, $password)
    {
        echo "Добавляем пользователя $name:$password\n";
        $u = new User();
        $u->username = $name;
        $u->setPassword($password);
        $u->generateAuthKey();
        if (!$u->save()) {
            echo "Ошибка: " .var_export($u->getFirstErrors()) . "\n";
        }
    }

    public function actionClubsLoad($filename) {
        if (!is_readable($filename))
        {
            die("Файл '$filename' не читается\n");
        } else {

        }
    }
}
