<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrCode;

class QRCodeController extends Controller
{
    public function index()
    {
      return view('backend.qrcode.qrcreate');
    }
}
