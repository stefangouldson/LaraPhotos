<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create(int $album_id){
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'photo'=>'required|image'
        ]);

        //prep for image
        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '_' . $extension;

        //storing in folder
        $request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $filenameToStore);

        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album-id');
        $photo->save();

        return redirect()->to(route('album-show', $request->input('album-id')))->with('message','Photo Uploaded');
    }

    public function show($id) {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
    }

    public function destroy($id){
        $photo = Photo::find($id);

        if(Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
            return redirect()->to(route('home'))->with('message','Photo Deleted');
        }
    }
}
