<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m221014_065904_create_product_category_table extends Migration
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

        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'slug' => $this->string(128)->unique()->notNull(),
            'title' => $this->string(128),
            'description' => $this->string(128),
            'text' => $this->text(),
            'subcategory' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category}}');
    }
}
