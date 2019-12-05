<?php

namespace App\Http\Controllers\Backend\Products;
use App\Http\Controllers\Backend\BackendController;
use App\Models\Products\Coupon;
use App\Http\Requests\Backend\Products\CouponRequest;

class CouponsController extends BackendController
{

    protected $store_request = CouponRequest::class;

    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Coupon $coupon
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->model    = $coupon;
        $this->view     = "products.coupons";
        $this->singular = 'coupon';
        $this->plural   = 'coupons';
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $request = get_request($this->store_request);

        if ($request->ajax()) {
            $record = $this->model::create($request->all());
            
            return create_success($record);
        }

        return can_not_access('store');
    }

}