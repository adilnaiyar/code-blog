<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::paginate(5);
        return view('admin.media.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $file = $request->file('file');
        
            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            Photo::create(['file' => $name]);

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
        
    }

    public function deleteMedia(Request $request)
    {

        // if(isset($request->delete_single))
        // {
        //     $photo = Photo::findOrFail($request->photo);

        //     $path = 'C:\xampp\htdocs'.$photo->file;
            
        //     unlink($path);

        //     $photo->delete();
            
        //     Session::flash('delete', 'Photo has been deleted');

        //     return redirect()->back();
        // }

        if(isset($request->delete_all) && !empty($request->checkBoxArray))
        {

            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {

                $path = 'C:\xampp\htdocs'.$photo->file;

                unlink($path);
                
                $photo->delete();
            }

            Session::flash('delete', 'Photo has been deleted');

            return redirect()->back();
        }
    }
}
