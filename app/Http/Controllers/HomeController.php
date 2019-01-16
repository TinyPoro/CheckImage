<?php

namespace App\Http\Controllers;

use App\User;
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

        $lop = 'lop_9';
        if($request->has('lop')){
            $lop = $request->get('lop');
        }

        $files = glob("/var/www/html/$type/$lop/*");

        $files = array_map(function($file){
            return str_ireplace('/var/www/html', 'http://pro.data.giaingay.io', $file);
        }, $files);

        $total = count($files);

        $files = array_filter($files, function ($file){
            return \DB::table('check_image')->where('src', $file)->count() <= 9;
        });

        return view('home', [
            'files' => $files,
            'total' => $total
        ]);
    }

    public function getCheckNumber(){
        $user = Auth::user();

        if(!$user) return 0;

        return \DB::table('check_image')->where('user_id', $user->id)->count();
    }

    public function post(Request $request){
        $user = Auth::user();

        if(!$user) return 'no user login';

        $chuong_trinh = $request->chuong_trinh;
        $khu_vuc = $request->khu_vuc;
        $do_kho = $request->do_kho;
        $ten_nguon = $request->ten_nguon;
        $src = $request->src;
        $other = $request->other;

        try{
            if(\DB::table('check_image')->where('src', $src)->count() > 9) return 'Giới hạn 10 người đánh giả 1 ảnh!';

            if(\DB::table('check_image')->where('src', $src)->where('user_id', $user->id)->count() > 0){
                \DB::table('check_image')->where('src', $src)->where('user_id', $user->id)
                    ->update([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc,
                        'do_kho' => $do_kho,
                        'ten_nguon' => $ten_nguon,
                        'other' => $other
                    ]);
            }else{
                \DB::table('check_image')
                    ->insert([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc,
                        'do_kho' => $do_kho,
                        'ten_nguon' => $ten_nguon,
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
