<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Products\Category;

class CategoriesController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Category $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->model    = $category;
        $this->view     = "products.categories";
        $this->singular = 'category';
        $this->plural   = 'categories';
    }
}
