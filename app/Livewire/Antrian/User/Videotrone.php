<?php

namespace App\Livewire\Antrian\User;

use App\Models\admin\antrian\Video;
use Cohensive\OEmbed\Facades\OEmbed;
use Livewire\Component;

class Videotrone extends Component
{
    public $display, $id_video, $time, $lokasi;

    public function mount($location){
        
        $this->updateTime();
        $this->lokasi = $location->lokasi;
        $displayvideo = Video::first();
        $this->id_video = $displayvideo->id;
        $this->display = serialize(OEmbed::get($displayvideo->link));

    }

    public function selectedVideo($video_id){
        $selected_video = Video::whereKey($video_id)->first();
        $this->id_video = $selected_video->id;
        $this->display = serialize(OEmbed::get($selected_video->link));
    }

    public function render()
    {
        $videos = Video::get();
        setlocale(LC_TIME, 'id_ID');
        $date = date('j F Y');
        
        return view('livewire.antrian.user.videotrone', compact('videos', 'date'));
    }

    public function updateTime()
    {
        $this->time = now()->toTimeString();
    }
}
