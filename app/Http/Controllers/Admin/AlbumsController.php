<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Image;

class AlbumsController extends AdminController
{

    /**
     * Create a new admin controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();   
    }

    public function getIndex()
    {
        $albums = Album::all();

        return view('admin.albums.list')->with('albums', $albums);
    }

    public function getAdd()
    {
        return view('admin.albums.add');
    }

    public function postAdd(Request $request)
    {
        $album = new Album;
        $album->add($request);

        return redirect('/admin/albums')->with('success', true);
    }

    public function getEdit($id_album)
    {
        $album = Album::find($id_album);

        return view('admin.albums.edit')->with('album', $album);
    }

    public function postEdit(Request $request, $id_album)
    {
        $album = Album::find($id_album);
        $album->edit($request);

        return redirect('/admin/albums')->with('success', true);
    }

    public function getImages($id)
    {   
        $album  = Album::find($id);
        $images = Image::where('id_album', $id)->get();

        return view('admin.albums.images')->with(array(
            'album'  => $album,
            'images' => $images
        ));
    }

    public function getAddImages($id)
    {
        $album = Album::find($id);

        return view('admin.albums.add-images')->with(array(
            'album' => $album
        ));
    }

    public function postAddImages(Request $request, $id)
    {
        $images = $request->file('images');

        foreach ($images as $i) {
            $image = new Image;
            $image->add($id, $i);
        }

        return redirect('/admin/albums/'.$id.'/images')->with('success', true);
    }

    public function getDeleteImage($id_album, $id_image)
    {
        $image = Image::find($id_image);
        $image->remove();

        return redirect('admin/albums/'.$id_album.'/images');
    }

    public function getDeleteAlbum($id_album)
    {
        $album = Album::find($id_album);
        $album->remove();

        return redirect('admin/albums');
    }
}
