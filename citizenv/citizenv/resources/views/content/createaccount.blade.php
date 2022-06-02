

                <div id="taotaikhoan" class="tabcontent" style="display: none;">
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">TẠO TÀI KHOẢN</div>
                            <div class="content">
                                <form action="#">
                                    <div class="user-details">                                            
                                        <div class="input-group2 reponsive-form">
                                            <div class="input-details row-group2">
                                                <span class="details">Đơn vị</span>
                                                <select id="unit-selector">
                                                    <option></option>
                                                    @for ($i = 0; $i < sizeof($underList); $i++)
                                                        <option value="{{$underList[$i]->id}}">{{$underList[$i]->name}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="input-details row-group2">
                                                <span class="details">Tên đăng nhập</span>
                                                <input id="create-username" onclick="getUsername()" type="text" placeholder="" required>
                                                {{ csrf_field() }}
                                            </div>
                                            <div class="input-details row-group2">
                                                <span class="details">Mật khẩu</span>
                                                <input id="newpassword" type="password" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="warming"></div>
                                    <div id="notif"></div>
                                    
                                    <div class="button">
                                        <input onclick="saveAcc()" type="button" value="Xác Nhận">
                                    </div>
                                    @csrf
                                </form>
                            </div>
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

                    #warming {
                        color: red;
                    }

                    #notif {
                        color: green;
                    }
                </style>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    
                    function getUsername() {
                        var unitID = $('#unit-selector').val();

                        if (unitID != '') {   
                            $.ajax ({
                                url: '/createaccount/username',
                                type: 'post',
                                data: {
                                    selectedUnitID: unitID,
                                    _token : '{{csrf_token()}}'
                                },
                                success: function (data) {
                                    console.log(data);
                                    $('#create-username').val(data);
                                }
                            });
                        }
                    }

                    function saveAcc() {
                        var newusername = $('#create-username').val();
                        var newpassword = $('#newpassword').val();
                        $('#notif').html('');
                        $('#warming').html('');

                        if (newpassword == '') {
                            $('#warming').html('Yêu cầu nhập mật khẩu cho tài khoản này');
                        }
                        else {
                            $.ajax ({
                                url: '/saveaccount',
                                type: 'post',
                                data: {
                                    newUsername: newusername,
                                    newPass: newpassword, 
                                    _token : '{{csrf_token()}}'
                                },
                                success: function (data) {
                                    $('#notif').html('Tài khoản đã được cập nhật');
                                }
                            });
                        }

                    }

                </script>