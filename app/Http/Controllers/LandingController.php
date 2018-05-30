<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Response;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Landing::all();
        return view("landings.index")->with('images',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("landings.create");
    }
    protected function validator(array $data)
    {

        return Validator::make($data,
            [
                'title' =>'required',
                'image_cn' => 'required',
                'image_en' => 'required',
                'date_landing' => 'required',

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
        $image = $request->file('image_cn');
        $image2 = $request->file('image_en');
        $filename = $image->getClientOriginalExtension();
        $filename2 = $image2->getClientOriginalExtension();
        $input['image_cn'] = "cn".time() . '.' . $image->getClientOriginalExtension();
        $input['image_en'] = "en".time() . '.' . $image2->getClientOriginalExtension();
        $destinationPath = public_path('../../html/public/landing');
        $image->move($destinationPath, $input['image_cn']);
        $image2->move($destinationPath, $input['image_en']);
        $name_image = "public/landing/".$input['image_cn'];
        $name_image2 = "public/landing/".$input['image_en'];
        $landing = Landing::create([
            'title' => $request->input('title'),
            'image_cn' => $name_image,
            'image_en' => $name_image2,
            'active' => true,
            'date_landing'=> $request->input('date_landing'),
        ]);
        return redirect(url('landings'));
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
        $image=Landing::find($id);
        return view('landings.edit')->with('image',$image);
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
        $landing=Landing::find($id);
        if($request->file('image_cn')){
            $image = $request->file('image_cn');
            $filename = $image->getClientOriginalExtension();
            $input['image_cn'] = "cn".time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('../../html/public/landing');
            $image->move($destinationPath, $input['image_cn']);
            $name_image = "public/landing/".$input['image_cn'];
            $landing->image_cn = $name_image;
        }
        if($request->file('image_en')){
            $image2 = $request->file('image_en');
            $filename2 = $image2->getClientOriginalExtension();
            $input['image_en'] = "en".time() . '.' . $image2->getClientOriginalExtension();
            $destinationPath = public_path('../../html/public/landing');
            $image2->move($destinationPath, $input['image_en']);
            $name_image2 = "public/landing/".$input['image_en'];
            $landing->image_en = $name_image2;
        }
        $landing->title = $request->input('title');
        $landing->date_landing = $request->input('date_landing');
        $landing->save();
        return redirect(url('landings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Landing::find($id);
        $image->delete();
        Session::flash('message', 'Successfully deleted the landing!');
        return redirect(url('landings'));
    }
}
