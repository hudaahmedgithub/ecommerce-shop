<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Products\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * The Model Name
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The View Folder Name as (plural)
     *
     * @var string
     */
    protected $view = 'records';

    /**
     * The model records name in plural case
     *
     * @var string
     */
    protected $plural = 'records';

    /**
     * The model record name in singular case
     *
     * @var string
     */
    protected $singular = 'record';

    /**
     * The Request that used to validate the inputs on "Store" method
     *
     * @var \Request
     */
    protected $store_request = Request::class;

    /**
     * The Request that used to validate the inputs on "Update" method
     *
     * @var \Request
     */
    protected $update_request = Request::class;

    /**
     * The Controller Constructor
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records    = $this->plural;
        $data       = $this->model::orderBy('created_at', 'desc')->paginate(20);
        $$records   = $data;
        
        return view('backend.' . $this->view . '.index', compact($records));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return can_not_access('create');
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

            # if the form has multiple images
            # --------------------------------
            if ($request->has('_images_table')) {

                $uplPath = 'public/products/images';

                if (count($request->file('image')) > 0) {

                    if (count($request->image) > 15 ) {
                        return back()->withInput(['image' => 'Images count can not be more than 15']);
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

            return create_success($record);
        }

        return can_not_access('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->ajax()) {
            $record = $this->model::findOrFail($id);

            return found_success($record);
        }

        return can_not_access();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $record = $this->model::findOrFail($id);

            return found_success($record);
        }

        return can_not_access();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = get_request($this->update_request);

        if ($request->ajax()) {
            $record = $this->model::findOrFail($id);

            $record->update($request->all());

            return found_success($record);
        }

        return can_not_access();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            $record = $this->model::findOrFail($id);
            $record->delete();

            return delete_success();
        }

        return can_not_access();
    }

    /**
     * Get all trashed records
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $records    = $this->plural;
        $data       = $this->model::onlyTrashed()->paginate(20);
        $$records   = $data;

        return view('backend.'. $this->view .'.trashed', compact($records));
    }

    /**
     * Restore the trashed record to un trashed records
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $record = $this->model::withTrashed()->findOrFail($id);
        $record->restore();

        return back();
    }

    /**
     * Force Delete the record from model table
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function force($id)
    {
        $record = $this->model::withTrashed()->findOrFail($id);
        $record->forceDelete();

        return back();
    }
}
