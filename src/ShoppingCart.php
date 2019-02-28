<?php
/**
 * Created by PhpStorm.
 * User: Gino
 * Date: 2019/2/28
 * Time: 1:35 PM
 */

namespace Ginioo\Shop;


class ShoppingCart
{
    use ClassProperties;

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $items = [];

    /**
     * @var array
     */
    protected $itemIdx = [];

    /**
     * @var
     */
    protected $price = 0;

    /**
     * @param array $items
     * @return ShoppingCart
     */
    public static function createShoppingCart($items = []): self
    {
        $cart = new self();
        $cart->id = strtolower(uniqid('cart'));

        if (is_array($items)) {
            foreach ($items as $key => $item) {
                $cart->add($item);
            }
        } else if ($items instanceof Product) {
            $cart->add($items);
        }

        return $cart;
    }

    /**
     * @param Product $product
     */
    public function add(Product $product): void
    {
        $this->items[] = $product;
        $this->price += $product->price;

        $this->itemIdx[$product->id] = array_search($product, $this->items);
    }

    /**
     * @param Product $product
     * @return ShoppingCart
     */
    public function remove(Product $product): self
    {
        $oldCart = clone $this;

        $key = $this->itemIdx[$product->id];
        if ($key >= 0) {
            $this->price -= $this->items[$key]->price;

            unset($this->items[$key]);
            $this->items = array_values($this->items);

            unset($this->itemIdx[$product->id]);
            $this->itemIdx = array_values($this->itemIdx);
        }

        return $oldCart;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return ceil($this->price);
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->items);
    }
}