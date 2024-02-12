<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Video as AntrianVideo;
use Cohensive\OEmbed\Facades\OEmbed;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On; 

class Video extends Component
{
    use LivewireAlert;
    public $tambah = false;
    public $editVideo = false;
    public $judulvideo;
    public $view = false;
    public $video;
    public $id_video;


    #[Rule ('required', message:"Nama Wajib Diisi")]
    public $judul;
    #[Rule ('required', message:"Nomor HP Wajib Diisi")]
    public $link;
    
    
    public function submit(){
        $this->validate();

        AntrianVideo::create([
            'judul' => $this->judul,
            'link' => $this->link
        ]);

        $this->alert('success','Tambah Data Berhasil 😍😍😍', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
           ]);
          
          $this->judul = '';
          $this->link = '';
          $this->tambah = false;
          $this->dispatch('tambahvideo');
    }


    public function editvideo($video_id){
        $selected_video = AntrianVideo::find($video_id);
        $this->judul = $selected_video->judul;
        $this->link = $selected_video->link;

        $this->tambah = true;
        $this->editVideo = true;
        $this->id_video = $video_id;
    }

    public function update(){
        $this->validate();

        AntrianVideo::whereKey($this->id_video)->update([
            'judul' => $this->judul,
            'link' => $this->link
        ]);

        $this->alert('success','Edit Data Berhasil 😍😍😍', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
           ]);

           $this->dispatch('tambahvideo');
          
    }

    public function deleteVideo($video_id){
        AntrianVideo::whereKey($video_id)->delete();

        $this->alert('success','Hapus Data Berhasil 😎', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
           ]);

    }

    public function addData(){
        $this->tambah = true;
    }

    public function closeData(){
        $this->tambah = false;
        $this->judul = '';
        $this->link = '';
    }

    public function showVideo($video_id){

        $this->view = true;
        $datavideo = AntrianVideo::find($video_id);
        $this->judulvideo = $datavideo->judul;
        $this->video = serialize(OEmbed::get($datavideo->link));
        
    }

    public function closeVideo(){
        $this->view = false;
        $this->video = '';
    }

    #[On('tambahvideo')] 
    public function render()
    {
        $videos = AntrianVideo::get();
        return view('livewire.admin.antrian.client.video', compact('videos'));
    }
}
