<?php

namespace Services;

use Illuminate\Http\Request;

interface ICrudServices
{
    /**
     * Display all records page
     *
     * @return mixed
     */
    public function index();

    /**
     * Display the create record page
     *
     * @return mixed
     */
    public function create();

    /**
     * Store the record data
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * Display the record page
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id);

    /**
     * Display the edit record form
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id);

    /**
     * Update the record data
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return mixed
     */
    public function update(Request $request,$id);

    /**
     * Delete the record
     *
     * @param  int $id
     * @return mixed
     */
    public function delete($id);
}
