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
            <a href="{{ url('/main/successlogin')}}">
              <i class='bx bx-grid-alt' ></i>
              <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="{{ url('/main/successlogin')}}">Dashboard</a></li>
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
              <li><a href="{{ url('get_delivered_asset_list')}}">Delivered Asset</a></li>
              <li><a href="{{ url('overdate')}}">Overdue Asset</a></li>
              <li><a href="{{ url('get_pending_asset_list')}}">Pending Delivery Asset</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-collection' ></i>
                <span class="link_name">Manage</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Manage</a></li>
              <li><a href="{{ url('get_state_detail')}}">Manage State</a></li>
              <li><a href="{{ url('get_vessel_detail')}}">Manage Vessel</a></li>
              <li><a href="{{ url('get_vendor_detail')}}">Manage Vendor</a></li>
              <li><a href="{{ url('/main/get_account_detail')}}">Manage Account</a></li>
              <li><a href="{{ url('get_category_detail')}}">Manage Category</a></li>
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
              {{-- <button class="mode-switch" title="Switch Theme">
                <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                  <defs></defs>
                  <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                </svg>
              </button>
              <button class="add-btn" title="Add New Project">
                <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" /></svg>
              </button>
              <button class="notification-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                  <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
              </button> --}}
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

        

          {{-- <div id="dashboard_interface" class="dashboard_interface">  
            <div class="app-content">        
              @include('dashboard')
            </div>
          </div>

          <div id="reporting_interface" style="display:none" class="reporting_interface">      
            <div class="app-content">        
              @include('reporting')
            </div>
          </div> --}}
              

        
      

  
      {{-- </section>     --}}

      {{-- <script>
      function showReportingDiv() {
        var reporting_int = document.getElementById("reporting_interface");
        var dashboard_int = document.getElementById("dashboard_interface")
              
        reporting_int.style.display = "block",
        dashboard_int.style.display = "none";
             
      }

      </script> --}}
     

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