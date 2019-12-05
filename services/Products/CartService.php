<?php

namespace Services\Products;

use Repositories\Eloquent\CartRepository;

class CartService
{
    /**
     * The Cart Repository
     *
     * @var \Repositories\Eloquent\CartRepository
     */
    private $cartRepository;

    /**
     * The Service Constructor
     *
     * @return void
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }
}
