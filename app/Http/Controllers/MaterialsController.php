<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Materials;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    private $mainmenu = 'block-live-pages';

    private $submenu = 'materials';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['materialsList']]);
    }
    
    /**
     * Display a listing of table: Materials.
     *
     * @return Response
     */
    public function index()
    {
        $materials = Materials::AllOrderBy('created_at', 'DESC');

        return view('materials.list')->with(array('materials' => $materials, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
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
        //
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
        //
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
        //
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

    /**
     * Show list of all research items
     * 
     * @param  \App\Research $research
     * @param \App\ResearchCategory $research_category
     * @return \Illuminate\Http\Response
     */
    public function materialsList(Materials $materials)
    {
        return view('home.materials')->with(array('materials' => 'active'));
    }
}
