<?php
/**
 * Created by PhpStorm.
 * User: almuko
 * Date: 12.07.2017
 * Time: 6:37
 */
namespace app\components;
use yii\bootstrap\Widget;
use app\models\Category;
class CatWidget extends Widget{

    public function run(){
        $cats = Category::find()->where('parent_id != 0')->all();
        include('cat.php');

    }
} 