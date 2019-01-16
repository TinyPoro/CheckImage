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
    public function index(Request $request)
    {
        $user = Auth::user();

        if(!$user) return redirect(route('login'));

        $type = 'app_vo';
        if($request->has('type')){
            $type = $request->get('type');
        }

        $files = glob("/var/www/html/$type/*");

        $chuong_trinh = config('chuong_trinh');
        $khu_vuc = config('khu_vuc');

        $files = array_map(function($file){
            return str_ireplace('/var/www/html', 'http://pro.data.giaingay.io', $file);
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
        $other = $request->other;

        try{
            if(\DB::table('check_image')->where('src', $src)->where('user_id', $user->id)->count() > 0){
                if(\DB::table('check_image')->where('src', $src)->where('user_id', $user->id)->count() > 9) return 'Giới hạn 10 người đánh giả 1 ảnh!';

                \DB::table('check_image')->where('src', $src)->where('user_id', $user->id)
                    ->update([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc,
                        'other' => $other
                    ]);
            }else{
                \DB::table('check_image')
                    ->insert([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc,
                        'other' => $other,
                        'src' => $src,
                        'user_id' => $user->id
                    ]);
            }

            return 'true';

        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function report(Request $request){
        return view('report');
    }
}
