<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200312_144251_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
