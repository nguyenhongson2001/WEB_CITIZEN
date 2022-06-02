                <div id="taomatp" class="tabcontent" style="display: none;">
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">TẠO MÃ CHO ĐƠN VỊ CẤP DƯỚI</div>
                            <br>
                            <div class="content">
                                <form action="#">
                                    <div class="user-details"> 
                                            <div class="input-details row-group2">
                                                <span class="details">Đơn vị</span>
                                                <select id="taoma-unit-selector">
                                                    <option></option>
                                                    @for ($i = 0; $i < sizeof($underList); $i++)
                                                        <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="input-details row-group2">
                                                <span class="details">Tạo mã</span>
                                                <input id="create-code" onclick="checkCodeExist()" type="text" placeholder="" required>
                                            </div>
                                    </div>

                                    <div id="taoma-warming"></div>
                                    <div id="taoma-notif"></div>

                                    <div class="button">
                                        <input onclick="saveCode()" type="button" value="Xác Nhận">
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div> 
                    </div>

                    
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">DANH SÁCH</div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã</th>
                                        <th>Tên</th>
                                        <th>Cấp quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @for ($i = 0; $i < sizeof($underList); $i++)
                                        <tr>
                                            <td>{{$i + 1}}</td>
                                            <td>{{$underList[$i]->code}}</td>
                                            <td value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</td>
                                            <td data-label="Cấp quyền">
                                                <div class="button-change">
                                                    <input type="checkbox" name="" id="switch1">
                                                        <label for="switch1">
                                                        <div></div>
                                                        </label>
                                                </div>	 
                                            </td>
                                        </tr>
                                        @endfor
                                            <!-- <td data-label="STT"></td>
                                            <td data-label="Mã">1</td>
                                            <td data-label="Tên">D</td>
                                            <td data-label="Thời gian khai báo">
                                                <div class="date-khaibao">
                                                    <input type="text date">13/02/2001
                                                </div>
                                            </td>
                                            <td data-label="Thời gian kết thúc">
                                            <div class="date-khaibao">
                                                <input type="text date">14/05/2001
                                            </div>
                                            </td>
                                            <td data-label="Cấp quyền">
                                            <div class="button-change">
                                                <input type="checkbox" name="" id="switch1">
                                                    <label for="switch1">
                                                    <div></div>
                                                    </label>
                                            </div>	 
                                            </td> -->
                                   
                           
                                    
                           
                                
                            </tbody>
                                   
                            </table>
                        </div>
                    </div>
                </div>

                <style>
                    .input-details select{
                        width: 100%;
                        height: 30px;
                        border: 1px solid #b3b3b3;
                        border-radius: 3px;
                        outline: none;
                        font-size: 1.4rem;
                        background: rgba(255,255,255,.7) ;
                        font-weight: 500; 
                        color: #8492a6;
                    } 
                    #taoma-warming {
                        color: red;
                    }

                    #taoma-notif {
                        color: green;
                    }

                    #taomatp .user-details {
                        display: flex;
                        margin-bottom: 20px;
                    }
                </style>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    function checkCodeExist() {
                        var unitID = $('#taoma-unit-selector').val();

                        $('#taoma-notif').html('');
                        $('#taoma-warming').html('');

                        if (unitID != '') {   
                            $.ajax ({
                                url: '/checkexist',
                                type: 'get',
                                data: {
                                    selectedid : unitID,
                                    _token : '{{csrf_token()}}'
                                },
                                success: function (data) {
                                    $('#taoma-warming').html(data);
                                }
                            });
                        }
                    }

                    function checkCodeValid(inputcode) {
                        $.ajax ({
                            url: '/checkvalidcode',
                            type: 'get',
                            data: {
                                inCode : inputcode,
                                _token : '{{csrf_token()}}'
                            },
                            success: function (data) {
                                $('#taoma-warming').html(data);                                
                            }
                        });
                    }

                    function saveCode() {
                        var unitID = $('#taoma-unit-selector').val();
                        var inputcode = $('#create-code').val();

                        $('#taoma-notif').html('');
                        $('#taoma-warming').html('');

                        if (inputcode == '') {
                            $('#taoma-warming').html('Bạn chưa nhập mã cần lưu.');
                        }

                        else if (unitID == '') {
                            $('#taoma-warming').html('Bạn chưa chọn vùng để tạo mã');
                        }

                        else if (unitID != '') {   
                            checkCodeValid(inputcode);
                            
                            $.ajax ({
                                url: '/savecode',
                                type: 'post',
                                data: {
                                    selectedid: unitID,
                                    newcode : inputcode,
                                    _token : '{{csrf_token()}}'
                                },
                                success: function (data) {
                                    if (data.charAt(0) == '1') {
                                        data = data.substring(1);
                                        $('#taoma-notif').html(data);
                                    }
                                    else if (data.charAt(0) == '0') {
                                        data = data.substring(1);
                                        $('#taoma-warming').html(data);
                                    }
                                }
                            });
                        }
                    }
                </script>