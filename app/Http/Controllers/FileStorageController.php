<?php

namespace App\Http\Controllers;

use App\FileStorage;
use Illuminate\Http\Request;
use Storage;
use Auth;
class FileStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('formAuth:STG');
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
        if($request->hasFile('filedata'))
        {
            $request->file('filedata');
            $uri=Storage::putFile('public',$request->file('filedata'));
            $files=new FileStorage;
            $files->filename = $request->fname;
            $files->detail = $request->detail;
            $files->uri = $uri;
            $files->user_id=Auth::user()->id;
            $files->save();
            return redirect()->back()->with('message', 'Added Successfully');
        }
        else{
            return redirect()->back()->with('fail', 'Fail to upload');
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
