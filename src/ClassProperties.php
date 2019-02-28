<?php
/**
 * Created by PhpStorm.
 * User: Gino
 * Date: 2019/2/28
 * Time: 2:06 PM
 */

namespace Ginioo\Shop;


trait ClassProperties
{
    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        return (property_exists($this, $name)) ? $this->{$name} : null;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        };
    }
}