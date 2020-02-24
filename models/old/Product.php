<?php

namespace app\models;

use Imagine\Image\Box;
use Yii;
use yii\imagine\Image;
use yii\behaviors\TimestampBehavior;

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
            [['category_id', 'user_id', 'name', 'img_small', 'created_at'], 'required'],
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
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Категории'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Наименование'),
            'content' => Yii::t('app', 'Описание'),
            'price' => Yii::t('app', 'Цена'),
            'img_big' => Yii::t('app', 'Img Big'),
            'img_small' => Yii::t('app', 'Img Small'),
            'visible' => Yii::t('app', 'Скрыто'),
            'hit' => Yii::t('app', 'Хит'),
            'new' => Yii::t('app', 'Новинка'),
            'sale' => Yii::t('app', 'Продажа'),
            'keywords' => Yii::t('app', 'Ключевые слова'),
            'description' => Yii::t('app', 'Описание ключевика'),
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
