<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $country_id
 * @property int|null $category_id
 * @property int|null $price
 * @property string|null $color
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Category $category
 * @property Country $country
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'category_id', 'price'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'color'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'country_id' => 'Country ID',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'color' => 'Color',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryyName()
    {
        $category = $this->category;
        return $category ? $category->name : '';
    }   
    
    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }     
    public function getCountryName()
    {
        $country = $this->country;
        return $country ? $country->name : '';
    }
   
}
