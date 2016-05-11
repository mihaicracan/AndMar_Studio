<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image as ImageLib;
use File;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    public $timestamps = false;

    public function add($id_album, $image) 
    {	
    	$this->id_album = $id_album;

    	$this->file = str_random(32).".".$image->guessExtension();

    	// Move image to proper path
    	$image->move(public_path('images/albums'), $this->file);

    	// Resize image
    	$resized = ImageLib::make(public_path('images/albums/'.$this->file))->widen(3000, function($constraint) {
    	    $constraint->aspectRatio();
    	    $constraint->upsize();
    	})->save('images/albums/'.$this->file);

        $this->width  = $resized->width();
        $this->height = $resized->height();
        $this->save();
    }

    public function getURL() 
    {
    	return url('images/albums/'.$this->file);
    }

    public function remove()
    {
    	$path = public_path('images/albums/'.$this->file);

    	if (!File::exists($path) || File::delete($path)) {
    		$this->delete();
    	}
    }
}
