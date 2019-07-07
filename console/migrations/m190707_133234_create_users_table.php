<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190707_133234_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     * Создаем таблицу пользователей
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'surname' => $this->string(100),
            'email' => $this->string(),
            'phone' => $this->integer(),
            'status_id' => $this->integer(), //id статуса из таблицы statuses
            'rating' => $this->integer(), //рейтинг пользователя
            'registration_date' => $this->date(),
            'last_action_date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
