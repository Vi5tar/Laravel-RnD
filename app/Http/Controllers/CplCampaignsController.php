<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CplCampaignsController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cpls = \App\cpl_campaign::orderBy('updated_at', 'desc')->get();

      return view('cplCampaigns', compact('cpls'));
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
      $cpl = new \App\cpl_campaign();

      $cpl->campaign = request('campaign');
      $cpl->premium_offer = request('premium_offer');
      $cpl->subjectline_1 = request('subjectline_1');
      $cpl->subjectline_2 = request('subjectline_2');
      $cpl->creative_1_name = request('creative_1_name');
      $cpl->creative_1_location = request('creative_1_location');
      $cpl->creative_2_name = request('creative_2_name');
      $cpl->creative_2_location = request('creative_2_location');
      $cpl->landing_page_url = request('landing_page_url');
      $cpl->utm_template = request('utm_template');

      $cpl->save();

      return redirect('/cplcampaigns');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //var_dump($id);
        $cplCampaign = \App\cpl_campaign::find($id);

        return view('viewCampaign', compact('cplCampaign'));
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
        $cplCampaign = \App\cpl_campaign::find($id);

        $cplCampaign->campaign = request('campaign');
        $cplCampaign->premium_offer = request('premium_offer');
        $cplCampaign->subjectline_1 = request('subjectline_1');
        $cplCampaign->subjectline_2 = request('subjectline_2');
        $cplCampaign->creative_1_name = request('creative_1_name');
        $cplCampaign->creative_1_location = request('creative_1_location');
        $cplCampaign->creative_2_name = request('creative_2_name');
        $cplCampaign->creative_2_location = request('creative_2_location');
        $cplCampaign->landing_page_url = request('landing_page_url');
        $cplCampaign->utm_template = request('utm_template');

        $cplCampaign->save();

        return redirect('/cplcampaigns');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\cpl_campaign::find($id)->delete();
        return redirect('/cplcampaigns');
    }
}
