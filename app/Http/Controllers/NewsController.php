<?php

namespace App\Http\Controllers;

use App\CustomFunctions;
use App\Http\Requests;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $mainmenu = 'block-live-pages';
    private $submenu  = 'news';

    private $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['newsList', 'getSingleNews']]);
    }

    /**
     * Display a listing of table: News.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::AllOrderBy('created_at', 'desc');

        return view('news.list')->with(array('news' => $news, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create')->with(array('mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @param  \App\CustomFunctions $custom_functions
     * @return Response
     */
    public function store(Request $request, News $news, CustomFunctions $custom_functions)
    {
        $this->validate($request, News::$newsRules);

        $request->merge(array_map('trim', $request->except('_token', 'image', 'thumbnail')));

        $all_inputs = $request->all();

        $all_inputs['image'] = $custom_functions->createFilename($request);

        $all_inputs['thumbnail'] = $custom_functions->createFilename($request, 'thumbnail');

        $added_news = $news->create(['url_unique' => preg_replace('/[^\sa-zA-Z0-9&_-]+/', '', $custom_functions->checkNameUrl(trim($all_inputs['title']), 'news', 'url_unique')), 
                                     'title' => $all_inputs['title'], 'description' => htmlentities($all_inputs['description'], ENT_COMPAT, 'UTF-8'), 
                                     'image' => $all_inputs['image'], 'thumbnail' => $all_inputs['thumbnail'], 'created_by' => auth()->user()->id]);

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/news/'.$added_news->id.'/');

        $custom_functions->uploadImage($request, $all_inputs['thumbnail'], 'upload/news/'.$added_news->id.'/', 'thumbnail');
        
        return redirect()->route('news.index')->with('success', 'News item has been successfully created.');
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
     * @param  \App\News $news
     * @return Response
     */
    public function edit(News $news)
    {
        return view('news.edit')->with(array('news' => $news, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @param  \App\CustomFunctions $custom_functions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news, CustomFunctions $custom_functions)
    {
        News::$newsRules['title'] = 'required|alpha_num_spec|unique:news,title,'.$news->id;

        News::$newsRules['image'] = 'image';
        
        $this->validate($request, News::$newsRules);

        $request->merge(array_map('trim', $request->except('_token', 'image', 'thumbnail')));

        $all_inputs = $request->all();

        $all_inputs['image'] = ($custom_functions->createFilename($request) != "") ? $custom_functions->createFilename($request) : (($news->image != "") ? $news->image : "");

        $all_inputs['thumbnail'] = ($custom_functions->createFilename($request, 'thumbnail') != "") ? $custom_functions->createFilename($request, 'thumbnail') : (($news->thumbnail != "") ? $news->thumbnail : "");

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/news/'.$news->id.'/');

        $custom_functions->uploadImage($request, $all_inputs['thumbnail'], 'upload/news/'.$news->id.'/', 'thumbnail');

        $news->update(['title' => $all_inputs['title'], 'description' => htmlentities($all_inputs['description'], ENT_COMPAT, 'UTF-8'), 
                        'image' => $all_inputs['image'], 'thumbnail' => $all_inputs['thumbnail'], 'updated_by' => auth()->user()->id]);

        return redirect()->route('news.index')->with('success', 'Details have been successfully changed.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = (new News)->getNewsById($id);

        if(!is_null($news))
            Storage::deleteDirectory('upload/news/'.$news->id.'/');

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Selected news item has been successfully deleted.');
    }

    /**
     * Show list of all news
     * 
     * @param  \App\News $news
     * @param  \Illuminate\Http\Request $request
     * @param  string $year
     * @param  string $month
     * @return \Illuminate\Http\Response
     */
    public function newsList(News $news, Request $request, $year = null, $month = null)
    {
        $years = range(date("Y", strtotime("-4 year")), date("Y"));
        
        if($request->has('searchword'))
        {
            $this->validate($request, ['searchword' => 'required|alpha_num'], 
                            ['searchword.required' => 'The search word can not be empty!', 'searchword.alpha_num' => 'The search word may only contain letters and numbers!']);
        }
            
        $search = ($request->has('searchword')) ? $request->get('searchword') : null;

        $all_news = $news->getNewsList($search, $year, $month)->paginate(5)->appends(['searchword' => $search]);

        $archive = $news->getArchiveByYear($year);

        return view('home.news-list', compact('all_news', 'archive'))
               ->with(array('news' => 'active', 'months' => $this->months, 'years' => $years, 'active_month' => $month, 'active_year' => $year));
    }

    /**
     * Get the single news item and display it
     * 
     * @param  object $news 
     * @return \Illuminate\Http\Response
     */
    public function getSingleNews(News $news)
    {
        $years = range(date("Y", strtotime("-4 year")), date("Y"));

        $archive = $news->getArchiveByYear(null);

        return view('home.single-news', compact('archive'))
               ->with(array('news' => 'active', 'single_news' => $news, 'months' => $this->months, 'years' => $years, 'active_month' => null, 'active_year' => null));
    }
}
