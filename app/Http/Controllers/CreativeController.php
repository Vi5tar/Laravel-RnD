<?php

namespace App\Http\Controllers;

use App\Creative;
use Illuminate\Http\Request;
use App\Jobs\Creatives\inlineCss;

class CreativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $uploads = \App\Creative::orderBy('created_at', 'desc')->get();


      return view('creativeupload', compact('uploads'));
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
      $creative = new \App\Creative();

      $creative->send_date = request('send_date');
      $creative->brand = request('brand');
      $creative->sub_brand = request('sub_brand');
      $creative->segment = request('segment');
      $creative->type = request('type');
      $creative->advertiser = request('advertiser');
      $creative->contract = request('contract');
      $creative->info = request('info');

      $file = request()->file('creative');

      //store original file and record location
      $creative->originalFile_Loc = $file->storeAs('creatives-original',  time() . '-' . $file->getClientOriginalName());
      //dd($creative->originalFile_Loc);

      //save to database
      $creative->save();

      //!!!!!I feel like the above could be done in the Model or a more
      //appropriate place

      //!!!!!I feel like the below could be done in a job
      inlineCss::dispatch($creative);


      //$dom = new \DOMDocument;
      //$dom->loadHTML($file);
      //dd($dom);
      //$images = $dom->getElementsByTagName('img');


      return redirect('/form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function show(Creative $creative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function edit(Creative $creative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creative $creative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creative $creative)
    {
        //
    }
}
