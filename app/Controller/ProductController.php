<?php
namespace Program\PHPMVC\Controller;

class ProductController{
    public function categories(string $productId, string $categoryId):void{
        echo "Product $productId, Category $categoryId";
    }
}