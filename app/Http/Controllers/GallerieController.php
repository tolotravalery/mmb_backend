<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use Illuminate\Http\Request;
use Validator;
use Response;

class GallerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallerie::all();
        return view('galleries.index')->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleries.create');
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
        $title=$request->input('title');
        $titres=str_replace(" ","-",$title);
        $gallerie=Gallerie::create([
            'title' => $request->input('title'),
            'type' => $request->input('type'),

        ]);
        $dossier="../../html/public/gfx/content/gallery/".$titres;
        mkdir($dossier);
        return redirect(url('galleries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallerie=Gallerie::find($id);
        return view('galleries.show');
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
