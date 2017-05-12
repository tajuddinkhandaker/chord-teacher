<?php

namespace ChordTeacher;

use Illuminate\Database\Eloquent\Model;

class MidiAudio extends Model
{
    const STORAGE_PATH = 'storage/audio/';
    const FILES = [
    	[ 'name' => 'Guitar-3-Chord-A7.mid' ],
    	[ 'name' => 'Guitar-3-Chord-Ab7.mid' ],
    	[ 'name' => 'Guitar-3-Chord-B7.mid' ],
    	[ 'name' => 'Guitar-3-Chord-C7.mid' ],
    	[ 'name' => 'Guitar-3-Chord-D7.mid' ],
    	[ 'name' => 'Guitar-3-Chord-Db7.mid' ],
    ];

    private $__files = [];

    public function __construct()
    {
    	foreach (self::FILES as $value) {
    		$midi = array_add($value, 'title', $this->title($value['name']));
    		$midi = array_add($midi, 'id', strtolower(str_replace('.mid', '', $value['name'])));
    		$this->__files []= $midi;
    	}
    }

    private function title($name)
    {
        return str_replace('.mid', '', str_replace('Guitar-3-Chord-', '', $name));
    }

    public function chords()
    {
    	return collect($this->__files)->pluck('title', 'id')->all();
    }

    public function url()
    {
        foreach ($this->__files as $key => $value) {
            if($this->audio_id == $value['id'])
                return asset(self::STORAGE_PATH . $value['name']);
        }
        return '#';
    }
}
