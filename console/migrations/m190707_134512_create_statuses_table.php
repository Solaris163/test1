<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statuses}}`.
 */
class m190707_134512_create_statuses_table extends Migration
{
    protected $tableName = 'statuses';
    /**
     * {@inheritdoc}
     * Создаем таблицу статусов пользователей
     */
    public function safeUp()
    {
        $this->createTable('{{%statuses}}', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string()->notNull(),
            'to_send_message' => $this->integer(), //право отправлять сообщения
            'to_publish' => $this->integer(), //право публиковать информацию
            'to_look' => $this->integer(), //право просматривать информацию
        ]);

        //добавим внешний ключ для поля status_id таблицы users
        $this->addForeignKey('fk_users_statuses', 'users', 'status_id', $this->tableName, 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statuses}}');
    }
}
