<?php

namespace App\Http\Controllers\Scolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScolariteController extends Controller
{
    public function index()
    {
        return view('scolarite.index');
    }
}
