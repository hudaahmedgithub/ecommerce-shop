<?php

namespace App\Http\Controllers\Backend\Products;

use App\Models\Products\Review;
use App\Http\Controllers\Backend\BackendController;

class ReviewsController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Review $review
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->model    = $review;
        $this->view     = "products.reviews";
        $this->singular = 'review';
        $this->plural   = 'reviews';
    }
}
