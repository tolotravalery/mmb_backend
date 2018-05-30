<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Validator;
use Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        return view("events.index")->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }
    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'name_en' => 'required|max:100:name_en',
                'name_cn' => 'required|max:100:name_cn',
                'sort_date' => 'required',
                'etype' => 'required',

            ]
        );

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $promoted=false;
        if($request->input('promoted')=="on"){
            $promoted=true;
        }
        $image1 = $request->file('path');
        $filename1 = $image1->getClientOriginalExtension();
        $image2 = $request->file('path2');
        $filename2 = $image2->getClientOriginalExtension();
        $input['path'] = "image_1".time() . '.' . $image1->getClientOriginalExtension();
        $input['path2'] = "image_2".time() . '.' . $image2->getClientOriginalExtension();
        $destinationPath = public_path('../../html/public/events');
        $image1->move($destinationPath, $input['path']);
        $image2->move($destinationPath, $input['path2']);
        $name_image1 = $input['path'];
        $name_image2 = $input['path2'];

        $event = Event::create([
            'name_en' => $request->input('name_en'),
            'name_cn' => $request->input('name_cn'),
            'display_date_en' => $request->input('display_date_en'),
            'display_date_cn' => $request->input('display_date_cn'),
            'sort_date' => $request->input('sort_date'),
            'path' => $name_image1,
            'path2' => $name_image2,
            'promoted'=> $promoted,
            'text_en'=>'',
            'text_cn'=>'',
            'etype'=> $request->input('etype'),
            'dateAjout'=> \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
        return redirect(url('events'));
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
        $event=Event::find($id);
        return view('events.edit')->with('event',$event);
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
        $event=Event::find($id);
        $this->validator($request->all())->validate();
        $event->name_en=$request->input('name_en');
        $event->name_cn=$request->input('name_cn');
        $event->display_date_en=$request->input('display_date_en');
        $event->display_date_cn=$request->input('display_date_cn');
        $event->sort_date=$request->input('sort_date');
        $event->etype=$request->input('etype');
        if($request->input('promoted')=="on"){
            $event->promoted=true;
        }
        else{
            $event->promoted=false;
        }
        $event->save();
        return redirect(url('events'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $event->delete();
        Session::flash('message', 'Successfully deleted the event!');
        return redirect(url('events'));
    }
}
