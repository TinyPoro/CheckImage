@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th scope="col" rowspan="3" colspan="3">Khung chương trình Toán 9</th>
                <th scope="col" rowspan="1"></th>
                <th scope="col" colspan="2">Trong chương trình trên lớp</th>
                <th scope="col" colspan="8">Ngoài chương trình trên lớp	</th>
            </tr>
            <tr>
                <th scope="col" rowspan="2">Không xác định</th>
                <th scope="col" rowspan="2">SGK</th>
                <th scope="col" rowspan="2">SBT</th>
                <th scope="col" colspan="3">Độ khó tương đương trên lớp</th>
                <th scope="col" colspan="3">Nâng cao cho hệ thường</th>
                <th scope="col" colspan="2">Hệ chuyên	</th>
            </tr>
            <tr>
                <th scope="col">Cô giao</th>
                <th scope="col">Trung tâm học thêm</th>
                <th scope="col">Sách tham khảo mua về</th>
                <th scope="col">Cô giao</th>
                <th scope="col">Trung tâm học thêm</th>
                <th scope="col">Sách tham khảo mua về</th>
                <th scope="col">Lò luyện</th>
                <th scope="col">Cô giao</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" colspan="3">Không xác định</th>
                @foreach($kinds as $kind)
                <td style="background-color:#bcffb7">{{$values['Không xác định'.$kind]}}</td>
                @endforeach
            </tr>
            @foreach($curriculums as $cur_key => $curriculum)
            <tr>
                <th scope="row" colspan="3">{{$cur_key}}</th>
                @foreach($kinds as $kind)
                <td style="background-color:#bcffb7">{{$values[$cur_key.$kind]}}</td>
                @endforeach
            </tr>
            @foreach($curriculum as $cha_key => $chapter)
            <tr>
                <th></th>
                <th scope="row" colspan="2">{{$cha_key}}</th>
                @foreach($kinds as $kind)
                <td style="background-color:#e9ffe8">{{$values[$cur_key.$cha_key.$kind]}}</td>
                @endforeach
            </tr>
            @foreach($chapter as $lesson)
            <tr>
                <th></th>
                <th></th>
                <th>{{$lesson}}</th>
                @foreach($kinds as $kind)
                <td>{{$values[$cur_key.$cha_key.$lesson.$kind]}}</td>
                @endforeach
            </tr>
            @endforeach
            @endforeach
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('after-script')

@endsection
