<?php
namespace IDCard;

use Framework\Factory;
use Framework\Product;

class IDCardFactory extends Factory
{
    private $owners = [];

    protected function createProduct(string $owner): Product
    {
        return new IDCard($owner);
    }
    protected function registerProduct(Product $product)
    {
        $this->owners[] = $product->getOwner();
    }
    public function getOwners(): array
    {
        return $this->owners;
    }
}
