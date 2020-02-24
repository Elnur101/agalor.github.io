
    <?php foreach($cats as $cat):?>
        <li><a href="<?=\yii\helpers\Url::to(['category/view','id'=>$cat->id])?>"><?=$cat->name?></a></li>
    <?php endforeach ?>

