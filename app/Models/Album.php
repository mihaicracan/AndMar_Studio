<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image as ImageLib;
use App\Models\Image;
use File;

class Album extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'albums';

    public $timestamps = false;

    public function add($request) 
    {	
        $this->name        = $request->input('name');
    	$this->description = $request->input('description');

    	// Get image from Request
    	$image = $request->file('image');

    	$this->cover = str_random(32).".".$image->guessExtension();
    	$this->save();

    	// Move image to proper path
    	$image->move(public_path('images/albums'), $this->cover);

    	// Resize image
    	ImageLib::make(public_path('images/albums/'.$this->cover))->widen(1000, function($constraint) {
    	    $constraint->aspectRatio();
    	    $constraint->upsize();
    	})->save('images/albums/'.$this->cover);
    }

    public function edit($request)
    {
            $this->name        = $request->input('name');
            $this->description = $request->input('description');

            if ($image = $request->file('image')) {
                $old_cover = $this->cover;

                $this->cover = str_random(32).".".$image->guessExtension();

                // Remove old cover
                $path = public_path('images/albums/'.$old_cover);
                File::delete($path);

                // Move image to proper path
                $image->move(public_path('images/albums'), $this->cover);

                // Resize image
                ImageLib::make(public_path('images/albums/'.$this->cover))->widen(1000, function($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('images/albums/'.$this->cover);
            }

            $this->save();
    }

    public function getCoverURL() 
    {
    	return url('images/albums/'.$this->cover);
    }

    public function getImages()
    {
        $images = Image::where('id_album', $this->id)->get();

        foreach ($images as &$image) {
            $image->url = $image->getURL();
        }

        return $images;
    }

    public function remove()
    {
    	$images = Image::where('id_album', $this->id)->get();

    	foreach ($images as $image) {
    	 	$image->remove();
    	}

    	$path  = public_path('images/albums/'.$this->cover);

    	if (!File::exists($path) || File::delete($path)) {
    		$this->delete();
    	}
    }
}
