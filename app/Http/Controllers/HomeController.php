<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = glob(base_path('app_vo').'/*');

        $chuong_trinh = config('chuong_trinh');
        $khu_vuc = config('khu_vuc');

        $files = array_map(function($file){
            return str_ireplace('/Applications/MAMP/htdocs', 'http://localhost', $file);
        }, $files);

        return view('home', [
            'files' => $files,
            'chuong_trinh' => $chuong_trinh,
            'khu_vuc' => $khu_vuc
        ]);
    }

    public function post(Request $request){
        $user = Auth::user();

        if(!$user) return 'no user login';

        $chuong_trinh = $request->chuong_trinh;
        $khu_vuc = $request->khu_vuc;
        $src = $request->src;

        try{
            \DB::table('check_image')
                ->insert([
                    'chuong_trinh' => $chuong_trinh,
                    'khu_vuc' => $khu_vuc,
                    'src' => $src,
                    'user_id' => $user->id
                ]);
            return 'true';

        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
}
