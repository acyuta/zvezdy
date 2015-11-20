<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Club;
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
            echo "Ошибка: " . var_export($u->getFirstErrors()) . "\n";
        }
    }

    public function actionClubsLoad($filename)
    {
        if (!is_readable($filename)) {
            die("Файл '$filename' не читается\n");
        } else {
            $strings = preg_split("/\n/", file_get_contents($filename));
            echo "Всего строк " . count($strings) . "\n";
            $current_city = "Default";
            foreach ($strings as $line) {
                if (strlen($line) > 0) {
                    if ($line[0] === '#')
                        $current_city = trim(preg_replace('/# /', '', $line));
                    else {
                        $club = preg_split('/:/', $line);
                        if (count($club) == 2) {
                            $boss = trim($club[1]);
                            $name = trim($club[0]);
                            $c = new Club();
                            $c->city = $current_city;
                            $c->name = $name;
                            $c->leader = $boss;
                            if (!$c->save()) {
                                var_export($c->errors);
                            }
                        }

                    }
                }

            }
        }
    }
}
