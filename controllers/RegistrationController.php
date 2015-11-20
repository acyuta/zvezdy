<?php
/**
 * Created by PhpStorm.
 * User: acyuta
 * Date: 19.11.15
 * Time: 21:15
 */

namespace app\controllers;


use app\models\Club;
use app\models\Concert;
use app\models\Couple;
use app\models\Tour;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RegistrationController extends Controller
{
    /**
     * Регистрация на концерт
     * @param $id integer идентификатор концерта
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($id)
    {
        $model = $this->findConcert($id);
        if (false === $model)
            throw new NotFoundHttpException("Этого конкурса не существует или он уже прошел.");
        else {
            $couple = new Couple();
            $bnames = Couple::getBoysNames();
            $bsurnames = Couple::getBoysSurnames();
            $gnames = Couple::getGirlsNames();
            $gsurnames = Couple::getGirlsSurnames();
            $tours = $model->getTours()->all();
            $clubs = ArrayHelper::map(Club::find()->all(), 'id', function ($club) {
                /* @var $club Club */
                return $club->name . ' (' . $club->leader . ')';
            }, 'city');
            if (count($clubs) == 0)
                throw new NotFoundHttpException("Отсутствуют клубы для регистрации");
            if (count($tours) == 0)
                throw new NotFoundHttpException("Туры на этот концерт еще не добавлены");

            if ($couple->load(\Yii::$app->request->post()) && $couple->validate()) {
                if ($couple->save()) {
                    $c = new Couple();
                    $c->bname = $couple->bname;
                    $c->bsurname = $couple->bsurname;
                    $c->gname = $couple->gname;
                    $c->gsurname = $couple->gsurname;
                    $c->byear = $couple->byear;
                    $c->gyear = $couple->gyear;
                    $c->club_id = $couple->club_id;
                    $couple = $c;
                    \Yii::$app->session->addFlash('success', 'Пара успешно зарегистрирована');
                } else {
                    \Yii::$app->session->addFlash('warning', 'Пара не зарегистрирована. Проверьте правильность информации');
                }
            }


            return $this->render('reg', [
                'model' => $couple,
                'bnames' => $bnames,
                'bsurnames' => $bsurnames,
                'gnames' => $gnames,
                'gsurnames' => $gsurnames,
                'years' => $this->getYears(1998, 2015),
                'tours' => $tours,
                'concert' => $model,
                'clubs' => $clubs,
            ]);
        }
    }

    public function actionList()
    {
        $all = Concert::find()->all();
        return $this->render('listindex', ['models' => $all]);
    }

    public function actionTour($id)
    {
        /** @var Tour $model */
        $model = Tour::findOne(['id' => $id]);
        if ($model === null)
            throw new NotFoundHttpException("Такого тура не существует");
        else {
            $provider = new ActiveDataProvider([
                'query' => $model->getCouples(),
            ]);
            return $this->render('list', ['provider' => $provider, 'tour' => $model]);
        }
    }

    /**
     * @param $id
     * @return null|static|Concert
     */
    private function findConcert($id)
    {
        return Concert::findOne(['id' => $id]);
    }

    private function getYears($from, $to)
    {
        $range = [];
        for ($i = $from; $i <= $to; $i++) {
            $range[$i] = $i;
        }
        return $range;
    }
}