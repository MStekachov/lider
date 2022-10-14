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
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
