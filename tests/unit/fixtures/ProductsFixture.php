<?php
namespace tests\unit\fixtures;
 
use yii\test\ActiveFixture;

 
class ProductsFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Products';
    public $depends = ['tests\unit\fixtures\CountryFixture', 'tests\unit\fixtures\CategoryFixture'];
}