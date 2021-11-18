<?php

namespace ruoshuiyx\builder;

use ruoshuiyx\builder\Concerns\HasFields;

class FormBuilder
{
    use HasFields;

    // 表单项
    public $items = [];

    /**
     * @var array 模板变量
     */
    private $_vars = [
        'page_title'     => '',        // 页面标题
        'page_tips'      => '',        // 页面提示
        'tips_type'      => '',        // 提示类型
        'form_url'       => '',        // 表单提交地址 [默认为当前方法 + Post]
        'form_method'    => 'post',    // 表单提交方式
        'empty_tips'     => '暂无数据',    // 没有表单项时的提示信息
        'btn_hide'       => [],        // 要隐藏的按钮
        'btn_title'      => [],        // 按钮标题
        'btn_extra'      => [],        // 额外按钮
        'extra_html'     => '',        // 额外HTML代码
        'extra_js'       => '',        // 额外JS代码
        'extra_css'      => '',        // 额外CSS代码
        'submit_confirm' => false,     // 提交确认
        'form_items'     => [],        // 表单项目
        'form_data'      => [],        // 表单数据
        'show_all'       => true,      // 显示`查看全部`按钮
    ];

    /**
     * 添加表单构建器
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return Field
     */
    public function __call($method, $arguments)
    {
        if ($className = static::findFieldClass($method)) {
            $element = new $className($arguments[0], array_slice($arguments, 1));
            $this->pushField($element);

            return $element;
        }
    }

    /**
     * 添加表单项
     *
     * @param $field
     *
     * @return $this
     */
    public function pushField($field): self
    {
        $this->items[] = $field;

        return $this;
    }

}