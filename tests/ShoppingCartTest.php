<?php
/**
 * Created by PhpStorm.
 * User: Gino
 * Date: 2019/2/28
 * Time: 12:37 PM
 */

namespace Ginioo\ShopTests;

use Ginioo\Shop\ShoppingCart;
use PHPUnit\Framework\TestCase;
use Ginioo\Shop\Product;

final class ShoppingCartTest extends TestCase
{
    public function testCreateProduct(): void
    {
        $product = Product::createProduct([
            'id'       => 'P001',
            'name'     => 'A Sample Product',
            'price'    => 79,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals(79, $product->price);
        $this->assertEquals(Product::CURRENCY_NTD, $product->currency);
        $this->assertEquals(5, $product->stock);
    }

    public function testAddProductToShoppingCart(): void
    {
        $product = Product::createProduct([
            'id'       => 'P001',
            'name'     => 'A Sample Product',
            'price'    => 79,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);
        $this->assertInstanceOf(Product::class, $product);

        $cart = ShoppingCart::createShoppingCart($product);
        $this->assertInstanceOf(ShoppingCart::class, $cart);

        $this->assertEquals(1, count($cart->items));
    }

    public function testRemoveProductToShoppingCart(): void
    {
        $product1 = Product::createProduct([
            'id'       => 'P001',
            'name'     => 'A Sample Product',
            'price'    => 79,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);
        $this->assertInstanceOf(Product::class, $product1);

        $product2 = Product::createProduct([
            'id'       => 'P002',
            'name'     => 'A Sample Product 2',
            'price'    => 80,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);
        $this->assertInstanceOf(Product::class, $product2);

        $cart = ShoppingCart::createShoppingCart([$product1, $product2]);
        $this->assertInstanceOf(ShoppingCart::class, $cart);

        $this->assertEquals(2, count($cart->items));

        $itemsBeforeRemove = $cart->remove($product2);
        $this->assertEquals(1, count($cart->items));
        $this->assertEquals(2, count($itemsBeforeRemove));
    }

    public function testGetShoppingCartPrice(): void
    {
        $product1 = Product::createProduct([
            'id'       => 'P001',
            'name'     => 'A Sample Product',
            'price'    => 79,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);
        $this->assertInstanceOf(Product::class, $product1);

        $product2 = Product::createProduct([
            'id'       => 'P002',
            'name'     => 'A Sample Product 2',
            'price'    => 80,
            'currency' => Product::CURRENCY_NTD,
            'stock'    => 5,
        ]);
        $this->assertInstanceOf(Product::class, $product2);

        $cart = ShoppingCart::createShoppingCart([$product1, $product2]);
        $this->assertInstanceOf(ShoppingCart::class, $cart);

        $this->assertEquals(159, $cart->getPrice());
    }
}