<tr>
    <td >Họ và tên</td>
    <td >{{$detail->name}}</td>
  </tr>
  <tr>
     <td >Giới tính</td>
     <td >{{$detail->gender}}</td>
   </tr>
   <tr>
     <td >Ngày sinh</td>
     <td >{{$detail->dob}}</td>
   </tr>
   <tr>
     <td >CMND/CCCD</td>
     <td >{{$detail->id}}</td>
   </tr>
   <tr>
     <td >Quê Quán</td>
     <td >{{$detail->village . ', ' 
         . $detail->commune . ', '
         . $detail->district .', '
         . $detail->city}}</td>
   </tr>
   <tr>
     <td >Địa chỉ tạm trú</td>
     <td > @if ($detail->tempvillage !== null) 
         {{$detail->tempvillage . ', ' 
         . $detail->tempcommune . ' '
         . $detail->tempdistrict .', '
         . $detail->tempcity}} 
        @endif
     </td>
   </tr>
   <tr>
     <td>Tôn giáo</td>
     <td>{{$detail->tongiao}}</td>
   </tr>
   <tr>
     <td >Trình độ văn hoá</td>
     <td >{{$detail->culturelevel}}</td>
   </tr>
   <tr>
     <td >Nghề nghiệp</td>
     <td >{{$detail->job}}</td>
</tr> 