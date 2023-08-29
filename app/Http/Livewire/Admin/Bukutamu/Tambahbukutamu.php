<?php

namespace App\Http\Livewire\Admin\Bukutamu;

use App\Models\Guestbook;
use Livewire\Component;

class Tambahbukutamu extends Component
{

    public $nama, $instansi, $no_hp, $email, $jk, $lokasi, $pegawai, $keperluan, $tanggal, $datang, $pulang, $cekdata;

    public function cekdata()
    {
        $bukutamu = new Guestbook();
        $tanggal = date('Y-m-d');
        $cekdata = $bukutamu->where(['tanggal'=>$tanggal, 'no_hp'=>$this->no_hp, 'pulang'=>null])->count();
        $this->cekdata = $cekdata;
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
        $bukutamu = new Guestbook();
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
            $bukutamu->tanggal = $this->tanggal;
            $bukutamu->datang = $this->datang;
            $bukutamu->pulang = $this->pulang;
            $bukutamu->save();

            $this->reset();
            $this->emit('updatebukutamu');
            session()->flash('message', 'Data Berhasil Ditambah');
            return redirect()->route('dashboard_bukutamu');
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'warning',
                'title' => 'Data Kedatangan Sudah Digunakan',
                'text' => 'Harap cek data di dashboard',
                'timer' => 5000,
                'timerProgressBar' => true,
            ]);
        }
    }
        

    public function render()
    {
        return view('livewire.admin.bukutamu.tambahbukutamu');
    }
}
