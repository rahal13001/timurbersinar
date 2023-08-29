<?php

namespace App\Http\Controllers\admin\bukutamu;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbooksController extends Controller
{
    public function detail(Guestbook $guestbook){
        $bukutamu = Guestbook::where('id', $guestbook->id)->first();
        return view('admin.bukutamu.bukutamu_detail', compact('bukutamu'));
    }
}
