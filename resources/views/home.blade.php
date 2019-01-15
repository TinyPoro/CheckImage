@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="wrap">
                <div class="owl-carousel">
                    @foreach($files as $file)
                        <img src="{{$file}}" style="width: 100%;height: 100%">
                    @endforeach

                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <img id="cur_img" src="http://localhost/CheckImage/app_vo/010119_012025.png" style="width: 100%;height: 100%">
        </div>

        <div class="col-md-5">
            <label class="input-group-text" for="chuong_trinh">Chọn chương trình: </label>
            <select class="chuong_trinh_select" name="chuong_trinh"></select>
            <hr/>
            <label class="input-group-text" for="khu_vuc">Chọn khu vực: </label>
            <select class="khu_vuc_select" name="khu_vuc"></select>
            <hr/>
            <button class="btn btn-primary" id="send" type="button">Đánh giá</button>
        </div>
    </div>
</div>
@endsection

@section('after-script')
    <script type="text/javascript">
        $(document).ready(async function(){
            $(".owl-carousel").owlCarousel({
                items: 5,
                vertical:true,
                margin: 10
            });

            $(".owl-carousel img").click(function () {
                let src = $(this).attr("src");

                $('#cur_img').attr("src", src);
            });

            function formatResult(node) {
                let $result = $('<span id="'+node.id+'" style="padding-left:' + (20 * node.level) + 'px;">' + node.text + '</span>');

                return $result;
            }

            let chuong_trinh_data = [
                    {
                        id: "Đại số",
                        text: "Đại số",
                        level: 0,
                        "disabled": true
                    },{
                        id: "Chương 1 - Đại số",
                        text: "Chương 1 - Đại số",
                        level: 1,
                    "disabled": true
                    },{
                        id: "§1. Căn bậc hai",
                        text: "§1. Căn bậc hai",
                        level: 2
                    },{
                        id: "§2. Căn thức bậc hai và HĐT",
                        text: "§2. Căn thức bậc hai và HĐT",
                        level: 2
                    },{
                        id: "§3. Liên hệ giữa phép nhân và phép khai phương",
                        text: "§3. Liên hệ giữa phép nhân và phép khai phương",
                        level: 2
                    },{
                        id: "§4. Liên hệ giữa phép chia và phép khai phương",
                        text: "§4. Liên hệ giữa phép chia và phép khai phương",
                        level: 2
                    },{
                    id: "§6. Biến đổi đơn giản biểu thức chứa căn bậc 2",
                        text: "§6. Biến đổi đơn giản biểu thức chứa căn bậc 2",
                        level: 2
                    },{
                    id: "§7. Biến đổi đơn giản biểu thức chứa căn bậc 2. (tiếp)",
                        text: "§7. Biến đổi đơn giản biểu thức chứa căn bậc 2. (tiếp)",
                        level: 2
                    },{
                    id: "§8. Rút gọn biểu thức chứa căn bậc hai",
                        text: "§8. Rút gọn biểu thức chứa căn bậc hai",
                        level: 2
                    },{
                    id: "§9. Căn bậc ba",
                        text: "§9. Căn bậc ba",
                        level: 2
                    },{
                    id: "Chương 2 - Đại số",
                        text: "Chương 2 - Đại số",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Nhắc lại, bổ sung các khái niệm về hàm số",
                        text: "§1. Nhắc lại, bổ sung các khái niệm về hàm số",
                        level: 2
                    },{
                    id: "§2. Hàm số bậc nhất",
                        text: "§2. Hàm số bậc nhất",
                        level: 2
                    },{
                    id: "§3. Đồ thị hàm số y = ax + b (a ≠ 0)",
                        text: "§3. Đồ thị hàm số y = ax + b (a ≠ 0)",
                        level: 2
                    },{
                    id: "§4. Đường thẳng song song và đường thẳng cắt nhau",
                        text: "§4. Đường thẳng song song và đường thẳng cắt nhau",
                        level: 2
                    },{
                    id: "§5. Hệ số góc của đường thẳng y = ax + b (a≠ 0)",
                        text: "§5. Hệ số góc của đường thẳng y = ax + b (a≠ 0)",
                        level: 2
                    },{
                    id: "Chương 3 - Đại số",
                        text: "Chương 3 - Đại số",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Phương trình bậc nhất hai ẩn",
                        text: "§1. Phương trình bậc nhất hai ẩn",
                        level: 2
                    },{
                    id: "§2. Hệ hai phương trình bậc nhất hai ẩn",
                        text: "§2. Hệ hai phương trình bậc nhất hai ẩn",
                        level: 2
                    },{
                    id: "§3. Giải hệ phương trình bằng PP thế",
                        text: "§3. Giải hệ phương trình bằng PP thế",
                        level: 2
                    },{
                    id: "§4. Giải hệ phương trình bằng PP cộng đại số",
                        text: "§4. Giải hệ phương trình bằng PP cộng đại số",
                        level: 2
                    },{
                    id: "§5. Giải bài toán bằng cách lập phương trình",
                        text: "§5. Giải bài toán bằng cách lập phương trình",
                        level: 2
                    },{
                    id: "§5. Giải bài toán bằng cách lập phương trình (tiếp)",
                        text: "§5. Giải bài toán bằng cách lập phương trình (tiếp)",
                        level: 2
                    },{
                    id: "Chương 4 - Đại số",
                        text: "Chương 4 - Đại số",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Hàm số y = ax2 (a #0)",
                        text: "§1. Hàm số y = ax2 (a #0)",
                        level: 2
                    },{
                    id: "§2. Đồ thị hàm số y = ax2 (a #0)",
                        text: "§2. Đồ thị hàm số y = ax2 (a #0)",
                        level: 2
                    },{
                    id: "§3. Phương trình bậc hai một ẩn số",
                        text: "§3. Phương trình bậc hai một ẩn số",
                        level: 2
                    },{
                    id: "§4. Công thức nghiệm của phương trình bậc hai",
                        text: "§4. Công thức nghiệm của phương trình bậc hai",
                        level: 2
                    },{
                    id: "§5. Công thức nghiệm thu gọn",
                        text: "§5. Công thức nghiệm thu gọn",
                        level: 2
                    },{
                    id: "§6. Hệ thức Vi-et và ứng dụng",
                        text: "§6. Hệ thức Vi-et và ứng dụng",
                        level: 2
                    },{
                    id: "§7. Phương trình quy về phương trình bậc hai",
                        text: "§7. Phương trình quy về phương trình bậc hai",
                        level: 2
                    },{
                    id: "§8. Giải bài toán bằng cách lập phương trình",
                        text: "§8. Giải bài toán bằng cách lập phương trình",
                        level: 2
                    },{
                    id: "Hình học",
                        text: "Hình học",
                        level: 0,
                    "disabled": true
                    },{
                    id: "Chương 1 - Hình học",
                        text: "Chương 1 - Hình học",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Một số hệ thức về đường cao trong tam giác vuông",
                        text: "§1. Một số hệ thức về đường cao trong tam giác vuông",
                        level: 2
                    },{
                    id: "§1. Một số hệ thức về cạnh và đường cao…. (tiếp)",
                        text: "§1. Một số hệ thức về cạnh và đường cao…. (tiếp)",
                        level: 2
                    },{
                    id: "§2. Tỉ số lượng giác của góc nhọn",
                        text: "§2. Tỉ số lượng giác của góc nhọn",
                        level: 2
                    },{
                    id: "§2. Tỉ số lượng giác của góc nhọn (tiếp)",
                        text: "§2. Tỉ số lượng giác của góc nhọn (tiếp)",
                        level: 2
                    },{
                    id: "§3. Sử dụng máy tính bỏ túi để tìm tỉ số lượng giác của góc",
                        text: "§3. Sử dụng máy tính bỏ túi để tìm tỉ số lượng giác của góc",
                        level: 2
                    },{
                    id: "§4. Một số hệ thức về cạnh và góc trong tam giác vuông",
                        text: "§4. Một số hệ thức về cạnh và góc trong tam giác vuông",
                        level: 2
                    },{
                    id: "§5. Ứng dụng thực tế các tỉ số lượng giác, thực hành ngoài trời",
                        text: "§5. Ứng dụng thực tế các tỉ số lượng giác, thực hành ngoài trời",
                        level: 2
                    },{
                    id: "Chương 2 - Hình học",
                        text: "Chương 2 - Hình học",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Sự xác định của đường tròn.. T/C…",
                        text: "§1. Sự xác định của đường tròn.. T/C…",
                        level: 2
                    },{
                    id: "§2. Đường kính và dây của đường tròn",
                        text: "§2. Đường kính và dây của đường tròn",
                        level: 2
                    },{
                    id: "§3. Liên hệ giữa dây và khoảng cách từ tâm đến dây",
                        text: "§3. Liên hệ giữa dây và khoảng cách từ tâm đến dây",
                        level: 2
                    },{
                    id: "§4. Vị trí tương đối của đường thẳng và đường tròn",
                        text: "§4. Vị trí tương đối của đường thẳng và đường tròn",
                        level: 2
                    },{
                    id: "§5. Dấu hiệu nhận biết tiếp tuyến của đường tròn",
                        text: "§5. Dấu hiệu nhận biết tiếp tuyến của đường tròn",
                        level: 2
                    },{
                    id: "§6. Tính chất của hai tiếp tuyên cắt nhau",
                        text: "§6. Tính chất của hai tiếp tuyên cắt nhau",
                        level: 2
                    },{
                    id: "§7. Vị trí tương đối của hai đường tròn",
                        text: "§7. Vị trí tương đối của hai đường tròn",
                        level: 2
                    },{
                    id: "Chương 3 - Hình học",
                        text: "Chương 3 - Hình học",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Góc ở tâm.Số đo cung",
                        text: "§1. Góc ở tâm.Số đo cung",
                        level: 2
                    },{
                    id: "§2. Liên hệ giữa cung và dây",
                        text: "§2. Liên hệ giữa cung và dây",
                        level: 2
                    },{
                    id: "§3. Góc nội tiếp",
                        text: "§3. Góc nội tiếp",
                        level: 2
                    },{
                    id: "§4. Góc tạo bởi tia tiếp tuyến và dây cung",
                        text: "§4. Góc tạo bởi tia tiếp tuyến và dây cung",
                        level: 2
                    },{
                    id: "§5. Góc có đỉnh ở bên trong hay bên ngoài đường tròn",
                        text: "§5. Góc có đỉnh ở bên trong hay bên ngoài đường tròn",
                        level: 2
                    },{
                    id: "§6. Cung chứa góc",
                        text: "§6. Cung chứa góc",
                        level: 2
                    },{
                    id: "§7. Tứ giác nội tiếp",
                        text: "§7. Tứ giác nội tiếp",
                        level: 2
                    },{
                    id: "§8. Đường tròn ngoại tiếp. Đường tròn nội tiếp",
                        text: "§8. Đường tròn ngoại tiếp. Đường tròn nội tiếp",
                        level: 2
                    },{
                    id: "§9. Độ dài đường tròn, cung tròn",
                        text: "§9. Độ dài đường tròn, cung tròn",
                        level: 2
                    },{
                    id: "§10. Diện tích hình tròn, hình quạt tròn",
                        text: "§10. Diện tích hình tròn, hình quạt tròn",
                        level: 2
                    },{
                    id: "Chương 4 - Hình học",
                        text: "Chương 4 - Hình học",
                        level: 1,
                    "disabled": true
                    },{
                    id: "§1. Hình trụ, diện tích xung quanh và….",
                        text: "§1. Hình trụ, diện tích xung quanh và….",
                        level: 2
                    },{
                    id: "§2. Hình nón – hình nón cụt. Diện tích….",
                        text: "§2. Hình nón – hình nón cụt. Diện tích….",
                        level: 2
                    },{
                    id: "§3. Hình cầu, diện tích mặt cầu và thể tích hình cầu",
                        text: "§3. Hình cầu, diện tích mặt cầu và thể tích hình cầu",
                        level: 2
                    }
                ];


            let khu_vuc_data = [
                {
                    id: "Trong chương trình",
                    text: "Trong chương trình",
                    level: 0,
                    "disabled": true
                },{
                    id: "SGK",
                    text: "SGK",
                    level: 1
                },{
                    id: "SBT",
                    text: "SBT",
                    level: 1
                },{
                    id: "Ngoài chương trình",
                    text: "Ngoài chương trình",
                    level: 0,
                    "disabled": true
                },{
                    id: "Độ khó tương đương trên lớp",
                    text: "Độ khó tương đương trên lớp",
                    level: 1,
                    "disabled": true
                },{
                    id: "Cô giao - Trên lớp",
                    text: "Cô giao - Trên lớp",
                    level: 2
                },{
                    id: "Trung tâm học thêm - Trên lớp",
                    text: "Trung tâm học thêm - Trên lớp",
                    level: 2
                },{
                    id: "Sách tham khảo mua về - Trên lớp",
                    text: "Sách tham khảo mua về - Trên lớp",
                    level: 2
                },{
                    id: "Nâng cao cho hệ thường",
                    text: "Nâng cao cho hệ thường",
                    level: 1,
                    "disabled": true
                },{
                    id: "Cô giao - Nâng cao thường",
                    text: "Cô giao - Nâng cao thường",
                    level: 2
                },{
                    id: "Trung tâm học thêm - Nâng cao thường",
                    text: "Trung tâm học thêm - Nâng cao thường",
                    level: 2
                },{
                    id: "Sách tham khảo mua về - Nâng cao thường2",
                    text: "Sách tham khảo mua về - Nâng cao thường",
                    level: 2
                },{
                    id: "Hệ chuyên",
                    text: "Hệ chuyên",
                    level: 1,
                    "disabled": true
                },{
                    id: "Lò luyện",
                    text: "Lò luyện",
                    level: 2
                },{
                    id: "Cô giao - Hệ chuyên",
                    text: "Cô giao - Hệ chuyên",
                    level: 2
                },
            ];

            $('.chuong_trinh_select').select2({
                placeholder: 'Chọn chương trình',
                width: "600px",
                data: chuong_trinh_data,
                formatSelection: function(item) {
                    return item.text
                },
                formatResult: function(item) {
                    return item.text
                },
                templateResult: formatResult,
            });

            $('.khu_vuc_select').select2({
                placeholder: 'Chọn chương trình',
                width: "600px",
                data: khu_vuc_data,
                formatSelection: function(item) {
                    return item.text
                },
                formatResult: function(item) {
                    return item.text
                },
                templateResult: formatResult,
            });

            $('#send').click(function(){
               let chuong_trinh =  $('.chuong_trinh_select').val();
               let khu_vuc =  $('.khu_vuc_select').val();

               let src = $('#cur_img').attr('src');

                let data = {
                    chuong_trinh: chuong_trinh,
                    khu_vuc: khu_vuc,
                    src: src
                }

                $.ajax({
                    method: 'POST',
                    url: "/CheckImage/public/post",
                    data: data,
                    success: function(result){
                        console.log(result);
                        setTimeout(function() {
                            window.location.reload();
                        }, 500);
                    },
                    error: function (jqXHR, exception) {
                        console.log(exception);
                    }
                });
            });
        });

    </script>

@endsection
