<?php

namespace App\Http\Controllers\Backend\Utilities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Utilities\CountryRequest;
use App\Models\Utilities\Country;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(20);

        return view('backend.utilities.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'create',
        ], 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        if ($request->ajax()) {

            $country = Country::create($request->all());

            return response()->json([
                'message' => 'Added Successfully',
                'type' => 'store',
                'data' => $country
            ], 200);
        }

        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'store',
        ], 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'show',
        ], 403);
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

            $country = Country::findOrFail($id);

            return response()->json([
                'message' => 'Found',
                'type' => 'edit',
                'data' => $country
            ], 200);
        }

        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'edit',
        ], 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        if ($request->ajax()) {

            $country = Country::findOrFail($id);

            $country->update($request->all());

            return response()->json([
                'message' => 'Updated Successfully!',
                'type' => 'update',
                'data' => $country
            ], 200);
        }

        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'update',
        ], 403);
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

            $country = Country::findOrFail($id);
            $country->delete();

            return response()->json([
                'message' => 'Deleted Successfully',
                'type' => 'destroy',
            ], 200);
        }

        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'destroy',
        ], 403);
    }
}
