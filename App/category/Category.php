<?php
namespace App\Category;
class Category
{
    public string $categoryCode;
    public string $categoryName;

    public function __construct($data)
    {
        $this->categoryCode = $data["categoryCode"];
        $this->categoryName = $data["categoryName"];
    }




}