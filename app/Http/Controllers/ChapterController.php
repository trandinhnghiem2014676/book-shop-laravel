<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chapter;
use App\Models\Book;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.chapter.list',['chapter'=> Chapter::orderBy('id', 'DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::orderBy('id', 'DESC')->get();
        return view('admin.chapter.create', compact('books'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapter = Chapter::create([
            'name' => $request['name'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'id_books' => $request['id_books'],
        ]);
        
        return redirect()->to('/admin/chapter/list');
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
        return view('admin.chapter.update',['chapter'=> Chapter::where('id', $id)->firstOrFail(), 'books' => Book::all()]);
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
        
        $chapter = Chapter::find($id);
        $chapter->name=$request->name;
        $chapter->summary=$request->summary;
        $chapter->content=$request->content;
        $chapter->id_books=$request->id_books;
        $chapter->save();
        return redirect()->to('/admin/chapter/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::where('id',$id)->delete();

        return redirect()->back();
    }
}
