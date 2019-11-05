<?php


namespace app\components;


use yii\base\Widget;

class MenuWidget extends Widget
{
    public $template;

    public function init()
    {
        parent::init();
        if ($this->template === null) {
            $this->template = 'menu';
        }
        $this->template .= '.php';
    }

    public function run()
    {
        return $this->template;
    }
}