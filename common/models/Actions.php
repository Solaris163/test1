<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "actions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $rating
 * @property string $action_date
 * @property string $target
 * @property string $type
 * @property int $duration
 *
 * @property Users $user
 */
class Actions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rating', 'duration'], 'integer'],
            [['action_date'], 'safe'],
            [['target', 'type'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'rating' => 'Rating',
            'action_date' => 'Action Date',
            'target' => 'Target',
            'type' => 'Type',
            'duration' => 'Duration',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    //метод возвращает до 10 пользователей из таблицы users со значением status_id не меньше 4
    //при этом пользователи имеют наибольшую сумму рейтингов совершенных действий из таблицы actions
    public static function getRatedUsers()
    {
        return Yii::$app->db->createCommand("SELECT users.id, users.name, users.surname FROM actions
        LEFT JOIN users ON actions.user_id = users.id WHERE users.status_id >= 4 GROUP BY user_id ORDER BY SUM(actions.rating) DESC LIMIT 10")
            ->queryAll();
    }

    //метод в качестве аргумента получает массив с id пользователей
    //метод возвращает масив id пользователей и количества их действий с рейтингом не ниже 7
    public static function getActionsOverRate7($arr)
    {
        return Yii::$app->db->createCommand("SELECT user_id, COUNT(*) as count FROM actions WHERE user_id IN ({$arr}) AND  rating >= 7 GROUP BY user_id")
            ->queryAll();
    }

    //метод в качестве аргумента получает массив с id пользователей
    //метод возвращает масив id пользователей и количества их действий с рейтингом ниже 7
    public static function getActionsUnderRate7($arr)
    {
        return Yii::$app->db->createCommand("SELECT user_id, COUNT(*) as count FROM actions WHERE user_id IN ({$arr}) AND  rating < 7 GROUP BY user_id")
            ->queryAll();
    }

}
