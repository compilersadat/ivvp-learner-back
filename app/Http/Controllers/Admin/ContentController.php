<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=Content::get();
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'description' => 'required',
            'file_url' => 'required',
            'type' => 'required',
            'branch' => 'required',
            'faculty' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $content = Content::create([
            'title' => isset($request->title) ? ($request->title) : '',
            'description' => isset($request->description) ? ($request->description) : '',
            'file_url' => isset($request->file_url) ? ($request->file_url) : '',
            'type' => isset($request->type) ? ($request->type) : '',
            'branch' => isset($request->branch) ? ($request->branch) : '',
            'faculty' => isset($request->faculty) ? ($request->faculty) : '',
            'month' => isset($request->month) ? ($request->month) : '',
            'year' => isset($request->year) ? ($request->year) : '',
            'status' => 1,
        ]);

        session()->flash('status', 'Content Create Successfully');
        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content=Content::where('id', $id)->first();
        return view('admin.contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required',
            'description' => 'required',
            'file_url' => 'required',
            'type' => 'required',
            'branch' => 'required',
            'faculty' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $content = [
            'title' => isset($request->title) ? ($request->title) : '',
            'description' => isset($request->description) ? ($request->description) : '',
            'file_url' => isset($request->file_url) ? ($request->file_url) : '',
            'type' => isset($request->type) ? ($request->type) : '',
            'branch' => isset($request->branch) ? ($request->branch) : '',
            'faculty' => isset($request->faculty) ? ($request->faculty) : '',
            'month' => isset($request->month) ? ($request->month) : '',
            'year' => isset($request->year) ? ($request->year) : '',
            'status' => 1,
        ];

        Content::where('id', $id)->first()->update($content);
        session()->flash('status', 'Content Update Successfully');
        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
