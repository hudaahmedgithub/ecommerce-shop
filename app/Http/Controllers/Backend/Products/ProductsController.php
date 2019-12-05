<?php

namespace App\Http\Controllers\Backend\Products;

use App\Models\Products\Image;
use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Utilities\Country;
use App\Models\Utilities\Currency;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests\Backend\Products\TestRequest;

class ProductsController extends BackendController
{
    /**
     * The Controller Constructor
     *
     * @param \App\Models\Products\Product $product
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->model    = $product;
        $this->view     = "products.products";
        $this->singular = 'product';
        $this->plural   = 'products';
    }

    public function create()
    {
        $currencies = Currency::where('active', 'yes')->get();
        $countries  = Country::where('active', 'yes')->get();
        $categories = Category::where('active', 'yes')->get();

        return view('backend.products.products.create', compact('currencies', 'countries', 'categories'));
    }

    public function edit($id)
    {
        $currencies = Currency::where('active', 'yes')->get();
        $countries  = Country::where('active', 'yes')->get();
        $categories = Category::where('active', 'yes')->get();
        $product = $this->model::findOrFail($id);

        return view('backend.products.products.edit', compact('currencies', 'countries', 'categories', 'product'));
    }

    public function update($id)
    {
        $request = get_request($this->update_request);

        if ($request->ajax()) {
            $record = $this->model::findOrFail($id);
            $record->update($request->all());

            # if the form has multiple images
            # --------------------------------

            if ($request->has('_images_table') && is_array($request->file('image')) ) {

                $uplPath = 'public/products/images';

                if (count($request->file('image')) > 0) {

                    if (count($request->image) > 15 ) {
                        return back()->withInput(['image' => 'Images count can not be more than 15']);
                    }

                    $oldImages = Image::where("product_id", $id)->get();

                    foreach ($oldImages as $oneImage)
                    {
                        DB::table('images')->where('id', $oneImage->id)->delete();
                        removeFile($oneImage->path);
                    }

                    for($i = 0; $i < count($request->image); $i++) {

                        $image = uploadImage($request->image[$i], $uplPath);

                        if ($image == 'invalid_dimensions') {
                            return error_message('invalid_dimensions', 406);
                        }

                        if ($image == 'unexpected_error') {
                            return error_message('unexpected_error', 406);
                        }

                        Image::create([
                            'path' => $image,
                            'product_id' => $record->id
                        ]);
                    }
                }

            }
            # if the form has multiple images
            # -------------------------------
            return found_success($record);
        }

        return can_not_access();
    }

}