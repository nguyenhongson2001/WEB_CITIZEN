                <div id="danhsachtp" class="tabcontent" style="display: none;">
                    <div class="formcontent">
                        
                        <div class="container">
                            <div class="title">PHÂN LOẠI THEO CÁC ĐƠN VỊ TRỰC THUỘC</div>
                            <div class="content">
                                <form action="#">
                                    <div class="selectpeople">

                                        @if (session('userType') === 'A1') 
                                            <!-- <div class="select-country nameselect">
                                                <p>Toàn quốc</p>
                                                <select>
                                                    <option value="all">- Chọn toàn quốc -</option>
                                                </select>
                                            </div> -->

                                            <div class="select-city nameselect">
                                                <p>Tỉnh/TP</p>
                                                <select id="city-selector" onchange='load_list("district")'>
                                                    <option value="">- Chọn tỉnh/ TP -</option>
                                                    @for ($i = 0; $i < sizeof($underList); $i++)
                                                        <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        @endif

                                        @if (session('userType') === 'A1' || session('userType') === 'A2') 
                                            <div class="select-district nameselect">
                                                <p>Quận/Huyện</p>
                                                <select id="district-selector" onchange='load_list("commune")'>
                                                    <option value="">- Chọn huyện -</option>
                                                    @if (session('userType') === 'A2')
                                                        @for ($i = 0; $i < sizeof($underList); $i++)
                                                            <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                        @endfor
                                                    @endif
                                                </select>
                                            </div>
                                        @endif

                                        @if (session('userType') === 'A1' || session('userType') === 'A2' || session('userType') === 'A3')
                                            <div class="select-wards nameselect">
                                                <p>Phường/Xã</p>
                                                <select id="commune-selector" onchange='load_list("village")'>
                                                    <option value="">- Chọn xã/ phường -</option>
                                                    @if (session('userType') === 'A3')
                                                        @for ($i = 0; $i < sizeof($underList); $i++)
                                                            <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                        @endfor
                                                    @endif
                                                </select>
                                            </div>
                                        @endif

                                        @if (session('userType') === 'A1' || session('userType') === 'A2' || session('userType') === 'A3' || session('userType') === 'B1')
                                            <div class="select-village nameselect">
                                                <p>Thôn/Tổ dân phố</p>
                                                <select id="village-selector">
                                                    <option value="">- Chọn thôn/ Tổ dân phố -</option>
                                                    @if (session('userType') === 'B1')
                                                        @for ($i = 0; $i < sizeof($underList); $i++)
                                                            <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                        @endfor
                                                    @endif
                                                </select>
                                            </div>
                                        @endif
                                        {{ csrf_field() }}
                                    </div>
                                    <div class="button">
                                        <input type="button" value="Tiếm kiếm" onclick="search()">
                                    </div>
                                </form>
                            </div>
                            
                        </div> 
                    </div>
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">Danh Sách Dân Số</div>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                     <th>STT</th>
                                     <th>Họ và tên</th>
                                     <th>Ngày sinh</th>
                                     <th>Giới tính</th>
                                     <th>Công việc</th>
                                     <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                    <tbody id="search-results">
                                      
                                   </tbody>
                            </table>   

                            <br>
                            <div id="no-result-notif" style="color: red;"></div>
                        </div>

                        <div class="dialog-click">
                            <a class="dialog-btn" href="#my-dialog"></a>
        
                            <div class="dialog overlay" id="my-dialog">
                                <a href="#" class="overlay-close"></a>
                    
                                <div class="dialog-body">
                                    <a class="dialog-close-btn" href="#">&times;</a>
                                    <table class="table-individual">
                                        <thead>
                                            <tr>
                                             <th>Thông tin cá nhân</th>
                                             <th></th>
                                            </tr> 
                                        </thead>
                                            <tbody id="persondetail">
                                               <!-- <tr>
                                                   <td >Họ và tên</td>
                                                   <td >Lê Văn Minh</td>
                                                 </tr>
                                                 <tr>
                                                    <td >Giới tính</td>
                                                    <td >Nam</td>
                                                  </tr>
                                                  <tr>
                                                    <td >Ngày sinh</td>
                                                    <td >123456789</td>
                                                  </tr>
                                                  <tr>
                                                    <td >CMND/CCCD</td>
                                                    <td >1223334</td>
                                                  </tr>
                                                  <tr>
                                                    <td >Quê Quán</td>
                                                    <td >Thọ Đa, Kim Nỗ, Đông Anh, Hà Nội</td>
                                                  </tr>
                                                  <tr>
                                                    <td >Địa chỉ thường trú</td>
                                                    <td >Thọ Đa, Kim Nỗ, Đông Anh, Hà Nội</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Tôn giáo</td>
                                                    <td>Không</td>
                                                  </tr>
                                                  <tr>
                                                    <td >Trình độ văn hoá</td>
                                                    <td >Cấp 3</td>
                                                  </tr>
                                                  <tr>
                                                    <td >Nghề nghiệp</td>
                                                    <td >Sinh viên</td>
                                                  </tr>   -->
                                           </tbody>
                                           
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    function load_list(atlevel) {
                        var cityID = $('#city-selector').val();
                        var districtID = $('#district-selector').val();
                        var communeID = $('#commune-selector').val();


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
                                        document.querySelector('#district-selector').innerHTML = data;    
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
                                        document.querySelector('#commune-selector').innerHTML = data;
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
                                        document.querySelector('#village-selector').innerHTML = data;
                                    }
                                });
                            }
                        }
                    }

                    function search() {
                        var cityID = $('#city-selector').val();
                        var districtID = $('#district-selector').val();
                        var communeID = $('#commune-selector').val();
                        var villageID = $('#village-selector').val();
                        
                        var usertype = "{{ session('userType') }}";

                        var keyID = "";
                        var level = "";

                        if (villageID !== '') {
                            keyID = villageID;
                            level = 'village';
                        }

                        else if (communeID !== "") {
                            keyID = communeID;
                            level = 'commune';
                        }

                        else if (districtID !== "") {
                            keyID = districtID;
                            level = 'district';
                        }

                        else if (cityID !== '') {
                            keyID = cityID;
                            level = 'city';
                        }

                        else {
                            if (cityID === ""){    
                                if (usertype === 'A1') {
                                    level = 'all';
                                }
                                else return;
                            }

                            else if (districtID === '') {
                                if (usertype === 'A2') {
                                    level = "allcity";
                                }
                                else {
                                    return;
                                }
                            }

                            else if (communeID === '') {
                                if (usertype === 'A3') {
                                    level = 'alldistrict';
                                }
                                else return;
                            }

                            else if (villageID === '') {
                                if(usertype === 'B1') {
                                    level = 'allcommune';
                                }
                                else return;
                            }
                            else {
                                return;
                            }    
                        }
                        
                        $.ajax ({
                            url: '/searchlist',
                            type: 'get',
                            data: {
                                level: level,
                                keyID: keyID,
                                _token : '{{csrf_token()}}'
                            },
                            success: function (data) {
                                if (data === '0') {
                                    document.querySelector('#search-results').innerHTML = '';
                                    $('#no-result-notif').html('Chưa có dữ liệu nào trong vùng bạn chọn');
                                }

                                else {
                                    $('#no-result-notif').html('');
                                    document.querySelector('#search-results').innerHTML = data;
                                }
                            }
                        });

                    }

                    function getpersondetail(e) {
                        var index = e.parentNode.id;

                        $.ajax ({
                            url: '/persondetail',
                            type: 'get',
                            data: {
                                STT: index,
                                _token : '{{csrf_token()}}'
                            },
                            success: function (data) {
                                document.querySelector('#persondetail').innerHTML = data;
                            }
                        });

                    }
                </script>