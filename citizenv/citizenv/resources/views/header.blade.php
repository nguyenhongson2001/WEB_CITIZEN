<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style-form.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="{{ asset('template/js/web.js') }}" charset="utf-8"></script>
</head>
<body>
    <!-- Breadcrumb, Slider, Footer -->
    <!-- Header -->
    <div id="header">
        <div class="navbar-left">
            <i class="bx bx-menu"></i> 
        </div>
        <div class="navbar-right">
            <i class='bx bxs-user-circle'></i>
        </div>
    </div>

    <!-- Sidebar -->
<div id="sidebar">
        <div class="logo-details">
            <i class='bx bx-body'></i>
            <span class="logo_name">Hệ Thống Điều Tra Dân Số</span>
        </div>
        <ul class="nav-links">
            <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-collection"></i>
                    <span class="link_name">Quản lý thông tin</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu tab">
                    <li><a class="link_name"  href="#">Quản lý thông tin</a></li>
                    <li ><a class="tablinks" id="defaultOpen" onclick="opensidebar(event, 'taomatp')" href="#" >Tạo mã</a></li> 
                    <li ><a class="tablinks"  onclick="opensidebar(event, 'taotaikhoan')" href="#" >Tạo tài khoản</a></li>
                    <li ><a class="tablinks" onclick="opensidebar(event, 'danhsachtp') " href="#" >Danh Sách TP</a></li>     
            </ul>
            </li> 
            <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-line-chart"></i>
                    <span class="link_name">Phân tích</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#" class="link_name">Phân tích</a></li>
                <li><a class="tablinks" >Danh sách dân số</a></li>
                <li><a class="tablinks" >Phân tích dân số</a></li>
                <li><a class="tablinks" >Thông tin</a></li>
            </ul>
            </li>
            <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-search" ></i>
                    <span class="link_name">Tìm kiếm</span>
                    </a>
                    <ul class="sub-menu">
                    <li><a href="#" class="link_name">Tìm kiếm</a></li>
                </ul> 
            </div>
            </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-shield-alt-2"></i>
                    <span class="link_name">Quản lý tài khoản</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#" class="link_name">Quản lý tài khoản</a></li>
                <li ><a class="tablinks" onclick="opensidebar(event, 'doimatkhau') "href="#" >Đổi mật khẩu</a></li> 
            </ul>
            </li>  
        </ul>
    </div>
