<?php

namespace ruoshuiyx\builder\Concerns;

use ruoshuiyx\builder\Field;

/**
 * @method Field\Text           text($column, $label = '')
 * @method Field\Select         select($column, $label = '')
 * @method Field\Display        display($column, $label = '')
 */
trait HasFields
{
    /**
     * Available fields.
     *
     * @var array
     */
    public static $availableFields = [
        'select'  => Field\Select::class,
        'text'    => Field\Text::class,
        'display' => Field\Display::class,
    ];

    /**
     * Find field class.
     *
     * @param string $method
     *
     * @return bool|mixed
     */
    public static function findFieldClass($method)
    {
        if (array_key_exists($method, static::$availableFields)) {
            $class = static::$availableFields[$method];
            if (class_exists($class)) {
                return $class;
            }
        }
        return false;
    }
}