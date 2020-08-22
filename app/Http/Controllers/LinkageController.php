<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LinkageModel;
use App\Model\ClientModel;

class LinkageController extends Controller
{
    /**
     * 展示视图
     */
    public function center()
    {
        $area = LinkageModel::where('pid',0)->get();
        return view('linkage/center',['area'=>$area]);
    }
    /**
     * 三级联动
     */
    public function area()
    {
        $pid = request()->pid;
        // dd($pid);
        $area = LinkageModel::where('pid',$pid)->get();
        return $area;
    }
}
