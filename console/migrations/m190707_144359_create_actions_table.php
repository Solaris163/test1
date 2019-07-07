<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actions}}`.
 */
class m190707_144359_create_actions_table extends Migration
{
    /**
     * {@inheritdoc}
     * Создаем таблицу с действиями пользователей
     * В принципе эту таблицу можно разбить еще на три, добавив отдельные таблицы для целей и типов
     */
    public function safeUp()
    {
        $this->createTable('{{%actions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(), //id пользователя, совершившего действие
            'rating' => $this->integer(), //оценка действия
            'action_date' => $this->date(), //дата действия
            'target' => $this->string(), //цель
            'type' => $this->string(), //тип
            'duration' => $this->integer(), //Длительность в секундах
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actions}}');
    }
}
