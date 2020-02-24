<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\NotFoundHttpException;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $img_big
 * @property string $img_small
 * @property string $visible
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $keywords
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $image;
    public static function tableName()
    {
        return 'product';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'name'], 'required'],
            [['category_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['content', 'visible', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'img_big', 'img_small', 'keywords', 'description'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Категории'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'name' => Yii::t('app', 'Наимнование'),
            'content' => Yii::t('app', 'Контент'),
            'price' => Yii::t('app', 'Цена'),
            'img_big' => Yii::t('app', 'Большая картинка'),
            'img_small' => Yii::t('app', 'Маленькая картинка'),
            'visible' => Yii::t('app', 'Visible'),
            'hit' => Yii::t('app', 'Hit'),
            'new' => Yii::t('app', 'New'),
            'sale' => Yii::t('app', 'Sale'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function saveImageFile($filePath,$ext=null,$prefix=null){
        if($ext == null){
            $ext = 'png';
        }
        if($prefix == null){
            $prefix = 'photo_';
        }
        $randName = "gsghrigurdskjvkjxvryrughvksjv";
        $file = '';
        for($i=0;$i<6;$i++){
            $file .= rand(1,strlen($randName));
        }
        $image = Image::getImagine()->open($filePath);
        $size = $image->getSize();
        $ratio = $size->getWidth()/$size->getHeight();
        $width = 1024;
        $height = round($width/$ratio);
        $box = new Box($width,$height);
        $image->resize($box)->save('web/files/products/'.$prefix.$file.'.'.$ext);
        $box = new Box(270,300);
        $image->resize($box)->save('web/files/products/s_'.$prefix.$file.'.'.$ext);
        return $prefix.$file.'.'.$ext;



    }
}
