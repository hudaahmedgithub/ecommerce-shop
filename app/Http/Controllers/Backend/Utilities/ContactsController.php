<?php

namespace App\Http\Controllers\Backend\Contacts;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\Backend\BackendController;

class ContactsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(20);

        return view('backend.contacts.index', compact('contacts'));
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
    public function store(PlaceRequest $request)
    {
        /* if ($request->ajax()) {
            
            $place = Place::create($request->all());

            return response()->json([
                'message' => 'Added Successfully',
                'type' => 'store',
                'data' => $place
            ], 200);
        } */

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
        if (request()->ajax()) {
            $contact = Contact::findOrFail($id);
            
            return response()->json([
                'message' => 'success',
                'data'  => $contact,
                'type' => 'show'
            ], 200);
        }

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
        /* if (request()->ajax()) {
            
            $place = Place::findOrFail($id);

            return response()->json([
                'message' => 'Found',
                'type' => 'edit',
                'data' => $place
            ], 200);
        } */

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
    public function update(PlaceRequest $request, $id)
    {
        /* if ($request->ajax()) {
            
            $place = Place::findOrFail($id);

            $place->update($request->all());

            return response()->json([
                'message' => 'Updated Successfully!',
                'type' => 'update',
                'data' => $place
            ], 200);
        } */

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
            
            $contact = Contact::findOrFail($id);
            $contact->delete();

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
