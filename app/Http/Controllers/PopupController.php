<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Response;


class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popups = Popup::all();
        return view('popups.index')->with('popups', $popups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popups.create');
    }


    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' => 'required|max:100:title',

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
        $image = $request->file('path');
        $filename = $image->getClientOriginalExtension();
        $input['path'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('../../html/public/popup');
        $image->move($destinationPath, $input['path']);
        $name_image = "public/popup/".$input['path'];
        $popup = Popup::create([
            'title' => $request->input('title'),
            'path' => $name_image,
            'active' => true,
            'dateAjout'=> \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
        return redirect(url('popups'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $popup= Popup::find($id);
        return view('popups.show')->with('popup',$popup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popup=Popup::find($id);
        return view('popups.edit')->with('popup',$popup);
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
        $popup=Popup::find($id);
        $this->validator($request->all())->validate();
        $popup->title=$request->input('title');
        if($request->input('active')=="on"){
            $popup->active=1;
        }
        else{
            $popup->active=0;
        }
        if($request->file('path')){
            $image = $request->file('path');
            $filename = $image->getClientOriginalExtension();
            $input['path'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('../../html/public/popup');
            $image->move($destinationPath, $input['path']);
            $name_image = "public/popup/".$input['path'];
            $popup->path=$name_image;
        }
        $popup->save();
        return redirect(url('popups'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $popup=Popup::find($id);
        $popup->delete();
        Session::flash('message', 'Successfully deleted the popup!');
        return redirect(url('popups'));
    }
}
