@include('layouts.staff_app')  
  <div class="app-content">          
    <div class="projects-section">
      <div class="projects-section-header">
        <p>Dashboard</p>
      </div>   
      <div class="project-boxes jsGridView">

        {{-- Dashboard UI for Computer > 5 years --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_oldCPU_detail')}}';">
              <div class="project-box">
                <div class="project-box-header">
                  <div class="more-wrapper">
                  </div>
                </div>
                <div class="project-box-content-header">
                  <svg width="128px" id="computer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <defs>
                      <style>
                        .xp-1{fill:#7c7d7d}
                        .xp-2{fill:#919191}
                      </style>
                    </defs>
                    <path class="xp-1" d="M47 3v29H1V3a2 2 0 0 1 2-2h42a2 2 0 0 1 2 2z"/>
                    <path class="xp-2" d="M47 3v27H7a4 4 0 0 1-4-4V1h42a2 2 0 0 1 2 2z"/>
                    <path class="xp-1" d="M47 32v4a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-4z"/>
                    <path class="xp-2" d="M47 32v4H5a2 2 0 0 1-2-2v-2z"/>
                    <path style="fill:#dad7e5" d="M5 5h38v23H5z"/>
                    <path d="M43 5v21H28A21 21 0 0 1 7 5z" style="fill:#edebf2"/>
                    <path d="M24 36a1 1 0 1 1 .71-1.71A1 1 0 0 1 24 36z" style="fill:#747575"/>
                    <path class="xp-1" d="M17 43h14a2 2 0 0 1 2 2v2H15v-2a2 2 0 0 1 2-2zM28 38.17c0-.24.59-.17-4-.17s-4-.08-4 .17A6.84 6.84 0 0 1 18 43h12a6.84 6.84 0 0 1-2-4.83z"/>
                    <path class="xp-2" d="M33 45H19a2 2 0 0 1-2-2c0-.1-.8 0 14 0a2 2 0 0 1 2 2zM28.62 41H25a3 3 0 0 1-3-3h6a6.68 6.68 0 0 0 .62 3z"/>
                  </svg>
                  <p class="box-content-header">Computer > 5 Years</p>
                  <p class="box-content-subheader">List of Expired Computer</p>
                </div>
                  <center>
                    @foreach($total_expiredPC as $expiredPC)
                    <div class="days-left">
                      {{$expiredPC->TotalExpiredPC}}
                    </div>
                    @endforeach
                  </center>
                
              </div>
        </div>

        {{-- Dashboard UI for Windows 10/11 --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_win1011_detail')}}';">
          <div class="project-box">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                  <style>
                    .w7-3{fill:#374f68}
                    .w7-4{fill:#425b72}
                    .w7-5{fill:#edebf2}
                    .w7-6{fill:#6fabe6}
                    .w7-7{fill:#82bcf4}
                  </style>
                </defs>
                <g id="Computer_analytic_Growth" data-name="Computer analytic Growth">
                  <path d="M47 6v26H1V6a2 2 0 0 1 2-2h42a2 2 0 0 1 2 2z" style="fill:#9fdbf3"/>
                  <path d="M47 6v24H7a3 3 0 0 1-3-3V4h41a2 2 0 0 1 2 2z" style="fill:#b2e5fb"/>
                  <path class="w7-3" d="M47 32v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3z"/>
                  <path class="w7-4" d="M47 32v3H6a2 2 0 0 1-2-2v-1z"/>
                  <path class="w7-3" d="M30 44H18l1.33-7h9.34L30 44z"/>
                  <path class="w7-4" d="M29.62 42h-3.53A4.22 4.22 0 0 1 22 37h6.72z"/>
                  <path class="w7-3" d="M32 45H16a1 1 0 0 1 0-2h16a1 1 0 0 1 0 2z"/>
                  <path class="w7-5" d="M16 10H6a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2zM16 14H6a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2zM12 18H6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2z"/>
                  <path class="w7-6" d="M20 21h4v6h-4z"/>
                  <path class="w7-7" d="M24 21v4a2 2 0 0 1-2-2v-2z"/>
                  <path class="w7-6" d="M28 19h4v8h-4z"/>
                  <path style="fill:#db5669" d="M42 14h-2v13h-4V14h-2l4-5 4 5z"/>
                  <path d="M42 14h-2v11a2 2 0 0 1-2-2v-9h-2l3-3.75z" style="fill:#f26674"/>
                  <path class="w7-7" d="M32 19v6a2 2 0 0 1-2-2v-4z"/>
                  <path class="w7-4" d="M42 28H18a1 1 0 0 1 0-2h24a1 1 0 0 1 0 2z"/>
                </g>
              </svg>
              
              <p class="box-content-header">Win 10 / 11 OS</p>
              <p class="box-content-subheader">List of CPU (Win 10/11)</p>
            </div>
              <center>
                @foreach($win1011 as $win1011PC)
                <div class="days-left">
                  {{$win1011PC->Win1011OS}}
                </div>
                @endforeach
              </center>
          </div>
        </div>

        {{-- Dashboard UI for Windows 7 --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_win7_detail')}}';">
          <div class="project-box">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                  <style>
                    .cls-1{fill:#dad7e5}
                    .cls-12,.cls-2{fill:#edebf2}
                    .cls-5{fill:#374f68}
                    .cls-6{fill:#c6c3d8}
                    .cls-8{fill:#a87e6b}
                    .cls-9{fill:#be927c}
                    .cls-12{opacity:.2}
                  </style>
                </defs>
                <g id="Computer_with_Box" data-name="Computer with Box">
                  <path class="cls-1" d="M45 3v26H3V3a2 2 0 0 1 2-2h38a2 2 0 0 1 2 2z"/>
                  <path class="cls-2" d="M45 3v23H30A25 25 0 0 1 5 1h38a2 2 0 0 1 2 2z"/>
                  <rect x="5" y="3" width="38" height="24" rx="2" style="fill:#9fdbf3"/>
                  <path d="M43 5v20H29A22 22 0 0 1 7 3h34a2 2 0 0 1 2 2z" style="fill:#b2e5fb"/>
                  <path class="cls-5" d="M40 9H28a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2zM38 13H28a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2zM36 17h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2zM40 21H28a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2z"/>
                  <path class="cls-1" d="M45 29v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4z"/>
                  <path class="cls-2" d="M45 29v4H9a4 4 0 0 1-4-4z"/>
                  <path class="cls-6" d="M31 47H17l2-12h10z"/>
                  <path class="cls-1" d="M28.69 47H17l1.62-10h4.94a4 4 0 0 1 3.95 3.32z"/>
                  <path class="cls-6" d="m35 47-22 .1a1 1 0 0 1 0-2l22-.1a1 1 0 0 1 0 2z"/>
                  <path class="cls-1" d="M36 45.94c0 .1.28 0-22 .11a1 1 0 0 1-1-1L35 45a1 1 0 0 1 1 .94z"/>
                  <path d="M8 32a1 1 0 0 0-2 0 1 1 0 0 0 2 0z" style="fill:#9dcc6b"/>
                  <path class="cls-5" d="M12 32a1 1 0 0 0-2 0 1 1 0 0 0 2 0zM16 32a1 1 0 0 0-2 0 1 1 0 0 0 2 0z"/>
                  <path class="cls-8" d="m24 11-8 4-8-4 8-4z"/>
                  <path class="cls-9" d="M24 11c-6.61 3.32-1 .49-7 3.5l-5.21-2.61a1 1 0 0 1 0-1.78L17 7.5z"/>
                  <path style="fill:#a07765" d="M16 15v8l-8-4v-8l8 4z"/>
                  <path class="cls-8" d="M24 11v8l-8 4v-8l8-4z"/>
                  <path class="cls-9" d="M24 11v6.5l-4.11 2.05A2 2 0 0 1 17 17.76V14.5z"/>
                  <path d="M21 13v2a1 1 0 0 1-2 0v-1.38l-8.12-4.06 2.24-1.12C20.48 12.13 21 12.16 21 13z" style="fill:#f6ccaf"/>
                  <path class="cls-8" d="M19.5 15.85A1 1 0 0 1 18 15v-1.38l-7.62-3.81c.71-.36-.65-.82 8.62 3.81 0 1.55-.1 1.86.5 2.23z"/>
                  <path class="cls-12" d="M43 5v20a2 2 0 0 1-2 2h-9c1.06-2.31-1.2 2.63 10.62-23.17A2 2 0 0 1 43 5zM37 3 26 27h-6L30 3h7zM22 3 12 27H8L18 3h4z"/>
                </g>
              </svg>
              
              <p class="box-content-header">Win 7 OS</p>
              <p class="box-content-subheader">List of CPU (Win 7)</p>
            </div>
              <center>
                @foreach($win7 as $win7PC)
                <div class="days-left">
                  {{$win7PC->Win7OS}}
                </div>
                @endforeach
              </center>
          </div>
        </div>

        {{-- Dashboard UI for Windows XP --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_winXP_detail')}}';">
          <div class="project-box">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 65" xml:space="preserve">
                <circle fill="#CCD1D9" cx="32" cy="45.74" r="1.5"/>
                <path fill="#CCD1D9" d="M63.5 46.26v1.98c0 1.689-1.311 3-3 3h-57c-1.689 0-3-1.311-3-3v-1.98c0 1.65 1.35 3 3 3h57c1.65 0 3-1.35 3-3zM38.49 51.24l2 9H23.51l2-9h12.98z"/>
                <path fill="#E6E9ED" d="M32 42.24H.5v4.02c0 1.65 1.35 3 3 3h57c1.65 0 3-1.35 3-3v-4.02H32zm0 5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                <path fill="#656D78" d="M63.5 6.26v35.98H.5V6.26c0-1.649 1.35-3 3-3h57c1.65 0 3 1.35 3 3z"/>
                <path fill="#E6E9ED" d="M60.5 39.24v-33h-57v33zM42 60.74H22a.5.5 0 0 1 0-1h20a.5.5 0 0 1 0 1z"/>
                <path fill="#AAB2BD" d="m38.713 52.243-.223-1.003H25.51l-.223 1.003h13.426z"/>
                <path fill="#AC92EC" d="M57.5 19.008c0 .275-.225.5-.5.5H7a.501.501 0 0 1-.5-.5v-9c0-.275.225-.5.5-.5h50c.275 0 .5.225.5.5v9z"/>
                <path fill="#967ADC" d="M23.5 13.008h-14a.5.5 0 0 1 0-1h14a.5.5 0 0 1 0 1zM23.5 15.008h-14a.5.5 0 0 1 0-1h14a.5.5 0 0 1 0 1zM20 17.008h-7a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM54.5 13.008h-14a.5.5 0 0 1 0-1h14a.5.5 0 0 1 0 1zM54.5 15.008h-14a.5.5 0 0 1 0-1h14a.5.5 0 0 1 0 1zM51 17.008h-7a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1z"/>
                <g>
                  <path fill="#FFF" d="M21.5 32.008c0 .275-.225.5-.5.5H7a.501.501 0 0 1-.5-.5v-9c0-.275.225-.5.5-.5h14c.275 0 .5.225.5.5v9z"/>
                </g>
                <g>
                  <path fill="#FFF" d="M39.5 32.008c0 .275-.225.5-.5.5H25a.501.501 0 0 1-.5-.5v-9c0-.275.225-.5.5-.5h14c.275 0 .5.225.5.5v9z"/>
                </g>
                <g>
                  <path fill="#FFF" d="M57.5 32.008c0 .275-.225.5-.5.5H43a.501.501 0 0 1-.5-.5v-9c0-.275.225-.5.5-.5h14c.275 0 .5.225.5.5v9z"/>
                </g>
              </svg>
              <p class="box-content-header">Win XP OS</p>
              <p class="box-content-subheader">List of CPU (Win Xp)</p>
            </div>
              <center>
                @foreach($winXP as $winXPPC)
                <div class="days-left">
                  {{$winXPPC->WinXPOS}}
                </div>
                @endforeach
              </center>
          </div>
        </div>

      </div>
    </div>

    

  </div>

</section>
<script>
function search_notification() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('name');
    let y = document.getElementsByClassName('messages');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            y[i].style.display="none";
        }
        else {
            y[i].style.display="block";                 
        }
    }
}
</script>
<script src="{{ asset('js/management_board.js') }}"></script>
