<?php

namespace ruoshuiyx\builder\Field;

class Select extends Base
{
    /**
     * 设置选项
     *
     * @param array $options
     *
     * @return $this
     */
    public function options(array $options = [])
    {
        $this->options = $options;

        return $this;
    }
}