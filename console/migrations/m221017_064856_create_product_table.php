<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m221017_064856_create_product_table extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'slug' => $this->string(128)->unique()->notNull(),
            'cat_id' => $this->integer()->notNull(),
            'title' => $this->string(128)->defaultValue(null),
            'description' => $this->string(512),
            'pcode' => $this->string(12),
            'price' => $this->decimal(8, 2)->notNull(),
            'price_1' => $this->decimal(8, 2)->notNull(),
            'price_2' => $this->decimal(8, 2)->notNull(),
            'price_3' => $this->decimal(8, 2)->notNull(),
            'price_opt' => $this->decimal(8, 2)->notNull(),
            'img' => $this->string(64),
            'active' => $this->smallInteger(1)->defaultValue(1),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product-cat_id',
            'product',
            'cat_id',
            'product_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
