<?php
/**
 * Created by PhpStorm.
 * User: Gino
 * Date: 2019/2/28
 * Time: 12:28 PM
 */

namespace Ginioo\Shop;


class Product implements PurchaseInterface
{
    use ClassProperties, Purchasable;
}