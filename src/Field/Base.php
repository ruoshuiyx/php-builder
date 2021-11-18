<?php

namespace ruoshuiyx\builder\Field;

class Base
{
    /**
     * id
     *
     * @var string
     */
    protected $id;

    /**
     * 字段名称
     *
     * @var string
     */
    protected $column = '';

    /**
     * 字段标题
     *
     * @var string
     */
    protected $label = '';

    /**
     * 选项[select|radio等]
     *
     * @var array
     */
    protected $options = [];

    /**
     * 构造函数
     *
     * @param string $column
     * @param array  $arguments
     */
    public function __construct(string $column = '', $arguments = [])
    {
        $this->id = $column;
        $this->column = $column;
        $this->label = $arguments;
    }

}