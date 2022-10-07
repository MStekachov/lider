<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m221006_125259_create_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'INN' => $this->string(12)->unique()->notNull(),
            'title' => $this->string()->notNull(),
            'status' => $this->string(12)->notNull(),
            'login' => $this->string(128)->notNull(),
            'callnumber' => $this->string(18)->notNull(),
            'email' => $this->string(128)->notNull(),
            'created_at' => $this->dateTime(),
        ], $tableOptionsphp);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
