<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $data['posts'] = Post::where('status','published')->with('kategori','user')->get();
        return view('home', $data);
    }
}
