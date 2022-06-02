<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CitizenV - Hệ thống điều tra dân số</title>
        <link rel="stylesheet" href="{{asset('template/css/styleweb.css')}}">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
        <link rel="stylesheet" href="{{asset('template/css/stylesider1.css')}}">
        <link rel="stylesheet" href="{{asset('template/css/reponsive.css')}}">
        <script src="{{asset('template/js/validate1.js')}}"></script>
    </head>
<body>
    <div class="page-wrapper">
        <input type="checkbox" name="" id="menu-toggle">

        <div class="sidebar">
            <div class="brand">
                <h3>
                    <i class="las la-balance-scale"></i>
                    CitizenV
                </h3>
            </div>

            <div class="profile-card">
                <div class="profile-img" style="background-image: url('{{asset('template/images/yte_logo.png')}}"></div>
                <div class="profile-info">
                    <h2>{{$name}}</h2>
                    <small></small>
                </div>
                <div class="profile-action">
                    <a href="/logout" id="logout" class="btn btn-white">
                        Đăng xuất 
                        <span><i class="las la-sign-out-alt"></i></span>
                    </a>
                </div>
                <!-- <br> -->
                <!-- <div class="profile-icons">
                    <span class="las la-user"></span>
                    <span class="las la-comment-alt"></span>
                    <span class="las la-file-invoice"></span>
                </div> -->
            </div>

            <div class="sidebar-menu" style="margin-top: 8rem;">
                <div class="menu-item">
                    <a href="#" class="active" onclick="opensidebar(event, 'home')">
                        <span class="las la-home"></span>
                        <span>Trang chủ</span> 
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'taotaikhoan')">
                        <span class="las la-project-diagram"></span>
                        <span> Tạo Tài khoản</span> 
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'danhsachtp')">
                        <span class="las la-tasks"></span>
                        <span>Danh sách dân số</span> 
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'taomatp')">
                        <span class="las la-columns"></span>
                        <span>Tạo mã</span> 
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'phantichdanso')">
                        <span class="las la-users-cog"></span>
                        <span>Phân tích</span> 
                    </a>
                </div>
                
                @if(session('userType') === 'B1' || session('userType') === 'B2')
                <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'nhapthongtin')">
                        <span class="las la-user-ninja"></span>
                        <span>Nhập thông tin</span> 
                    </a>
                </div>
                @endif
                
                <!-- <div class="menu-item">
                    <a href="#" onclick="opensidebar(event, 'doimatkhau')">
                        <span class="las la-cogs"></span>
                        <span>Đổi mật khẩu</span> 
                    </a>
                </div>  -->
            </div>

            <!-- <div class="sidebar-card">
                <h2>Xin chào</h2>
                <p>Bạn muốn đăng xuất khỏi hệ thống?</p>
                
                <a href="/logout" class="btn btn-block btn-white">Đăng xuất</a>
            </div> -->
        </div>

        <div class="main-content">
            <header>
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="head-icons">
                    <!-- <span class="las la-search"></span>
                    <span class="las la-comment-alt"></span> -->
                    <span class="las la-bell"></span>
                    <!-- <div class="head-avatar">
                        <div class="avatar" style="background-image: url('{{asset('template/images/user_logo.jpg')}}')"></div>
                        <span>John Snow</span>
                    </div>  -->
                </div>
            </header>

            <main>
                <div class="page-header">
                    <h1>Chào mừng trở lại</h1>
                    <small>Hệ thống điều tra dân số</small>
                </div>

                <div id="home" class="tabcontent">
                    <div class="analytics">
                        <div class="card engage-card">
                            <div class="card-head">
                                Tin tức
                            </div>
                            <div class="card-body">
                                <div class="slideshow-container">

                                    <div class="mySlides fade">
                                        <div class="numbertext"></div>
                                        <img src="{{asset('template/images/anhdanso1.jpg');}}" style="width:100%">
                                        <div class="text"></div>
                                    </div>
                            
                                    <div class="mySlides fade">
                                        <div class="numbertext"></div>
                                        <img src="{{asset('template/images/anhdanso2.jpg')}}" style="width:100%">
                                        <div class="text"></div>
                                    </div>
                                    
                                    <div class="mySlides fade">
                                        <div class="numbertext"></div>
                                        <img src="{{asset('template/images/anhdanso3.jpg')}}" style="width:100%">
                                        <div class="text"></div>
                                    </div>

                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>          
                                </div>
                                <br>
                            
                                <div style="text-align:center">
                                    <span class="dot" onclick="currentSlide(1)"></span>
                                    <span class="dot" onclick="currentSlide(2)"></span>
                                    <span class="dot" onclick="currentSlide(3)"></span>
                                </div>
                                <script src="{{asset('template/js/sider.js')}}"></script>
                            </div>
                        </div>
                        <div class="card light">
                            <div class="calendar">
                                <div class="calendar-header">
                                    <span class="month-picker" id="month-picker">February</span>
                                    <div class="year-picker">
                                        <span class="year-change" id="prev-year">
                                            <pre><</pre>
                                        </span>
                                        <span id="year">2021</span>
                                        <span class="year-change" id="next-year">
                                            <pre>></pre>
                                        </span>
                                    </div>
                                </div>
                                <div class="calendar-body">
                                    <div class="calendar-week-day">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="calendar-days"></div>
                                </div>
                                <div class="calendar-footer">
                                    <div class="toggle">
                                        <span>Dark Mode</span>
                                        <div class="dark-mode-switch">
                                            <div class="dark-mode-switch-ident"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="month-list"></div>
                                <script src=""></script>
                            </div>
                        </div>
                    </div>
    
                    <div class="grid-2">
                        <div class="card team-progress">
                            <div class="card-head">
                                <div class="team-head">
                                    <div>
                                        <h3>Tiến độ</h3>
                                        <small>890, 344 sales</small>
                                    </div>
                                    <select name="" id="">
                                        <option value="">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>TIẾN ĐỘ</th>
                                            <th>TRẠNG THÁI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <small>1</small>
                                            </td>
                                            <td>
                                                <small>06</small>
                                            </td>
                                            <td>
                                                <small>Quận Cầu Giấy</small>
                                            </td>
                                            <td width="20%">
                                                <div class="team-progress">
                                                    <h4>65%</h4>
                                                    <div class="progress-bar">
                                                        <div class="indicator success" style="width: 65%">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </td>
                                            <td width="10%">
                                                <a href="" class="btn status status-incomplete">Incomplete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small>2</small>
                                            </td>
                                            <td>
                                                <small>02</small>
                                            </td>
                                            <td>
                                                <small>Quận Hoàng Mai</small>
                                            </td>
                                            <td width="20%">
                                                <div class="team-progress">
                                                    <h4>100%</h4>
                                                    <div class="progress-bar">
                                                        <div class="indicator success" style="width: 100%">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </td>
                                            <td width="10%">
                                                <a href="" class="btn status status-complete">Complete</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small>3</small>
                                            </td>
                                            <td>
                                                <small>03</small>
                                            </td>
                                            <td>
                                                <small>Quận Ba Đình</small>
                                            </td>
                                            <td width="20%">
                                                <div class="team-progress">
                                                    <h4>0%</h4>
                                                    <div class="progress-bar">
                                                        <div class="indicator success" style="width: 0%">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </td>
                                            <td width="10%">
                                                <a href="" class="btn status status-unmake">Unmake</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            </div>
                        </div>
    
                        <!-- <div class="card competitors">
                            <div class="card-head">
                                <h4>Bảng xếp hạng</h4>
                                <small>Các tỉnh có dân số đông nhất cả nước</small>
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>Dân số</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <small>1</small>
                                            </td>
                                            <td>
                                                <small>06</small>
                                            </td>
                                            <td>
                                                <small>Quận Cầu Giấy</small>
                                            </td>
                                            <td>
                                                120000
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <small>1</small>
                                            </td>
                                            <td>
                                                <small>06</small>
                                            </td>
                                            <td>
                                                <small>Quận Cầu Giấy</small>
                                            </td>
                                            <td>
                                                120000
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div> -->
                    </div>
                </div>

                @include('content.changepassword')
                @if(session('userType') === 'B1' || session('userType') === 'B2')
					@include('content.import')
				@endif
                @include('content.createaccount')
                @include('content.arealist')
                @include('content.generatecode')
                @include('content.analysis')

            </main>
        </div>
    </div>


    <style>
        #logout {
            display: flex;
            justify-items: center;
            justify-content: space-between;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let menuItems = document.querySelectorAll(".sidebar .menu-item a");
        for (let i = 0; i < menuItems.length; i++) {
            menuItems[i].addEventListener("click", () => {
                for (let j = 0; j < menuItems.length; j++) {
                    if (i == j) {
                        menuItems[i].classList.add("active");
                    } else {
                        menuItems[j].classList.remove("active");
                    }
                }
            })
        }

        //Home-tab
        let tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 1; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Open Sub-menu
        function opensidebar(event, sub_menu) {
            let tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(sub_menu).style.display = "block";
        }

        //chart-menu
        let chart = document.getElementsByClassName("chart");
        for (let i = 1; i < chart.length; i++) {
            chart[i].style.display = "none";
        }
        function openchart(event, chart_menu) {
            for (let i = 0; i < chart.length; i++) {
                chart[i].style.display = "none";
            }
            document.getElementById(chart_menu).style.display = "flex";
        }

        let buttonCharts = document.querySelectorAll(".all-buttonchart a");
        for (let i = 0; i < buttonCharts.length; i++) {
            buttonCharts[i].addEventListener("click", () => {
                for (let j = 0; j < buttonCharts.length; j++) {
                    if (i == j) {
                        buttonCharts[i].classList.add("active");
                    } else {
                        buttonCharts[j].classList.remove("active");
                    }
                }
            })
        }

        
        // chartbar1
        const ctx1 = document.getElementById('myChartbar1');
        const myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['0-4', '5-9', '10-14', '15-19', '25-34', '35-39','40-44','45-54','55-64','65-79','80+'],
                datasets: [{
                    label: 'Nam',
                    data: [4.9,5.2,4.4,4,5,4.5,4,3.8,3.2,2,1.2,0.7],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],}, {
                        label: 'Nữ',
                        data: [4,4.3,3.8,4,4.8,4.5,4,3.6,3.5,2.7,1.8,1.2],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',                             
                        ],
                    }
                ],
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart'
                        }
                    }
                },
                borderWidth: 1
            },
        });

        // chartbar2
        const ctxbar2 = document.getElementById('myChartbar2');
        const myChartbar2 = new Chart(ctxbar2, {
            type: 'bar',
            data: {
                labels: ['1989','1999','2009','2021'],
                datasets: [{
                    label: 'Chung',
                    data: [65.2, 68.2, 72.8, 73.6],
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                    'rgba(75, 192, 192, 1)',
                    ],},
                    {
                    label: 'Nam',
                    data: [63, 66.5, 70.2, 71],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],}, {
                        label: 'Nữ',
                        data: [67.5 , 70.1, 75.6, 76.3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',                             
                        ],
                    }
                ],
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Bar Chart'
                        }
                    }
                },
                borderWidth: 1
            },
        });


        // chartpie
        const ctx3 = document.getElementById('myChartpie');
        const myChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Chưa đi học', 'Tốt nghiệp Tiểu học', 'Tốt nghiệp THCS ', 'Tốt nghiêp THPT trở lên',],
                datasets: [{
                    label: '# of Votes',
                    data: [2.9, 29.5, 28.5, 39.1],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
        });

        // chart line
        const ctx4 = document.getElementById('myChartline');
        const myChart4 = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: ['Nhà lãnh đạo', 'Chuyên viên kỹ thuật bậc cao', 'Chuyên viên kĩ thuật bậc trung', 'Nhân viên', 'Dịch vụ cá nhân', 'Nghề nông lâm ngư nghiệp','Thợ thủ công','Thợ lắp rắp','Thợ đơn', 'Khác'],
                datasets: [{
                    label: '2021',
                    data: [1,8,3,2,18,7,14,12,35,1],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: '2015',
                    data: [1,7,3,2,17,10,12,9,39,1],
                    fill: false,
                    borderColor: 'rgba(255, 206, 86)',
                    tension: 0.1
                }]
            },
        });

        //Chart
        const ctx5 = document.getElementById('myChartcombo');
        const myChart5 = new Chart(ctx5, {
            type: 'scatter',
            data: {
                labels: [
                    '1984',
                    '1994',
                    '2000',
                    '2004',
                    '2010',
                    '2014',
                    '2021'
                ],
                datasets: [{
                        type: 'line',
                        label: 'Tỷ lệ gia tăng dân số',
                        data: [2.3, 1.7, 1.1, 0.92,1, 1.04, 0.96],
                        borderColor: 'rgb(200, 160, 235)'
                    }, {
                        type: 'line',
                        label: 'Tỷ suất sinh',
                        data: [28, 20.1, 19.8, 18.3, 17.5, 17.1, 14],
                        fill: false,
                        borderColor: 'rgb(55, 16, 235)'
                    }, {
                        type: 'line',
                        label: 'Tỷ suất tử',
                        data: [7.9, 5.9, 5.6, 5.7, 6.8, 6.8, 7.09],
                        fill: false,
                        borderColor: 'rgb(255, 16, 235)'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        //calendar
        let calendar = document.querySelector('.calendar');

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0);
        }

        getFebDays = (year) => {
            return isLeapYear(year) ? 29 : 28;
        }

        generateCalendar = (month, year) => {
            let calendar_days = calendar.querySelector('.calendar-days');
            let calendar_header_year = calendar.querySelector('#year');
            let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            calendar_days.innerHTML = '';
            let currDate = new Date();
            if (!month) month = currDate.getMonth();
            if (!year) year = currDate.getFullYear();
            let curr_month = `${month_names[month]}`;
            month_picker.innerHTML = curr_month;
            calendar_header_year.innerHTML = year;

            // get first day of month
            let first_day = new Date(year, month, 1);
            for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
                let day = document.createElement('div');
                if (i >= first_day.getDay()) {
                    day.classList.add('calendar-day-hover');
                    day.innerHTML = i - first_day.getDay() + 1;
                    day.innerHTML += `<span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>`;
                    if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                        day.classList.add('curr-date');
                    }
                }
                calendar_days.appendChild(day);
            }
        }

        let month_list = calendar.querySelector('.month-list');
        month_names.forEach((e, index) => {
            let month = document.createElement('div');
            month.innerHTML = `<div data-month="${index}">${e}</div>`;
            month.querySelector('div').onclick = () => {
                month_list.classList.remove('show');
                curr_month.value = index;
                generateCalendar(index, curr_year.value);
            }
            month_list.appendChild(month);
        })

        let month_picker = calendar.querySelector('#month-picker');
        month_picker.onclick = () => {
            month_list.classList.add('show');
        }

        let currDate = new Date();
        let curr_month = {value: currDate.getMonth()};
        let curr_year = {value: currDate.getFullYear()};
        generateCalendar(curr_month.value, curr_year.value);

        document.querySelector('#prev-year').onclick = () => {
            --curr_year.value;
            generateCalendar(curr_month.value, curr_year.value);
        }

        document.querySelector('#next-year').onclick = () => {
            ++curr_year.value;
            generateCalendar(curr_month.value, curr_year.value);
        }

        let dark_mode_toggle = document.querySelector('.dark-mode-switch');
        let card = document.querySelector('.card.light');
        console.log(card);

        dark_mode_toggle.onclick = () => {
            card.classList.toggle('dark');
            card.classList.toggle('light');
        }


        //Check form nhập thông tin
        
    </script>
</body>
</html>