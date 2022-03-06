<?php

namespace app\models\Repositories;

use app\models\Products;
use app\models\Country;
use app\models\Category;
use yii\helpers\ArrayHelper;

class ProductsRepository extends Products
{
    public static function getCategoryList()
    {       
        $categories = Category::find()->asArray()
        ->all();

        return ArrayHelper::map($categories, 'id', 'name');
    }

    public static function getCountryList()
    {       
        $countries = Country::find()->asArray()
        ->all();

        return ArrayHelper::map($countries, 'id', 'name');
    }
    
    public static function getСolorList()
    {     
        $colors = Products::find()->select('color')->distinct()->asArray()
        ->all();      
        
        return ArrayHelper::map($colors, 'color', 'color');
    }

}