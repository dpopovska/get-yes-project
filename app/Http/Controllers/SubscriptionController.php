<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $mainmenu = 'block-live-pages';
    private $submenu  = 'subscriptions';

    /**
     * Display a listing of the resource Subscriptions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::AllOrderBy('created_at', 'desc');

        return view('subscriptions.list')->with(array('subscriptions' => $subscriptions, 'mainmenu' => $this->mainmenu, 'submenu' => $this->submenu));
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
     * @param  \App\LandingPage  $subscription
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subscription $subscription)
    {
        $uri_segments = $request->segments();

        $last_segment = array_pop($uri_segments);

        // Because more than one field are on the same page with same functionality 
        // (2 email fields with subscription functionality on home page), we need
        // to make some kind of distinction (through $from value)  
        $from = (isset($last_segment) && $last_segment != "footer") ? "" : $last_segment."_";

        $this->validate($request, [$from.'email' => 'required|email|unique:subscriptions,email'], [$from.'email.unique' => 'You are already subscribed!']);

        $request->merge(array_map('trim', $request->only($from.'email')));

        $subscription->create(['email' => $request->get($from.'email')]);

        return redirect()->route('live-page')->with($from.'success', '*You have successfully subscribed to our mailing list!');
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
}
