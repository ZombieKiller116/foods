<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscriber}}`.
 */
class m200312_144231_create_subscriber_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        $this->createTable('{{%subscriber}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(60)->unique()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscriber}}');
    }
}
