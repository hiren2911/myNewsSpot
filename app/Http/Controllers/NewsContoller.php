<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

use Barryvdh\DomPDF\Facade as PDF;

class NewsContoller extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth', ['only' => ['store','create', 'destroy', 'showmyposts']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch last 10 news 
        $news_list = News::with('user')->orderBy('created_at','desc')->take(10)->get();
        return View('news.list',['news_list' => $news_list, 'mylist' => false]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showmyposts()
    {
        // Show users posts
        $news_list = News::where('user_id' , Auth::id())->orderBy('created_at','desc')->get();
        return View('news.list',['news_list' => $news_list, 'mylist' => true]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show news creation form

        return View('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $create_req = $request->all(['title','description']);
        $create_req['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $path = \basename($request->image->store('public'));
            $create_req['image'] = $path;
        }
        News::create($create_req);
        return redirect(route('myposts'))->with('msg','News created Succssfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
        return View('news.detail',['news' => $news]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function printnews(News $news)
    {
        $pdf = PDF::loadView('news.print_detail',['news' => $news]);
        return $pdf->download('New_details_'. ($news->id ).'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // 
        if($news->user->id !== Auth::id()) {
            throw new Exception('Not Allowed operation');
        }
        $news->delete();
        return redirect(route('myposts'))->with('msg','News removed Succssfully');
    }
}
