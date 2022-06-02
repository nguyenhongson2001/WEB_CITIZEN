@for($i = 0; $i < sizeof($searchresults); $i++)
    <tr>
        <td data-label="STT">{{$i + 1}}</td>
        <td data-label="Họ và tên">{{$searchresults[$i]->name}}</td>
        <td data-label="Ngày sinh">{{$searchresults[$i]->dob}}</td>
        <td data-label="Giới tính">{{$searchresults[$i]->gender}}</td>
        <td data-label="Công việc">{{$searchresults[$i]->job}}</td>
        <td data-label="Chi tiết" id="{{$searchresults[$i]->stt}}"><a class="dialog-btn" href="#my-dialog" onclick="getpersondetail(this)">Xem thêm</td>                                        
    </tr>
@endfor