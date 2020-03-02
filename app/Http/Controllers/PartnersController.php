<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Partners;
use Illuminate\Http\Request;
use App\CustomFunctions;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    private $mainmenu = 'block-live-pages';

    private $submenu = 'partners';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of table: Partners.
     *
     * @return Response
     */
    public function index()
    {
        $partners = Partners::AllOrderBy('created_at', 'DESC');

        return view('partners.list')->with(array('partners' => $partners, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create')->with(array('mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Partners $partners
     * @param  \App\CustomFunctions $custom_functions
     * @return Response
     */
    public function store(Request $request, Partners $partners, CustomFunctions $custom_functions)
    {
        $this->validate($request, Partners::$partnersRules);

        $request->merge(array_map('trim', $request->except('_token', 'image')));

        $all_inputs = $request->all();

        $all_inputs['image'] = $custom_functions->createFilename($request);

        $added_partner = $partners->create($all_inputs);

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/partners/');
        
        return redirect()->route('partners.index')->with('success', 'New Partner entry has been successfully created.');
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
     * @param  \App\Partners $partners
     * @return Response
     */
    public function edit(Partners $partners)
    {
        return view('partners.edit')->with(array('partners' => $partners, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Partners $partners
     * @param  \App\CustomFunctions $custom_functions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partners $partners, CustomFunctions $custom_functions)
    {
        Partners::$partnersRules['name'] = 'required|alpha_space|unique:partners,name,'.$partners->id;

        Partners::$partnersRules['image'] = 'image';
        
        $this->validate($request, Partners::$partnersRules);
        
        $request->merge(array_map('trim', $request->except('_token', 'image')));

        $all_inputs = $request->all();

        $all_inputs['image'] = ($custom_functions->createFilename($request) != "") ? $custom_functions->createFilename($request) : (($partners->image != "") ? $partners->image : "");

        $custom_functions->uploadImage($request, $all_inputs['image'], 'upload/partners/');

        $partners->update($all_inputs);

        return redirect()->route('partners.index')->with('success', 'Details have been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = (new Partners)->getPartnerById($id);

        if(!is_null($partner))
            Storage::delete('upload/partners/'.$partner->image);

        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Selected partner has been successfully deleted.');
    }

}
