<?php
use App\Models\B2;
use Illuminate\Support\Facades\Auth;
?>
                <div id="nhapthongtin" class="tabcontent" style="display: none;">
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">THÔNG TIN CÁ NHÂN</div>
                            <div class="content">
                                <form action="#">
                                    <div class="user-details">
                                        <div class="input-group2 reponsive-form">
                                            <div class="input-details row-group2">
                                                 <span class="details ">Họ tên</span>
                                                 <input id="person-name" type="text" class="" placeholder="" required>
												<span id="name_error" class="error" style="color: red;"></span>
											</div>
                                            <div class="input-detail row-group2 ">
                                                <span class="details">Giới tính</span>
                                                <div id="person-gender" class="radio-group">
                                                     <label >
                                                         <input type="radio" value="Nam" name="gender">
                                                         <p>Nam</p>
                                                     </label>
                                                     <label >
                                                         <input type="radio" value="Nữ" name="gender">
                                                         <p>Nữ</p>
                                                     </label>
                                                     <label >
                                                         <input type="radio" value="Khác" name="gender">
                                                         <p>Khác</p>
                                                     </label>
                                                </div>
												
                                            </div>
                                        </div>
                                          <div class="input-group3 reponsive-form">
                                                <div class="input-details row-group3">
                                                 <span class="details ">Ngày sinh</span>
                                                 <input id="person-dob" type="date" placeholder="" required min="1900-01-01" max="2021-12-31">
                                                 <span id="birthday_error" class="error" style="color: red;"></span>
                                                </div>
                                                <div class="input-details row-group3">
                                                 <span class="details ">CMND / CCCD</span>
                                                 <input id="person-id" type="text" class="" placeholder="" required>
												 <span id="cccd_error" class="error" style="color: red;"></span>
                                                </div> 
                                                <!-- <div class="input-details row-group3">
                                                 <span class="details ">Quốc tịch</span>
                                                 <input class="" type="text" placeholder="" required>
                                                </div> -->
                                         </div>
                                        <div class="input-group2  reponsive-form">
                                            <div class="input-details row-group2">
                                                <span class="details">Tỉnh/Thành phố (thường trú)</span>
                                                <input readonly id="person-city-selector" value="{{session('fulladdress')->city}}" type="text" placeholder="" required>
												<span id="permanent-city_error" class="error" style="color: red;"></span>
                                            </div>
                                            <div class="input-details row-group2">
                                                <span class="details">Quận/Huyện (thường trú)</span>
                                                <input readonly id="person-district-selector" value="{{session('fulladdress')->district}}" type="text" placeholder="" required>
												<span id="permanent-district_error" class="error" style="color: red;"></span>
											</div>
                                        </div>
                                        <div class="input-group2  reponsive-form">
                                            <div class="input-details row-group2">
                                                <span class="details">Xã/Phường (thường trú)</span>
                                                <input readonly id="person-commune-selector" value="{{session('fulladdress')->commune}}" type="text" placeholder="" required>
												<span id="permanent-commune_error" class="error" style="color: red;"></span>
											</div>
                                            <div class="input-details row-group2">

                                                <span class="details">Thôn/Tổ dân phố (thường trú)</span>
                                                @if (session('userType') === 'B2') 
                                                    <input readonly id="person-village-selector" value="{{session('fulladdress')->village}}" type="text" placeholder="" required>
                                                @endif

                                                @if (session('userType') === 'B1')
                                                    <select id="person-village-selector">
                                                    <option value="">- Chọn thôn/ Tổ dân phố -</option>
                                                        @for ($i = 0; $i < sizeof($underList); $i++)
                                                            <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                        @endfor
                                                    </select>
                                                @endif
												<span id="permanent-village_error" class="error" style="color: red;"></span>
                                                <div id="form-select-alert" style="color: red;"></div>
                                            </div>
                                        </div>
                                        <div class="input-group3 reponsive-form">
                                            <div class="input-details row-group3">
                                             <span class="details ">Công việc</span>
                                             <input id="person-job" type="text" class="" placeholder="" required>
                                             <span id="job_error" class="error" style="color: red;"></span>
                                            </div>
                                            <div class="input-details row-group3">
                                             <span class="details ">Tôn giáo</span>
                                             <input id="person-tongiao" type="text" class="" placeholder="" required>
											 <span id="religion_error" class="error" style="color: red;"></span>
                                            </div> 
                                            <div class="input-details row-group3">
                                             <span class="details ">Trình độ văn hóa</span>
                                             <input id="person-culturelevel" class="" type="text" placeholder="" required>
											 <span id="education-level_error" class="error" style="color: red;"></span>
                                            </div>
                                        </div>
                                     <div class="input-group3 reponsive-form">
                                        <div class="input-details row-group3">
                                            <span class="details ">Tỉnh/Thành phố (tạm trú)</span>
                                            <!-- <input id="person-temp-city" type="text" class="" placeholder="" required> -->
                                            <select id="import-city-selector" onchange='load_list1("district")'>
                                                <option value="">- Chọn tỉnh/ TP -</option>
                                                @for ($i = 0; $i < sizeof(session('allcity')); $i++)
                                                    <option value="{{session('allcity')[$i]->id}}">{{session('allcity')[$i]->name}}</option>
                                                @endfor
                                            </select>
											<span id="temporary-city_error" class="error" style="color: red;"></span>
                                        </div>
                                        <div class="input-details row-group3">
                                         <span class="details ">Quận/Huyện (tạm trú)</span>
                                         <!-- <input id="person-temp-district" type="text" class="" placeholder="" required> -->
                                         <select id="import-district-selector" onchange='load_list1("commune")'>
                                            <option value="">- Chọn huyện -</option>
                                         </select>
										 <span id="temporary-district_error" class="error" style="color: red;"></span>
                                        </div> 
                                        <div class="input-details row-group3">
                                         <span class="details ">Xã/Phường (tạm trú)</span>
                                         <!-- <input id="person-temp-commune" class="" type="text" placeholder="" required> -->
                                         <select id="import-commune-selector" onchange='load_list1("village")'>
                                            <option value="">- Chọn xã/ phường -</option>
                                         </select>
										 <span id="temporary-commune_error" class="error" style="color: red;"></span>
                                        </div>
                                 </div>
                                 <div class="input-group2 reponsive-form">
                                        <div class="input-details row-group3">
                                            <span class="details ">Thôn/Tổ dân phố (tạm trú)</span>
                                            <!-- <input id="person-temp-village" class="" type="text" placeholder="" required> -->
                                            <select id="import-village-selector">
                                                    <option value="">- Chọn thôn/ Tổ dân phố -</option>
                                            </select>
											
                                        </div>
                                </div>
                                        
                                    </div>
                                    {{ csrf_field() }}
                                    <div id="form-success-notif" style="color: green;"></div>
                                    <div class="button">
                                        <input onclick="submitPersonForm()" type="button" value="GỬI">
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>

                <style>
                    
                </style>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    function load_list1(atlevel) {
                        var cityID = $('#import-city-selector').val();
                        var districtID = $('#import-district-selector').val();
                        var communeID = $('#import-commune-selector').val();

                        if (atlevel === 'district') {
                            if (cityID !== '') {
                                $.ajax ({
                                    url: '/getlistname',
                                    type: 'get',
                                    data: {
                                        atlevel: 'district',
                                        cityID: cityID,
                                        _token : '{{csrf_token()}}'
                                    },
                                    success: function (data) {
                                        data = '<option value="">- Chọn huyện -</option>' + data;
                                        document.querySelector('#import-district-selector').innerHTML = data;    
                                    }
                                });
                            }
                        }

                        if (atlevel === 'commune') {
                            if (districtID !== '') {
                                
                                $.ajax ({
                                    url: '/getlistname',
                                    type: 'get',
                                    data: {
                                        atlevel: 'commune',
                                        districtID: districtID,
                                        _token : '{{csrf_token()}}'
                                    },
                                    success: function (data) {
                                        data = '<option value="">- Chọn xã/ phường -</option>' + data;
                                        document.querySelector('#import-commune-selector').innerHTML = data;
                                    }
                                });
                            }
                        }

                        if (atlevel === 'village') {    
                            if (communeID !== '') {
                                $.ajax ({
                                    url: '/getlistname',
                                    type: 'get',
                                    data: {
                                        atlevel: 'village',
                                        communeID: communeID,
                                        _token : '{{csrf_token()}}'
                                    },
                                    success: function (data) {
                                        data = '<option value="">- Chọn thôn/ Tổ dân phố -</option>' + data;
                                        document.querySelector('#import-village-selector').innerHTML = data;
                                    }
                                });
                            }
                        }
                    }

                    function submitPersonForm() {
						validate();
                        var name = $('#person-name').val();
                        var gender = $('#person-gender input[type="radio"][name="gender"]:checked').val();
                        var dob = $('#person-dob').val();
                        var id = $('#person-id').val();
                        var job = $('#person-job').val();
                        var tongiao = $('#person-tongiao').val();
                        var culturelevel = $('#person-culturelevel').val();
                        var cityCode = '{{ Auth::id(); }}'.substring(0, 2);
                        var districtCode = '{{Auth::id()}}'.substring(2, 4);
                        var communeCode = '{{Auth::id()}}'.substring(4, 6);
                        var villageCode = "";
                        var tempcityid = $('#import-city-selector').val();
                        var tempdistrictid = $('#import-district-selector').val();
                        var tempcommuneid = $('#import-commune-selector').val();
                        var tempvillageid = $('#import-village-selector').val();       
                        
                        <?php 
                            if (session('userType') === 'B2') {
                                $code = Auth::id();
                                echo "villageCode = '.$code.'.substring(7, 9);";
                            }

                            else if (session('userType') === 'B1') {
                                echo "var villageID = $('#person-village-selector').val();

                                if (villageID === '') {
                                    $('#form-select-alert').html('Thôn/Tổ dân phố chưa được chọn');
                                    return;
                                }

                                $.ajax ({
                                    url: '/B2/getcodefromid',
                                    type: 'post',
                                    data: {
                                        id: villageID,
                                        _token : '{{csrf_token()}}'
                                    },
                                    success: function (data) {
                                        villageCode = data;
                                    }
                                });";
                            }
                        ?>  
                        
                        console.log(name);
                        console.log(gender); 
                        console.log(dob); 
                        console.log(id);  
                        console.log(job);
                        console.log(tongiao);
                        console.log(culturelevel);
                        console.log(cityCode);
                        console.log(districtCode);
                        console.log(communeCode);
                        console.log(villageCode);
                        console.log(tempcityid);
                        console.log(tempdistrictid);
                        console.log(tempcommuneid); 
                        console.log(tempvillageid);   

                        $.ajax ({
                            url: '/saveperson',
                            type: 'post',
                            data: {
                                name: name,
                                gender: gender,
                                dob: dob,
                                job: job,
                                id: id,
                                tongiao: tongiao,
                                culturelevel: culturelevel,
                                cityCode: cityCode,
                                districtCode: districtCode,
                                communeCode: communeCode,
                                villageCode: villageCode,
                                tempcityid: tempcityid,
                                tempdistrictid: tempdistrictid,
                                tempcommuneid: tempcommuneid,
                                tempvillageid: tempvillageid,
                                _token : '{{csrf_token()}}'
                            },
                            success: function (data) {
                                console.log('hi');
                                $('#form-success-notif').html(data);
                            }
                        });
                        
                    }
                </script>