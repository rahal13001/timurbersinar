<?php

namespace App\Livewire\Admin\Bukutamu;

use App\Models\Guestbook;
use Livewire\Component;

class Detailbukutamu extends Component
{
    public $nama, $instansi, $no_hp, $email, $jk, $lokasi, $pegawai, $keperluan,
    $tanggal, $datang, $pulang, $bukutamu_id, $edit_toggle;

    public function mount($bukutamu){
    
        $this->bukutamu_id = $bukutamu->id;
        $this->nama = $bukutamu->nama;
        $this->tanggal = $bukutamu->tanggal;
        $this->datang = $bukutamu->datang;
        $this->pulang = $bukutamu->pulang;
        $this->instansi = $bukutamu->instansi;
        $this->no_hp = $bukutamu->no_hp;
        $this->email = $bukutamu->email;
        $this->jk = $bukutamu->jk;
        $this->lokasi = $bukutamu->lokasi;
        $this->pegawai = $bukutamu->pegawai;
        $this->keperluan = $bukutamu->keperluan;

    }

    public function edit_toggle(){
        return $this->edit_toggle;
    }

    public function rules(){
        return [
            'nama' => 'required|max:100',
            'instansi' => 'required|max:100',
            'no_hp' => 'required|max:14',
            'email' => 'required|email|max:100',
            'jk' => 'required',
            'lokasi' => 'required',
            'pegawai' => 'nullable',
            'keperluan' => 'required',
            'tanggal' => 'required',
            'datang' => 'required',
            'pulang' => 'required'
        ];
}

public function messages(){
    return [
        'nama.required' => 'Nama wajib diisi',
        'nama.max' => 'Jumlah karakter maksimal sebanyak 100',
        'instansi.required' => 'instansi wajib diisi',
        'instansi.max' => 'nama instansi maximal 250 karakter',
        'no_hp.required' => 'No HP wajib diisi',
        'no_hp.max' => 'Nomor HP maksimal sebanyak 16 digit',
        'email.required' => 'Email wajib diisi',
        'email.max' => 'Alamat email maksimal 250 karakter',
        'jk.required' => 'Jenis kelamin wajib diisi',
        'lokasi.required' => 'Lokasi wajib diisi',
        'keperluan.required' => 'Keperluan wajib diisi',
        'tanggal' => 'Tanggal wajib diisi',
        'datang' => 'Jam datang wajib diisi',
        'pulang' => 'Jam pulang wajib diisi'
    ];
}

public function updated($inputbukutamu)
    {
        
        $this->validateOnly($inputbukutamu);
    }

    public function submit(){

        
        Guestbook::whereKey($this->bukutamu_id)->update([
            'nama' => $this->nama,
            'instansi' => $this->instansi,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'jk' => $this->jk,
            'lokasi' => $this->lokasi,
            'pegawai' => $this->pegawai,
            'keperluan' => $this->keperluan,
            'tanggal' => $this->tanggal,
            'datang' => $this->datang,
            'pulang' => $this->pulang,
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Edit Data Berhasil',
            'text' => '',
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);

        $this->edit_toggle = false;
    }

    public function render()
    {
        return view('livewire.admin.bukutamu.detailbukutamu');
    }
}
