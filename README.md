# ginioo/shopping-cart [![Build Status](https://travis-ci.org/Ginioo/shopping-cart.svg?branch=master)](https://travis-ci.org/Ginioo/shopping-cart)
a simple php shopping cart package

### Project setup
```
composer install
```

### Run test suite for development

Execute unit tests
```
composer test
```

List available tests 
```
composer list-tests
```

Sample
```php
$product1 = Product::createProduct([
    'id'       => 'P001',
    'name'     => 'A Sample Product',
    'price'    => 79,
    'currency' => Product::CURRENCY_NTD,
    'stock'    => 5,
]);


$product2 = Product::createProduct([
    'id'       => 'P002',
    'name'     => 'A Sample Product 2',
    'price'    => 80,
    'currency' => Product::CURRENCY_NTD,
    'stock'    => 5,
]);
        
$cart = ShoppingCart::createShoppingCart();
$cart->add($product1);
$cart->add($product2);
// or $cart = ShoppingCart::createShoppingCart([$product1, $product2]);

$cart->getCount(); // 2;

$oldCart = $cart->remove($product1);

$cart->getCount(); // 1
      
$cart->getPrice(); // 80
```