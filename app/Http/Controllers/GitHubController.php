<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubController extends Controller
{
    /**
     * github 登录页面
     */
    public function index()
    {
        return view('github/index');
    }
}
