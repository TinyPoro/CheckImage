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

    private $k = 0;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user) return redirect(route('login'));

        $type = 'app_giai_ngay';
        if ($request->has('type')) {
            $type = $request->get('type');
        }

        $lop = 'lop_9';
        if ($request->has('lop')) {
            $lop = $request->get('lop');
        }

        $team = 'team1';
        if ($request->has('team')) {
            $team = $request->get('team');
        }

        $files = glob("/var/www/html/$type/$lop/$team/*");

        $files = array_map(function ($file) {
            $this->k++;

            return [
                'src' => str_ireplace('/var/www/html', 'http://pro.data.giaingay.io', $file),
                'k' => $this->k
            ];

        }, $files);

        $total = count($files);

        $files = array_filter($files, function ($file) {
            return \DB::table('check_image')->where('src', $file['src'])->count() <= 9;
        });

        $files = array_values($files);

        return view('home', [
            'files' => $files,
            'total' => $total,
            'type' => $type,
            'lop' => $lop,
            'team' => $team
        ]);
    }

    public function getCheckNumber(Request $request)
    {
        $user = Auth::user();

        if (!$user) return 0;

        $type = 'app_giai_ngay';
        if ($request->has('type')) {
            $type = $request->get('type');
        }

        $lop = 'lop_9';
        if ($request->has('lop')) {
            $lop = $request->get('lop');
        }

        $team = 'team1';
        if ($request->has('team')) {
            $team = $request->get('team');
        }

        return \DB::table('check_image')->where('src', 'like', "http://pro.data.giaingay.io/$type/$lop/$team/%")->where('user_id', $user->id)->count();
    }

    public function post(Request $request)
    {
        $user = Auth::user();

        if (!$user) return 'no user login';

        $chuong_trinh = $request->chuong_trinh;
        $khu_vuc = $request->khu_vuc;
        $do_kho = $request->do_kho;
        $ten_nguon = $request->ten_nguon;
        $src = $request->src;
        $other = $request->other;

        try {
            if (\DB::table('check_image')->where('src', $src)->count() > 9) return 'Giới hạn 10 người đánh giả 1 ảnh!';

            if (\DB::table('check_image')->where('src', $src)->where('user_id', $user->id)->count() > 0) {
                \DB::table('check_image')->where('src', $src)->where('user_id', $user->id)
                    ->update([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc == null ? '' : $khu_vuc,
                        'do_kho' => $do_kho == null ? '' : $do_kho,
                        'ten_nguon' => $ten_nguon == null ? '' : $ten_nguon,
                        'other' => $other
                    ]);
            } else {
                \DB::table('check_image')
                    ->insert([
                        'chuong_trinh' => $chuong_trinh,
                        'khu_vuc' => $khu_vuc == null ? '' : $khu_vuc,
                        'do_kho' => $do_kho == null ? '' : $do_kho,
                        'ten_nguon' => $ten_nguon == null ? '' : $ten_nguon,
                        'other' => $other,
                        'src' => $src,
                        'user_id' => $user->id
                    ]);
            }

            return 'true';

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function report(Request $request)
    {
        $data = [];
        $curriculums = [
            'Đại số' => [
                'Chương I' => [
                    "§1. Căn bậc hai",
                    "§2. Căn thức bậc hai và HĐT",
                    "§3. Liên hệ giữa phép nhân và phép khai phương",
                    "§4. Liên hệ giữa phép chia và phép khai phương",
                    "§6. Biến đổi đơn giản biểu thức chứa căn bậc 2",
                    "§7. Biến đổi đơn giản biểu thức chứa căn bậc 2. (tiếp)",
                    "§8. Rút gọn biểu thức chứa căn bậc hai",
                    "§9. Căn bậc ba"
                ],
                'Chương II' => [
                    "§1. Nhắc lại, bổ sung các khái niệm về hàm số",
                    "§2. Hàm số bậc nhất",
                    "§3. Đồ thị hàm số y = ax + b (a ≠ 0)",
                    "§4. Đường thẳng song song và đường thẳng cắt nhau",
                    "§5. Hệ số góc của đường thẳng y = ax + b (a≠ 0)"
                ],
                'Chương III' => [
                    "§1. Phương trình bậc nhất hai ẩn",
                    "§2. Hệ hai phương trình bậc nhất hai ẩn",
                    "§3. Giải hệ phương trình bằng PP thế",
                    "§4. Giải hệ phương trình bằng PP cộng đại số",
                    "§5. Giải bài toán bằng cách lập phương trình",
                    "§5. Giải bài toán bằng cách lập phương trình (tiếp)"
                ],
                'Chương IV' => [
                    "§1. Hàm số y = ax2 (a #0)",
                    "§2. Đồ thị hàm số y = ax2 (a #0)",
                    "§3. Phương trình bậc hai một ẩn số",
                    "§4. Công thức nghiệm của phương trình bậc hai",
                    "§5. Công thức nghiệm thu gọn",
                    "§6. Hệ thức Vi-et và ứng dụng",
                    "§7. Phương trình quy về phương trình bậc hai",
                    "§8. Giải bài toán bằng cách lập phương trình"
                ]
            ],
            'Hình học' => [
                'Chương I' => [
                    "§1. Một số hệ thức về đường cao trong tam giác vuông",
                    "§1. Một số hệ thức về cạnh và đường cao…. (tiếp)",
                    "§2. Tỉ số lượng giác của góc nhọn",
                    "§2. Tỉ số lượng giác của góc nhọn (tiếp)",
                    "§3. Sử dụng máy tính bỏ túi để tìm tỉ số lượng giác của góc",
                    "§4. Một số hệ thức về cạnh và góc trong tam giác vuông",
                    "§5. Ứng dụng thực tế các tỉ số lượng giác, thực hành ngoài trời"
                ],
                'Chương II' => [
                    "§1. Sự xác định của đường tròn.. T/C…",
                    "§2. Đường kính và dây của đường tròn",
                    "§3. Liên hệ giữa dây và khoảng cách từ tâm đến dây",
                    "§4. Vị trí tương đối của đường thẳng và đường tròn",
                    "§5. Dấu hiệu nhận biết tiếp tuyến của đường tròn",
                    "§6. Tính chất của hai tiếp tuyên cắt nhau",
                    "§7. Vị trí tương đối của hai đường tròn"
                ],
                'Chương III' => [
                    "§1. Góc ở tâm.. Số đo cung",
                    "§2. Liên hệ giữa cung và dây",
                    "§3. Góc nội tiếp",
                    "§4. Góc tạo bởi tia tiếp tuyến và dây cung",
                    "§5. Góc có đỉnh ở bên trong hay bên ngoài đường tròn",
                    "§6. Cung chứa góc",
                    "§7. Tứ giác nội tiếp",
                    "§8. Đường tròn ngoại tiếp. Đường tròn nội tiếp",
                    "§9. Độ dài đường tròn, cung tròn",
                    "§10. Diện tích hình tròn, hình quạt tròn"
                ],
                'Chương IV' => [
                    "§1. Hình trụ, diện tích xung quanh và….",
                    "§2. Hình nón – hình nón cụt. Diện tích….",
                    "§3. Hình cầu, diện tích mặt cầu và thể tích hình cầu"
                ]
            ],
        ];
        $kinds = [
            "Không xác định",
            "Trong chương trình trên lớpSGK",
            "Trong chương trình trên lớpSBT",
            "Ngoài chương trình trên lớpĐộ khó tương đương trên lớpCô giao",
            "Ngoài chương trình trên lớpĐộ khó tương đương trên lớpTrung tâm học thêm",
            "Ngoài chương trình trên lớpĐộ khó tương đương trên lớpSách tham khảo mua về",
            "Ngoài chương trình trên lớpNâng cao cho hệ thườngCô giao",
            "Ngoài chương trình trên lớpNâng cao cho hệ thườngTrung tâm học thêm",
            "Ngoài chương trình trên lớpNâng cao cho hệ thườngSách tham khảo mua về",
            "Ngoài chương trình trên lớpHệ chuyênLò luyện",
            "Ngoài chương trình trên lớpHệ chuyênCô giao",
        ];
        $values = [];
        foreach ($curriculums as $cur_key => $curriculum) {
            foreach ($kinds as $kind)
                $values[$cur_key . $kind] = 0;
            foreach ($curriculum as $cha_key => $chapter) {
                foreach ($kinds as $kind)
                    $values[$cur_key . $cha_key . $kind] = 0;
                foreach ($chapter as $lesson) {
                    foreach ($kinds as $kind) {
                        // dd("concat(khu_vuc,concat(do_kho,ten_nguon))='" . $kind . "'");
                        $values[$cur_key . $cha_key . $lesson . $kind] = \DB::table('check_image')->where('chuong_trinh', $lesson)->whereRaw("concat(khu_vuc,concat(do_kho,ten_nguon))='" . $kind . "'")->count();
                        $values[$cur_key . $cha_key . $kind] += $values[$cur_key . $cha_key . $lesson . $kind];
                    }
                }
                foreach ($kinds as $kind)
                    $values[$cur_key . $kind] += $values[$cur_key . $cha_key . $kind];
            }
        }
        $count = 0;
        foreach ($curriculums as $cur_key => $curriculum) {
            foreach ($kinds as $kind)
                $count += $values[$cur_key . $kind];
        }
        // dd($count);

        return view('report', ['curriculums' => $curriculums, "values" => $values, "kinds" => $kinds]);
    }
}
