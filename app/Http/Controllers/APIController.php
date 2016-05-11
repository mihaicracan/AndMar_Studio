<?php

namespace App\Http\Controllers;

use Mail;
use stdClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Image;

class APIController extends Controller
{

    /**
     * Create a new admin controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function getAlbums()
    {
    	$albums = ALbum::all();

    	foreach ($albums as &$album) {
    		$album->images = $album->getImages();
    	}

    	return response()->json(array(
    		'albums' => $albums
    	));
    }

    public function postContact(Request $request)
    {   
        $contact = new stdClass();
        $contact->name    = $request->input('name');
        $contact->email   = $request->input('email');
        $contact->phone   = $request->input('phone');
        $contact->message = $request->input('message');

        Mail::send('emails.contact', ['contact' => $contact], function ($m) {
            $m->from('mihaigeorge.c@gmail.com', 'Andmar Studio');

            $m->to('andreilupusoara@yahoo.com');
            $m->cc('mihaigeorge.c@gmail.com');

            $m->subject('[ANDMAR STUDIO] New Contact Message');
        });

        return response()->json(array(
            'status' => 'success'
        ));
    }
}
