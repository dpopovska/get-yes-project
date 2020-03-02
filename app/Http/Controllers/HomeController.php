<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\News;
use App\Partners;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * In case admin is logged in -> redirect to /users (in cms)
     * In case admin isn't logged in -> redirect to /login
     * 
     * @return \Illuminate\Http\Response
     */
    public function redirectAdmin()
    {
        if(auth()->check()) return redirect()->route('users.index');

        return redirect()->to('login');
    }

    /**
     * Show the application live HOME page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news)
    {
    	$partners = Partners::AllOrderBy('created_at', 'DESC');

        $last_news = $news->getLastNews(4);

        return view('home.index', compact('last_news', 'partners'))->with(array('home' => 'active'));
    }
}
