<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m200310_160401_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull(),
            'imageFile' => $this->string()->notNull(),
            'description' => $this->string(255)->notNull(),
            'is_feature' => $this->boolean()->notNull(),
            'is_season' => $this->boolean()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null()
        ], $tableOptions
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
