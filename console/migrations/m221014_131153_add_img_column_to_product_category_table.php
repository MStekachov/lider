<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_category}}`.
 */
class m221014_131153_add_img_column_to_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_category}}', 'img', $this->string(64));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_category}}', 'img');
    }
}
