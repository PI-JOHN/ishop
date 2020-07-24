<?php


namespace app\widgets\menu;


use ishop\App;
use ishop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();

    }

    protected function getOptions($options)
    {
        foreach ($options as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }


    protected function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if (!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            if (!$this->data){
                $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }
            debug($this->data);
        }
        $this->output();
    }


    protected function output()
    {
        echo $this->menuHtml;
    }


    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => $node){
            if(!$node['parent_id']){
                $tree[$id] = $node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = $node;
            }
        }
        return $tree;
    }


    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab, $id);
        }
        return $str;
    }


    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}