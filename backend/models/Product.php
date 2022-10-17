<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $cat_id
 * @property string $title
 * @property string $description
 * @property string $pcode
 * @property string $price
 * @property string $price_1
 * @property string $price_2
 * @property string $price_3
 * @property string $price_opt
 * @property string $img
 * @property int $active
 *
 * @property ProductCategory $cat
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'cat_id', 'price', 'price_1', 'price_2', 'price_3', 'price_opt'], 'required'],
            [['cat_id', 'active'], 'integer'],
            [['price', 'price_1', 'price_2', 'price_3', 'price_opt'], 'number'],
            [['name', 'slug', 'title'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 512],
            [['pcode'], 'string', 'max' => 12],
            [['img'], 'string', 'max' => 64],
            [['slug'], 'unique'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'cat_id' => 'Cat ID',
            'title' => 'Title',
            'description' => 'Description',
            'pcode' => 'Pcode',
            'price' => 'Price',
            'price_1' => 'Price  1',
            'price_2' => 'Price  2',
            'price_3' => 'Price  3',
            'price_opt' => 'Price Opt',
            'img' => 'Img',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'cat_id']);
    }
}
