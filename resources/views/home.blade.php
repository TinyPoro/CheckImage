@extends('layouts.app')

@section('content')
<div class="container">
    <div id="divLargerImage"></div>

    <div id="divOverlay"></div>

    <b>Số lượt đánh giá hiện tại <span id="cur_check"></span>/{{$total}}</b>
    <hr/>
    <div class="row">
        <div class="col-md-2">
            <div class="wrap">
                <div class="owl-carousel">
                    @foreach($files as $file)
                        <span>
                            <img id="{{$file['k']}}" src="{{$file['src']}}" style="width: 100%;height: 100%">
                            <span class="badge badge-secondary">{{$file['k']}}</span>
                        </span>
                    @endforeach

                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            @if(key_exists(0, $files))
                <img id="cur_img" src="{{$files[0]['src']}}" style="width: 100%;height: 100%">
            @endif
        </div>

        <div class="col-md-5">
            <label class="input-group-text" for="chuong_trinh">Chọn khung chương trình: </label>
            <div class="radio">
                <label><input type="radio" name="chuong_trinh" checked value="Không xác định">Không xác định</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="chuong_trinh" disabled value="Đại số">Đại số</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 1 - Đại số">Chương 1 - Đại số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Căn bậc hai">§1. Căn bậc hai</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Căn thức bậc hai và HĐT">§2. Căn thức bậc hai và HĐT</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Liên hệ giữa phép nhân và phép khai phương">§3. Liên hệ giữa phép nhân và phép khai phương</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Liên hệ giữa phép chia và phép khai phương">§4. Liên hệ giữa phép chia và phép khai phương</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§6. Biến đổi đơn giản biểu thức chứa căn bậc 2">§6. Biến đổi đơn giản biểu thức chứa căn bậc 2</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§7. Biến đổi đơn giản biểu thức chứa căn bậc 2. (tiếp)">§7. Biến đổi đơn giản biểu thức chứa căn bậc 2. (tiếp)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§8. Rút gọn biểu thức chứa căn bậc hai">§8. Rút gọn biểu thức chứa căn bậc hai</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§9. Căn bậc ba">§9. Căn bậc ba</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 2 - Đại số">Chương 2 - Đại số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Nhắc lại, bổ sung các khái niệm về hàm số">§1. Nhắc lại, bổ sung các khái niệm về hàm số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Hàm số bậc nhất">§2. Hàm số bậc nhất</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Đồ thị hàm số y = ax + b (a ≠ 0)">§3. Đồ thị hàm số y = ax + b (a ≠ 0)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Đường thẳng song song và đường thẳng cắt nhau">§4. Đường thẳng song song và đường thẳng cắt nhau</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Hệ số góc của đường thẳng y = ax + b (a≠ 0)">§5. Hệ số góc của đường thẳng y = ax + b (a≠ 0)</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 3 - Đại số">Chương 3 - Đại số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Phương trình bậc nhất hai ẩn">§1. Phương trình bậc nhất hai ẩn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Hệ hai phương trình bậc nhất hai ẩn">§2. Hệ hai phương trình bậc nhất hai ẩn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Giải hệ phương trình bằng PP thế">§3. Giải hệ phương trình bằng PP thế</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Giải hệ phương trình bằng PP cộng đại số">§4. Giải hệ phương trình bằng PP cộng đại số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Giải bài toán bằng cách lập phương trình">§5. Giải bài toán bằng cách lập phương trình</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Giải bài toán bằng cách lập phương trình (tiếp)">§5. Giải bài toán bằng cách lập phương trình (tiếp)</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 4 - Đại số">Chương 4 - Đại số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Hàm số y = ax2 (a #0)">§1. Hàm số y = ax2 (a #0)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Đồ thị hàm số y = ax2 (a #0)">§2. Đồ thị hàm số y = ax2 (a #0)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Phương trình bậc hai một ẩn số">§3. Phương trình bậc hai một ẩn số</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Công thức nghiệm của phương trình bậc hai">§4. Công thức nghiệm của phương trình bậc hai</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Công thức nghiệm thu gọn">§5. Công thức nghiệm thu gọn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§6. Hệ thức Vi-et và ứng dụng">§6. Hệ thức Vi-et và ứng dụng</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§7. Phương trình quy về phương trình bậc hai">§7. Phương trình quy về phương trình bậc hai</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§8. Giải bài toán bằng cách lập phương trình">§8. Giải bài toán bằng cách lập phương trình</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="chuong_trinh" disabled value="Hình học">Hình học</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 1 - Hình học">Chương 1 - Hình học</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Một số hệ thức về đường cao trong tam giác vuông">§1. Một số hệ thức về đường cao trong tam giác vuông</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Một số hệ thức về cạnh và đường cao…. (tiếp)">§1. Một số hệ thức về cạnh và đường cao…. (tiếp)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Tỉ số lượng giác của góc nhọn">§2. Tỉ số lượng giác của góc nhọn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Tỉ số lượng giác của góc nhọn (tiếp)">§2. Tỉ số lượng giác của góc nhọn (tiếp)</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Sử dụng máy tính bỏ túi để tìm tỉ số lượng giác của góc">§3. Sử dụng máy tính bỏ túi để tìm tỉ số lượng giác của góc</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Một số hệ thức về cạnh và góc trong tam giác vuông">§4. Một số hệ thức về cạnh và góc trong tam giác vuông</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Ứng dụng thực tế các tỉ số lượng giác, thực hành ngoài trời">§5. Ứng dụng thực tế các tỉ số lượng giác, thực hành ngoài trời</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 2 - Hình học">Chương 2 - Hình học</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Sự xác định của đường tròn.. T/C…">§1. Sự xác định của đường tròn.. T/C…</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Đường kính và dây của đường tròn">§2. Đường kính và dây của đường tròn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Liên hệ giữa dây và khoảng cách từ tâm đến dây">§3. Liên hệ giữa dây và khoảng cách từ tâm đến dây</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Vị trí tương đối của đường thẳng và đường tròn">§4. Vị trí tương đối của đường thẳng và đường tròn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Dấu hiệu nhận biết tiếp tuyến của đường tròn">§5. Dấu hiệu nhận biết tiếp tuyến của đường tròn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§6. Tính chất của hai tiếp tuyên cắt nhau">§6. Tính chất của hai tiếp tuyên cắt nhau</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§7. Vị trí tương đối của hai đường tròn">§7. Vị trí tương đối của hai đường tròn</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 3 - Hình học">Chương 3 - Hình học</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Góc ở tâm.Số đo cung">§1. Góc ở tâm.Số đo cung</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Liên hệ giữa cung và dây">§2. Liên hệ giữa cung và dây</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Góc nội tiếp">§3. Góc nội tiếp</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§4. Góc tạo bởi tia tiếp tuyến và dây cung">§4. Góc tạo bởi tia tiếp tuyến và dây cung</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§5. Góc có đỉnh ở bên trong hay bên ngoài đường tròn">§5. Góc có đỉnh ở bên trong hay bên ngoài đường tròn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§6. Cung chứa góc">§6. Cung chứa góc</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§7. Tứ giác nội tiếp">§7. Tứ giác nội tiếp</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§8. Đường tròn ngoại tiếp. Đường tròn nội tiếp">§8. Đường tròn ngoại tiếp. Đường tròn nội tiếp</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§9. Độ dài đường tròn, cung tròn">§9. Độ dài đường tròn, cung tròn</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§10. Diện tích hình tròn, hình quạt tròn">§10. Diện tích hình tròn, hình quạt tròn</label>
            </div>
            <div class="radio tab1">
                <label><input type="radio" name="chuong_trinh" disabled value="Chương 4 - Hình học">Chương 4 - Hình học</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§1. Hình trụ, diện tích xung quanh và….">§1. Hình trụ, diện tích xung quanh và….</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§2. Hình nón – hình nón cụt. Diện tích….">§2. Hình nón – hình nón cụt. Diện tích….</label>
            </div>
            <div class="radio tab">
                <label><input type="radio" name="chuong_trinh" value="§3. Hình cầu, diện tích mặt cầu và thể tích hình cầu">§3. Hình cầu, diện tích mặt cầu và thể tích hình cầu</label>
            </div>
            <hr/>

            <div class="khu_vuc">
                <div class="radio-inline">
                    <label><input type="radio" name="khu_vuc_radio" id="do_kho_khu_vuc_0">Không xác định</label>
                </div><div class="radio-inline">
                    <label><input type="radio" name="khu_vuc_radio" id="do_kho_khu_vuc_1">Trong chương<br/> trình trên lớp</label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="khu_vuc_radio" id="do_kho_khu_vuc_2">Ngoài chương<br/> trình trên lớp</label>
                </div>
            </div>

            <hr/>

            <div class="do_kho">
                {{--tên nguồn trong chương trình--}}
                <div class="radio-inline">
                    <label><input type="radio" name="do_kho_khu_vuc_1" id="ten_nguon_do_kho_1_khu_vuc_1">SGK
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="do_kho_khu_vuc_1" id="ten_nguon_do_kho_2_khu_vuc_1">SBT
                    </label>
                </div>

                <div class="radio-inline">
                    <label><input type="radio" name="do_kho_khu_vuc_2" id="ten_nguon_do_kho_1_khu_vuc_2">Độ khó tương <br/>đương trên lớp</label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="do_kho_khu_vuc_2" id="ten_nguon_do_kho_2_khu_vuc_2">Nâng cao cho <br/>hệ thường</label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="do_kho_khu_vuc_2" id="ten_nguon_do_kho_3_khu_vuc_2">Hệ chuyên</label>
                </div>
            </div>

            <hr/>

            <div class="ten_nguon">


                {{--tên nguồn ngoài tương đương lớp--}}
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_1_khu_vuc_2" id="ten_nguon_1_do_kho_1_khu_vuc_2">Cô giao
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_1_khu_vuc_2" id="ten_nguon_2_do_kho_1_khu_vuc_2">Trung tâm học thêm
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_1_khu_vuc_2" id="ten_nguon_3_do_kho_1_khu_vuc_2">Sách tham khảo <br/>mua về
                    </label>
                </div>

                {{--tên nguồn nâng cao--}}
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_2_khu_vuc_2" id="ten_nguon_1_do_kho_2_khu_vuc_2">Cô giao
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_2_khu_vuc_2" id="ten_nguon_2_do_kho_2_khu_vuc_2">Trung tâm học thêm
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_2_khu_vuc_2" id="ten_nguon_3_do_kho_2_khu_vuc_2">Sách tham khảo <br/>mua về
                    </label>
                </div>

                {{--tên nguồn chuyên--}}
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_3_khu_vuc_2" id="ten_nguon_1_do_kho_3_khu_vuc_2">Lò luyện
                    </label>
                </div>
                <div class="radio-inline">
                    <label><input type="radio" name="ten_nguon_do_kho_3_khu_vuc_2" id="ten_nguon_2_do_kho_3_khu_vuc_2">Cô giao
                    </label>
                </div>
            </div>

            <hr/>

            <label class="input-group-text" for="other">Tại sao bạn nghĩ thế: (*) </label>
            <br/>
            <textarea rows="5" cols="83" name="other"></textarea>
            <hr/>
            <button class="btn btn-primary" id="send" type="button">Đánh giá</button>

        </div>
    </div>
</div>
@endsection

@section('after-script')
    <script type="text/javascript">
        $(document).ready(async function(){
            let files = '<?php echo htmlspecialchars_decode(json_encode($files, JSON_UNESCAPED_UNICODE)); ?>';
            files = JSON.parse(files);
            files = files.map(function(file){
                return file.src;
            });

            $(".owl-carousel").owlCarousel({
                items: 7,
                vertical:true,
                margin: 15
            });

            $(".owl-carousel img").click(function () {
                let src = $(this).attr("src");

                $(this).css('border', '1px solid blue');
                $(this).parent().siblings().find('img').css('border', '');

                $('#cur_img').attr("src", src);
            });

            let update_cur_check = function () {
                $.ajax({
                    method: 'GET',
                    url: "/CheckImage/public/cur_check",
                    success: function(result){
                        $('#cur_check').text(result);
                    },
                    error: function (jqXHR, exception) {
                        console.log(exception);
                    }
                });
            };

            update_cur_check();

            $('#cur_img').click(function () {
                var $img = $(this);
                $('#divLargerImage').html($img.clone().css({
                    maxWidth: "800px",
                    width: "auto",
                    height: "auto"
                })).add($('#divOverlay')).fadeIn();
            });

            $('#divLargerImage').add($('#divOverlay')).click(function () {
                $('#divLargerImage').add($('#divOverlay')).fadeOut(function () {
                    $('#divLargerImage').empty();
                });
            });



            $('input[type=radio]').change(function() {
                let name = $(this).attr('name');

                let id = $('input[type=radio][name="'+name+'"]:checked').attr('id');

                $('input[type=radio][name="'+id+'"]').parent().parent().siblings().find('label').hide();
                $('input[type=radio][name="'+id+'"]').parent().parent().siblings().find('input[type=radio]').prop('checked', false);

                if(id == 'do_kho_khu_vuc_0'){
                    $('input[type=radio][name^="do_kho"]').parent('label').hide();
                    $('input[type=radio][name^="do_kho"]').prop('checked', false);
                }

                if(id.indexOf("do_kho") === 0){
                    $('input[type=radio][name^="ten_nguon"]').parent('label').hide();
                    $('input[type=radio][name^="ten_nguon"]').prop('checked', false);
                }

                $('input[type=radio][name="'+id+'"]').parent().show();

                $('.radio-inline').css('padding-left', '20px');
                $('label:hidden').parent('.radio-inline').css('padding-left', '0px');

            });


            $('#send').click(function(){
               let chuong_trinh = $("input[name='chuong_trinh']:checked").val();

               let khu_vuc = $('input[type=radio][name^="khu_vuc"]:checked').parent('label').text();
               let do_kho = $('input[type=radio][name^="do_kho"]:checked').parent('label').text();
               let ten_nguon = $('input[type=radio][name^="khu_vuc"]:checked').parent('label').text();

               let other =  $('[name="other"]').val();

               let src = $('#cur_img').attr('src');

                let data = {
                    chuong_trinh: chuong_trinh,
                    khu_vuc: khu_vuc,
                    do_kho: do_kho,
                    ten_nguon: ten_nguon,
                    src: src,
                    other: other
                }

                $.ajax({
                    method: 'POST',
                    url: "/CheckImage/public/post",
                    data: data,
                    success: function(result){
                        console.log(result);

                        if(result === 'true') {
                            $('.owl-item img[src="'+src+'"]').parent().parent().remove();

                            let cur_index = files.indexOf(src);

                            let next_url = '';
                            if(cur_index < files.length - 1) next_url = files[cur_index + 1];

                            files = files.filter(function (value) {
                                return value !== src;
                            });

                            alert('Lưu thành công!');

                            if(next_url) $('#cur_img').attr("src", next_url);

                            update_cur_check();
                        }
                        else if(result === 'Giới hạn 10 người đánh giả 1 ảnh!' || result === 'no user login') alert(result);
                        else alert("Thông tin bạn nhập không chính xác!");
                    },
                    error: function (jqXHR, exception) {
                        console.log(exception);
                    }
                });
            });
        });

    </script>

@endsection
