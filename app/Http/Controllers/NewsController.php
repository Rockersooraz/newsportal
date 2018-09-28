<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $news=News::all();
        return view('news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['category']=Category::all();
        return view('news.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,News $news)
    {
        $news->cat_id=$request->cat_id;
        $news->title=$request->title;
        $news->author=$request->author;
         if($request->image->getClientOriginalName())
        {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,9999).$ext;
            $request->image->storeAs('public/image/news',$file);
        }
        else
        {
            $file = '';
        }

        $news->image = $file;
        $news->description = $request->description;
        $news->save();
        return redirect()->route('news.index');       
       
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
    public function edit(News $news)
    {
        $arr['news']=$news;
        $arr['category']=Category::all();
        return view('news.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
         $news->cat_id=$request->cat_id;
        $news->title=$request->title;
        $news->author=$request->author;
        if(isset($request->image) && $request->image->getClientOriginalName())
        {
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,9999).$ext;
            $request->image->storeAs('public/image/news',$file);
        }
        else
        {
             if(!$news->image)
            $file = '';
            else
                $file = $news->image;
        }

        $news->image = $file;       
        $news->description = $request->description;
        $news->save();
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);
        $news->delete();
        return redirect()->route('news.index');

    }
}
