<!-- Stored in resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <title>Wilhelmsen Asset Tracking System</title>
        <link href="{{asset('css/sidebar.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{asset('css/management_board.css')}}" rel="stylesheet" type="text/css" >
        
    </head>
    <body>
      @include('sweetalert::alert')
      <div class="sidebar close">
        <div class="logo-details">
          <i class="sidebar_logo"><img style="width: 60%;" src="{{asset('images/wilhelmsem_sidebar_logo.png')}}"></i>
          <span style="padding-right:10%;" class="logo_name">Wilhelmsen</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="{{ url('/main/staffsuccesslogin')}}">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="{{ url('/main/staffsuccesslogin')}}">Dashboard</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link" href="{{ url('/add-asset')}}">
              <a href="{{ url('/add-asset')}}">
                <i class='bx bx-book-alt' ></i>
                <span class="link_name">Asset</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Asset</a></li>
              <li><a href="{{ url('/get_asset_list')}}">List Asset</a></li>
              <li><a href="{{ url('/add-asset')}}">Add Asset</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-desktop'></i>
                <span class="link_name">CPU List</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">CPU List</a></li>
              <li><a href="{{ url('get_oldCPU_detail')}}">Expired CPU</a></li>
              <li><a href="{{ url('get_win1011_detail')}}">Windows 10/11</a></li>
              <li><a href="{{ url('get_win7_detail')}}">Windows 7</a></li>
              <li><a href="{{ url('get_winXP_detail')}}">Windows XP</a></li>
            </ul>
          </li>
          <li onclick="{{ url('get_de81_detail')}}" href="{{ url('get_de81_detail')}}">
            <a onclick="" href="{{ url('get_de81_detail')}}">
              <i class='bx bx-laptop' ></i>
              <span class="link_name">DE81 Detail</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">DE81 Detail</a></li>
            </ul>
          </li>
          <li onclick="{{ url('reportinginfo')}}" href="{{ url('reportinginfo')}}">
            <a onclick="" href="{{ url('reportinginfo')}}">
              <i class='bx bx-file' ></i>
              <span class="link_name">Report</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Report</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ url('/main/logout')}}">
              <i class='bx bx-log-out'></i>
              <span class="link_name">Log Out</span>
            </a>
            </li>
        </ul>
      </div>

      <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <div class="app-header">
            <div class="app-header-left">
            </div>
            <div class="app-header-right">
              
              <button class="profile-btn">
                <i class='bx bx-user'></i>
                @if (isset(Auth::user()->name))
                <span>{{Auth::user()->name}}</span>
                  </div>
              @else
                  <script>window.location = "/main";</script>
              @endif
              </button>
            </div>
            <button class="messages-btn">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
            </button>
          </div>
        </div>
     

      <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
          arrow[i].addEventListener("click", (e)=>{
         let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
         arrowParent.classList.toggle("showMenu");
          });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("close");
        });
      
        // function load_reporting()
        //   {
        //       $('#main_content_div').load('/main/reportinginfo/');
        //   }
        
      </script>        
      
        <script src="{{ asset('js/sidebar.js') }}"></script>
    {{-- </body>
</html> --}}