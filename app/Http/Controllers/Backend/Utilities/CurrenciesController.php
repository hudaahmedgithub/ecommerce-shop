<?php

namespace App\Http\Controllers\Backend\Utilities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Utilities\CurrencyRequest;
use App\Models\Utilities\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::paginate(20);

        return view('backend.utilities.currencies.index', compact('currencies'));
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
    public function store(CurrencyRequest $request)
    {
        if ($request->ajax()) {

            $currency = Currency::create($request->all());

            return response()->json([
                'message' => 'Added Successfully',
                'type' => 'store',
                'data' => $currency
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

            $currency = Currency::findOrFail($id);

            return response()->json([
                'message' => 'Found',
                'type' => 'edit',
                'data' => $currency
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
    public function update(CurrencyRequest $request, $id)
    {
        if ($request->ajax()) {

            $currency = Currency::findOrFail($id);

            $currency->update($request->all());

            return response()->json([
                'message' => 'Updated Successfully!',
                'type' => 'edit',
                'data' => $currency
            ], 200);
        }

        return response()->json([
            'message' => 'Can not access this page',
            'type' => 'edit',
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

            $currency = Currency::findOrFail($id);
            $currency->delete();

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
