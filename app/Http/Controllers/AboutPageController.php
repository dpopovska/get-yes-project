<?php

namespace App\Http\Controllers;

use App\AboutCategory;
use App\AboutPage;
use App\Http\Requests;
use App\CustomFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    private $mainmenu = 'block-live-pages';

    private $submenu = 'about-page';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'showLive']);
    }
    
    /**
     * Display a listing of table: About.
     *
     * @return Response
     */
    public function index()
    {
        $members = AboutPage::AllOrderBy('created_at', 'DESC');

        return view('about-page.list')->with(array('members' => $members, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AboutCategory $about_category)
    {
        $categories = $about_category->getAllCategoriesAsArray();

        return view('about-page.create')->with(array('categories' => $categories, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

   /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AboutPage $about_page
     * @param  \App\CustomFunctions $custom_functions
     * @return Response
     */
    public function store(Request $request, AboutPage $about_page, CustomFunctions $custom_functions)
    {
        $this->validate($request, AboutPage::$aboutRules);

        $request->merge(array_map('trim', $request->except('_token', 'image', 'about_category_id')));

        $all_inputs = $request->all();

        $all_inputs['image'] = $custom_functions->createFilename($request);

        if($all_inputs['about_category_id'] == "") $all_inputs['about_category_id'] = null;

        $added_partner = $about_page->create($all_inputs);

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/about/');
        
        return redirect()->route('about.index')->with('success', 'New Member entry has been successfully created.');
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
     * @param  \App\AboutPage $about_page
     * @return Response
     */
    public function edit(AboutPage $about, AboutCategory $about_category)
    {
        $categories = $about_category->getAllCategoriesAsArray();

        return view('about-page.edit')->with(array('about' => $about, 'categories' => $categories, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AboutPage $about_page
     * @param  \App\CustomFunctions $custom_functions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutPage $about, CustomFunctions $custom_functions)
    {
        AboutPage::$aboutRules['name'] = 'required|alpha_space|unique:about,name,'.$about->id;

        AboutPage::$aboutRules['image'] = 'image';
        
        $this->validate($request, AboutPage::$aboutRules);

        $request->merge(array_map('trim', $request->except('_token', 'image', 'about_category_id')));

        $all_inputs = $request->all();

        $all_inputs['image'] = ($custom_functions->createFilename($request) != "") ? $custom_functions->createFilename($request) : (($about->image != "") ? $about->image : "");

        if($all_inputs['about_category_id'] == "") $all_inputs['about_category_id'] = null;

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/about/');

        $about->update($all_inputs);

        return redirect()->route('about.index')->with('success', 'Details have been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = (new AboutPage)->getMemberById($id);

        if(!is_null($member))
            Storage::delete('upload/about/'.$member->image);

        $member->delete();

        return redirect()->route('about.index')->with('success', 'Selected member has been successfully deleted.');
    }

    /**
     * Display the members on the live page
     *
     * @return \Illuminate\Http\Response
     */
    public function showLive(AboutCategory $about_category)
    {
        $categories = $about_category->getAllCategoriesAsArray();

        $members = AboutPage::AllOrderBy('created_at', 'DESC');

        return view('home.about')->with(['categories' => $categories, 'members' => $members, 'about' => 'active']);
    }

}
