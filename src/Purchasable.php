<?php
/**
 * Created by PhpStorm.
 * User: Gino
 * Date: 2019/2/28
 * Time: 12:18 PM
 */

namespace Ginioo\Shop;


trait Purchasable
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $price;

    /**
     * @var
     */
    protected $currency;

    /**
     * @var
     */
    protected $stock;

    /**
     * @param array $props
     * @return Purchasable
     */
    public static function createProduct(array $props): self
    {
        $product = new self();
        $product->id = strtoupper($props['id'] ? (string)$props['id'] : uniqid("P"));
        $product->name = (string)$props['name'];
        $product->price = floatval($props['price']);
        $product->stock = intval($props['stock']);
        $product->currency = strtoupper($props['currency'] ? (string)$props['currency'] : "NTD");

        return $product;
    }


}