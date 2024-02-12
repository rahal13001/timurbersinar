<?php

namespace App\Http\Controllers\admin\antrian\client;

use App\Http\Controllers\Controller;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function detail(Client $client){
        return view('admin.antrian.detailclient', compact('client'));
    }

    public function calling(Location $location){
        return view('admin.antrian.panggilantrian', compact('location'));
    }

    public function video(Location $location){
        return view('user.antrian.videotrone', compact('location'));
    }

    public function panggilan(Location $location){
        return view('user.antrian.pemanggilan', compact('location'));
    }

    public function antrianku(Client $client){
        return view('user.antrian.antrianku', compact('client'));
    }

    public function kartuantrian(Client $client){
        $kartu = Pdf::loadView('user.antrian.kartuantrian', compact('client'))->setPaper('a6', 'potrait');
        return $kartu->stream('kartuantrian_'.$client->nama.'.pdf');
        // return view('user.antrian.kartuantrian', compact('client'));
    }
}
