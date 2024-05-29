<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::select('id','com_text','com_comment')->get();
        return view('/community/index');
    }

    public function create()
    {
        return view('/community/create');
    }
}
