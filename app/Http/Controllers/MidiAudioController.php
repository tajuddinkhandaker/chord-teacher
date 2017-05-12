<?php

namespace ChordTeacher\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use ChordTeacher\MidiAudio;

class MidiAudioController extends Controller
{
	private $__midi;

	public function __construct(MidiAudio $midi)
	{
		$this->__midi = $midi;
	}

    public function index()
    {
    	// Should be something like below
    	// return response()->json([ 'chords' => $this->__midi->chords() ]);
    	return view('keypad', [ 'chords' => $this->__midi->chords() ]);
    }

    public function show($midi)
    {
        $audio = new MidiAudio();
        $audio->audio_id = $midi;
    	return response()->json([ 'url' => $audio->url() ]);
    }
}
