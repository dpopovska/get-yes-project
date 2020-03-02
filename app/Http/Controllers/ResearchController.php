<?php

namespace App\Http\Controllers;

use App\CustomFunctions;
use App\Http\Requests;
use App\Research;
use App\ResearchCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    private $mainmenu = 'block-live-pages';
    private $submenu  = 'research';

    /**
     * Display a listing of table: News.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = Research::AllOrderBy('created_at', 'desc');

        return view('research.list', compact('research'))->with(array('mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ResearchCategory $research_category)
    {
        $categories = $research_category->getAllCategoriesAsArray();

        return view('research.create', compact('categories'))->with(array('mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Research $research
     * @param  \App\CustomFunctions $custom_functions
     * @return Response
     */
    public function store(Request $request, Research $research, CustomFunctions $custom_functions)
    {
        $this->validate($request, Research::$researchRules);

        $request->merge(array_map('trim', $request->except('_token', 'document', 'research_category_id')));

        $all_inputs = $request->all();

        if($all_inputs['research_category_id'] == "") $all_inputs['research_category_id'] = null;

        $docName = $custom_functions->uploadDocument($request, $all_inputs['document'], 'upload/research/');

        $research->create(['document' => $docName, 'title' => $all_inputs['title'], 'description' => $all_inputs['description'], 
                           'research_category_id' => $all_inputs['research_category_id'], 'created_by' => auth()->user()->id]);

        return redirect()->route('research.index')->with('success', 'New Research entry has been successfully created.');
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
     * @param  \App\Research $research
     * @return Response
     */
    public function edit(Research $research, ResearchCategory $research_category)
    {
        $categories = $research_category->getAllCategoriesAsArray();

        return view('research.edit', compact('research', 'categories'))->with(array('mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Research $research
     * @param  \App\CustomFunctions $custom_functions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research, CustomFunctions $custom_functions)
    {
        Research::$researchRules['title'] = 'required|alpha_num_spec|unique:research,title,'.$research->id;
        
        Research::$researchRules['document'] = 'mimes:pdf,doc,docx,txt';

        $this->validate($request, Research::$researchRules);

        $request->merge(array_map('trim', $request->except('_token', 'document', 'research_category_id')));

        $all_inputs = $request->all();

        if($all_inputs['research_category_id'] == "") $all_inputs['research_category_id'] = null;

        $docName = (isset($all_inputs['document'])) ? $custom_functions->uploadDocument($request, $all_inputs['document'], 'upload/research/') : $research->document;

        $research->update(['document' => $docName, 'title' => $all_inputs['title'], 'description' => $all_inputs['description'], 
                           'research_category_id' => $all_inputs['research_category_id'], 'updated_by' => auth()->user()->id]);

        return redirect()->route('research.index')->with('success', 'Details have been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $research = (new Research)->getResearchById($id);

        if(!is_null($research))
            Storage::delete('upload/research/'.$research->document);

        $research->delete();

        return redirect()->route('research.index')->with('success', 'Selected research item has been successfully deleted.');
    }

    /**
     * Show list of all research items
     * 
     * @param  \App\Research $research
     * @param \App\ResearchCategory $research_category
     * @return \Illuminate\Http\Response
     */
    public function researchList(Research $research, ResearchCategory $research_category)
    {
        $categories = $research_category->getAllCategoriesAsArray();

        $all_items = Research::AllOrderBy('created_at', 'desc');

        return view('home.research', compact('categories', 'all_items'))->with(array('research' => 'active'));
    }

}
