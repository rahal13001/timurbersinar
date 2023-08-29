<?php

namespace App\Http\Livewire\Bukutamu\User;

use App\Models\Guestbook;
use Livewire\Component;

class Formbukutamu extends Component
{
    public $nama, $instansi, $no_hp, $email, $jk, $lokasi, $pegawai, $keperluan, $cekdata;

    

    public function cekdata()
    {
        $bukutamu = new Guestbook();
        $tanggal = date('Y-m-d');
        $cekdata = $bukutamu->where(['tanggal'=>$tanggal, 'no_hp'=>$this->no_hp, 'pulang'=>null])->count();
        $this->cekdata = $cekdata;
    }

    public function onInput($property, $callback)
    {
        $this->$property = $callback();
        $this->cekdata();
    }

    public function rules(){
        $this->cekdata();
  
        if ($this->cekdata == 0) {
            return [
                'nama' => 'required|max:100',
                'instansi' => 'required|max:100',
                'no_hp' => 'required|max:14',
                'email' => 'required|email|max:100',
                'jk' => 'required',
                'lokasi' => 'required',
                'pegawai' => 'nullable',
                'keperluan' => 'required'
            ];
        } else {
            return [
                'nama' => 'required|max:100',
                'no_hp' => 'required|max:14',
            ];
        }
        
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
        ];
    }
    
    public function updated($inputbukutamu)
    {
        
        $this->validateOnly($inputbukutamu);
    }

    public function datang(){
        $bukutamu = new Guestbook();
        $tanggal = date('Y-m-d');
        $this->cekdata();
        if ($this->cekdata == 0) {
            $this->validate();
            $bukutamu->nama = $this->nama;
            $bukutamu->instansi = $this->instansi;
            $bukutamu->no_hp = $this->no_hp;
            $bukutamu->email = $this->email;
            $bukutamu->jk = $this->jk;
            $bukutamu->lokasi = $this->lokasi;
            $bukutamu->pegawai = $this->pegawai;
            $bukutamu->keperluan = $this->keperluan;
            $bukutamu->tanggal = $tanggal;
            $bukutamu->datang = date('H:i:s');
            $bukutamu->save();

            $this->reset();
            $this->emit('updatebukutamu');

            $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'success',
                'title' => 'Data Kedatangan Berhasil Ditambah',
                'text' => '',
                'timer' => 5000,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'warning',
                'title' => 'Anda Telah Mengisi Data Kedatangan Atau Data Anda Sudah Digunakan',
                'text' => 'Harap Konfirmasi Ke Admin',
                'timer' => 5000,
                'timerProgressBar' => true,
            ]);
        }
        


    }

    public function pulang(){
        $bukutamu = new Guestbook();
        $tanggal = date('Y-m-d');
        $this->cekdata();
        
        if ($this->cekdata == 1) {
            $this->validate();
            $bukutamu->where(['tanggal'=>$tanggal, 'no_hp'=>$this->no_hp, 'pulang'=>null])->update([
                'pulang' => date('H:i:s')
            ]);

            $this->reset();
            $this->emit('updatebukutamu');

            $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'success',
                'title' => 'Data Kepulangan Berhasil Ditambah',
                'text' => '',
                'timer' => 5000,
                'timerProgressBar' => true,
            ]);
        }
    }

    public function render()
    {
        $cekdata = $this->cekdata();
        return view('livewire.bukutamu.user.formbukutamu', compact('cekdata'));
    }

    
}
