<li>
    <a href="<?=\yii\helpers\Url::to(['/catservice/index','id'=>$service['id']])?>">
        <?=$service['name']?>
        <?php if(isset($service['childs'])) : ?>
            <!--            <span class="badge pull-right"><i class="fa fa-plus"></i></span>-->
        <?php endif?>
    </a>
    <?php if(isset($service['childs'])) : ?>
        <ul>
            <?=$this->getMenuHtml($service['childs'])?>
        </ul>
    <?php endif?>
</li>