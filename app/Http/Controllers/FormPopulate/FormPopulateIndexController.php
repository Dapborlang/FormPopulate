<?php

namespace App\Http\Controllers;

use App\FormPopulateIndex;
use Illuminate\Http\Request;

class FormPopulateIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excluded=json_encode(explode(',', $request->exclude));
        $notes=json_encode(explode('/', $request->notes));
        $cnotes=json_encode(explode('/', $request->cnotes));

        $formPopulate=new FormPopulateIndex();
        $formPopulate->form_populate_id =   $request->form_populate_id;
        $formPopulate->exclude          =   $excluded;
        $formPopulate->notes            =   $notes;
        $formPopulate->script           =   $request->script;
        $formPopulate->master_keys      =   $request->master_keys;
        $formPopulate->foreign_keys     =   $request->foreign_keys;
        $formPopulate->attribute           =   $request->attribute;
        $formPopulate->cnotes           =   $cnotes;
        $formPopulate->save();

        return redirect()->back()->with('message', 'Form Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormPopulateIndex  $formPopulateIndex
     * @return \Illuminate\Http\Response
     */
    public function show(FormPopulateIndex $formPopulateIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormPopulateIndex  $formPopulateIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(FormPopulateIndex $formPopulateIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormPopulateIndex  $formPopulateIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormPopulateIndex $formPopulateIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormPopulateIndex  $formPopulateIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormPopulateIndex $formPopulateIndex)
    {
        //
    }
}
