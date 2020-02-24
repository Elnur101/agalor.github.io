<?php
/**
 * Created by PhpStorm.
 * User: almuko
 * Date: 18.07.2017
 * Time: 11:11
 */
namespace app\components;
use yii\base\Widget;
use app\models\Category;
use app\models\Service;
use app\models\Catservice;
class ServiceWidget extends Widget{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init(){
        parent::init();

        $this->tpl .= 'service.php';
    }
    public function run(){
        $this->data = Catservice::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();

        $this->menuHtml = $this->getMenuHtml($this->tree);
        return $this->menuHtml;
    }

    protected function getTree(){
        $tree = [];
        foreach($this->data as $id=>&$node){
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach($tree as $service){
            $str .= $this->catToTemplate($service);

        }
        return $str;
    }
    protected function catToTemplate($service){
        ob_start();
        include __DIR__.'/menu_tpl/'.$this->tpl;
        return ob_get_clean();
    }
}