<?php

namespace App\Http\Controllers\Backend\Products;

use App\Models\Products\Slider;
use App\Http\Controllers\Backend\BackendController;

class SliderController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Slider $slider
     * @return void
     */
    public function __construct(Slider $slider)
    {
        $this->model    = $slider;
        $this->view     = "products.sliders";
        $this->singular = 'slider';
        $this->plural   = 'sliders';
    }
}
