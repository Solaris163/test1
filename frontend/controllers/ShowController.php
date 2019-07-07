<?php


namespace frontend\controllers;


use common\models\Actions;
use common\models\Users;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ShowController extends Controller
{
    public function actionIndex()
    {
        //получим из базы пользователей с наибольшей суммой рейтингов совершенных действий
        $users = Actions::getRatedUsers();
        $users = ArrayHelper::index($users, 'id');//преобразуем в массив с ключами по id

        //получим массив с id этих пользователей;
        $arrId = implode(',', array_column($users, 'id'));

        //получим из базы количество действий этих пользователей с оценкой не ниже 7
        $actionsOverRate7 = Actions::getActionsOverRate7($arrId);
        $actionsOverRate7 = ArrayHelper::index($actionsOverRate7, 'user_id');//преобразуем в массив с ключами по user_id

        //получим из базы количество действий этих пользователей с оценкой ниже 7
        $actionsUnderRate7 = Actions::getActionsUnderRate7($arrId);
        $actionsUnderRate7 = ArrayHelper::index($actionsUnderRate7, 'user_id');//преобразуем в массив с ключами по user_id


        return $this->render('index', [
            'users' => $users,
            'actionsOverRate7' => $actionsOverRate7,
            'actionsUnderRate7' => $actionsUnderRate7,
        ]);

    }
}