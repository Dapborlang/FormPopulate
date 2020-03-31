<?php

namespace App\Http\Controllers;

use App\FileStorage;
use Illuminate\Http\Request;
use Storage;
class FileStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('storage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file'))
        {
            $request->file('file');
            $uri=Storage::putFile('public',$request->file('file'));
            $files=new FileStorage;
            $files->filename = $request->fname;
            $files->detail = $request->detail;
            $files->uri = $uri;
        }
        else{
            return "Please select a file";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function show(FileStorage $fileStorage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function edit(FileStorage $fileStorage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileStorage $fileStorage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileStorage $fileStorage)
    {
        //
    }
}
