@include('layouts.app')  
  <div class="app-content">          
    <div class="projects-section">
      <div class="projects-section-header">
        <p>Dashboard</p>
      </div>   
      <div class="project-boxes jsGridView">

        {{-- Dashboard UI for Pending Delivery --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_pending_asset_list')}}';">
          <div class="project-box" style="background-color: #fee4cb;">

            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                  <style>
                        .fd-1{
                          fill:#a07765 !important
                        }
                        .fd-3{
                          fill:#be927c !important
                        }
                        .fd-4{
                          fill:#ffdec7 !important
                        }
                        .fd-5{
                          fill:#dad7e5 !important
                        }
                        .fd-6{
                          fill:#f6ccaf !important
                        }
                  </style>
                </defs>
                <g id="Fast_Delivery" data-name="Fast Delivery">
                      <path class="fd-1" d="m37 14-4 26H7l4-26h26z"/>
                      <path d="m37 14-4 26H16.23a6.2 6.2 0 0 1-6.13-7.15L13 14z" style="fill:#a87e6b"/>
                      <path class="fd-3" d="m47 8-4 26-10 6 4-26 10-6z"/>
                      <path class="fd-3" d="m47 8-10 6H27l10-6h10z"/>
                      <path class="fd-4" d="m37 8-10 6h-6l10-6h6z"/>
                      <path class="fd-3" d="m31 8-10 6H11l10-6h10z"/>
                      <path class="fd-5" d="M19 10H7a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2zM7 14H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM14 20H4a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2zM5 24H3a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM15 29H2a1 1 0 0 1 0-2h13a1 1 0 0 1 0 2zM10 36H4a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM13 45H2a1 1 0 0 1 0-2h11a1 1 0 0 1 0 2zM28 5h-4a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2zM20 5h-6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM19 45h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2z"/>
                      <path class="fd-6" d="m21 14-.77 5h6l.77-5h-6z"/>
                      <path class="fd-1" d="M20.23 19c.73-4.72.57-3.69.77-5h-1c-.9 5.82-.71 4.67-1 6h6.19l.15-1z"/>
                      <path class="fd-4" d="M21 14a4.34 4.34 0 0 0 4.29 5h.94l.77-5z"/>
                      <path class="fd-6" d="M23.77 35c-.73 4.72-.57 3.69-.77 5h-6l.77-5z"/>
                      <path class="fd-1" d="M16.77 35 16 40h1l.77-5h-1z"/>
                      <path class="fd-4" d="M23.77 35c-.73 4.72-.57 3.69-.77 5h-.94a4.34 4.34 0 0 1-4.29-5z"/>
                </g>
              </svg>
              <p class="box-content-header">Pending Delivery</p>
              <p class="box-content-subheader">Assets still in transit</p>
            </div>
            <center>
            @foreach($pending as $pending_delivery)
            <div class="days-left">
              {{$pending_delivery->TotalPending}}
            </div>
            @endforeach
            </center>
          </div>
        </div>

        {{-- Dashboard UI for Checkout --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_delivered_asset_list')}}';">
          <div class="project-box" style="background-color: #e9e7fd;">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                  <style>
                        .cls-3{
                          fill:#f6ccaf !important
                        }
                        .cls-4{
                          fill:#edb996 !important
                        }
                      </style>
                    </defs>
                    <g id="Shipping_product" data-name="Shipping product">
                      <rect x="1" y="27" width="8" height="20" rx="2" style="fill:#6fabe6"/>
                      <path d="M9 29c0 16.82-.1 16 0 16a5 5 0 0 1-5-5V27h3a2 2 0 0 1 2 2z" style="fill:#82bcf4"/>
                      <path class="cls-3" d="M17 1h18a2 2 0 0 1 2 2v18a2 2 0 0 1-2 2H17V1z"/>
                      <path class="cls-4" d="M13 1h4v22h-4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                      <path style="fill:#edebf2" d="M24 1h6v6h-6z"/>
                      <path d="M23 20h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2z" style="fill:#7c7d7d"/>
                      <path class="cls-4" d="M47 26 36.38 41.52a8 8 0 0 1-6.6 3.48H13.83A6.84 6.84 0 0 1 9 43c0-12.22-.06-10.94.14-11.14a9.77 9.77 0 0 1 12.32-1.22c.72.48-.27.36 5.54.36a4 4 0 0 1 4 4v2c1.39-1.61-.34.4 9.56-11.15a4 4 0 0 1 5.44-.6z"/>
                      <path class="cls-3" d="m45.63 25-9.25 13.52a8 8 0 0 1-6.6 3.48H13.83A6.84 6.84 0 0 1 9 40c0-8.89-.06-7.94.14-8.14a9.77 9.77 0 0 1 12.32-1.22c.72.48-.27.36 5.54.36a4 4 0 0 1 4 4v2c1.39-1.61-.34.4 9.56-11.15a4 4 0 0 1 5.07-.85z"/>
                      <path class="cls-4" d="M31 35v2H20a1 1 0 0 1 0-2z"/>
                    </g>
              </svg>
              <p class="box-content-header">Checkout</p>
              <p class="box-content-subheader">Asset successfully delivered</p>
            </div>
            <center>
              @foreach($checkout as $delivered_checkout)
              <div class="days-left">
                {{$delivered_checkout->TotalCheckout}}
              </div>
               @endforeach
            </center>
          </div>
        </div>
        
        {{-- Dashboard UI for OverDate --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('overdate')}}';">
          <div class="project-box" style="background-color: #d5deff;">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <defs>
                  <style>.od-1{fill:#a87e6b}.od-2{fill:#f6ccaf}.od-3{fill:#be927c}.od-4{fill:#ffdec7}.od-10{fill:#374f68}</style>
                </defs>
                <g id="Warning_Sign_in_Box" data-name="Warning Sign in Box">
                  <path class="od-1" d="M28 19.8 21 24 1 12c2.78-1.52.42-.22 8-4.38z"/>
                  <path class="od-2" d="m34 16.2-6 3.6L9 7.62l6.28-3.46z"/>
                  <path class="od-1" d="M41 12c-4.22 2.54 5.31-3.21-7 4.2l-18.75-12L21 1z"/>
                  <path class="od-3" d="m28 19.8-5 3-12.3-7.38a3.82 3.82 0 0 1 .12-6.62z"/>
                  <path class="od-4" d="m34 16.2-6 3.6-17.18-11c5.53-3 1-.59 6.28-3.45z"/>
                  <path class="od-3" d="m41 12-7 4.2L17.1 5.35 23 2.1c18.7 10.28 15.62 8.58 18 9.9z"/>
                  <path class="od-1" d="M41 12c0 25.55.22 22.87-.5 23.3-2.08-3.76-1.38-2.46-3.5-6.3l-7 12.6-9 5.4V24z"/>
                  <path class="od-1" d="M41 12v21l-1.33.8c-2.08-3.72-1.49-2.66-2.67-4.8-5.29 9.53-5.33 9.5-5.33 9.6s.87-.53-8.67 5.2v-21z"/>
                  <path class="od-3" d="M41 12v21l-1.33.8c-2.08-3.72-1.49-2.66-2.67-4.8-5.29 9.53-5.33 9.5-5.33 9.6S29.1 40.15 29 40.2a4 4 0 0 1-6-3.46V22.8z"/>
                  <path class="od-2" d="M34 16.2V23l-6 3v-6.2z"/>
                  <path class="od-4" d="M34 16.2V22l-1.35.67A3.21 3.21 0 0 1 28 19.8z"/>
                  <path class="od-2" d="M34 33c0 1.87.39.7-2.33 5.59-.1.1.31-.57-1.67 3l-2 1.2V37z"/>
                  <path class="od-1" d="M28 37.33v5.47l-1 .6V38l1-.67z"/>
                  <path class="od-4" d="M34 33c0 1.87.39.7-2.33 5.59a2.52 2.52 0 0 1-1.75.55A2.14 2.14 0 0 1 28 37z"/>
                  <path style="fill:#a07765" d="M21 24v23L1 35V12l20 12z"/>
                  <path style="fill:#c6c3d8" d="M11 30v6l6 4v-6l-6-4z"/>
                  <path class="od-1" d="M10.82 8.8a3.5 3.5 0 0 0-.73.53C11 9.94 8.37 8.2 27 20.4V26l1-.5v-5.7z"/>
                  <path d="M47 47H27l10-18c1.07 1.93 6.12 11 10 18z" style="fill:#fc6"/>
                  <path d="m30 41.6-2 1.2c-.24.14-.5.7 1.92-3.66 1.81.21 2.81-2.45.08 2.46z" style="fill:#edb996"/>
                  <path class="od-1" d="M34 34.4V33l-1.06.71L35 30l.72 1.3L34 34.4z"/>
                  <path class="od-2" d="M34 33c0 1.87.39.7-2.33 5.59a2.52 2.52 0 0 1-1.75.55c3.57-6.41 2.74-5.25 4.08-6.14z"/>
                  <path d="M45.89 45h-9.71A3.64 3.64 0 0 1 33 39.6l4.94-8.9z" style="fill:#ffde76"/>
                  <path class="od-10" d="M36 40v-4a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0zM38 43a1 1 0 0 0-2 0 1 1 0 0 0 2 0z"/>
                </g>
              </svg>
              <p class="box-content-header">Overdue Asset</p>
              <p class="box-content-subheader">Pending asset not checkout</p>
            </div>
            <center>
            @foreach($over_date as $over_date_asset)
            <div class="days-left">
              {{$over_date_asset->TotalOverDate}}
            </div>
            @endforeach
            </center>
          </div>
        </div>

        {{-- Dashboard UI for Vessel --}}
        <div class="project-box-wrapper" onclick="location.href='{{ url('get_vessel_detail')}}';">
          <div class="project-box" style="background-color: #ffd3e2;">
            <div class="project-box-header">
              <div class="more-wrapper">
              </div>
            </div>
            <div class="project-box-content-header">
              <svg width="128px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="">
              <defs>
                      <style>
                        .ship-1{
                          fill:#747575 
                        }
                        .ship-2{
                          fill:#db5669
                        }
                        .ship-3{
                          fill:#f26674
                        }
                        .ship-4{
                          fill:#374f68
                        }
                        .ship-5{
                          fill:#425b72
                        }
                        .ship-6{
                          fill:#dad7e5
                        }
                        .cls-8{
                          fill:#7c7d7d
                        }
                        .cls-9{
                          fill:#919191
                        }
                        .cls-10{
                          fill:#6fabe6
                        }
                        .cls-11{
                          fill:#82bcf4
                        }
                        .cls-12{
                          fill:#9dcc6b
                        }
                        .cls-13{
                          fill:#b5e08c
                        }
                      </style>
                    </defs>
                    <g id="Shipping">
                      <path class="ship-1" d="M39 21v1h-2v-1a1 1 0 0 1 2 0zM43 21v1h-2v-1a1 1 0 0 1 2 0zM47 21v1h-2v-1a1 1 0 0 1 2 0z"/>
                      <path class="ship-2" d="M42.57 36c-.51 3.54-.38 2.67-.57 4H3l-.57-4z"/>
                      <path class="ship-3" d="m42.57 36-.43 3H9a3.5 3.5 0 0 1-3.46-3z"/>
                      <path class="ship-4" d="M47 22c0 2.91.25 5.69-2.25 8.81a10.27 10.27 0 0 0-2.15 5c-.05.36 3.11.23-40.17.23L1 26h30l4-4z"/>
                      <path class="ship-5" d="M47 22c0 2.91.25 5.69-2.25 8.81A10.1 10.1 0 0 0 43 34H13.12a9.68 9.68 0 0 1-9.53-8H31l4-4z"/>
                      <path class="ship-6" d="M8 14h8v12H8z"/><path d="M16 14c0 10.61-.1 10 0 10a6 6 0 0 1-6-6v-4z" style="fill:#edebf2"/>
                      <path class="cls-8" d="M10 8h4v6h-4z"/><path class="cls-9" d="M14 11v2h-1a2 2 0 0 1-2-2z"/>
                      <path class="ship-1" d="M13 18a1 1 0 0 0-2 0 1 1 0 0 0 2 0zM13 22a1 1 0 0 0-2 0 1 1 0 0 0 2 0z"/>
                      <path class="ship-6" d="M14 31a1 1 0 0 0-2 0 1 1 0 0 0 2 0zM10 31a1 1 0 0 0-2 0 1 1 0 0 0 2 0z"/>
                      <path class="cls-10" d="M16 22h6v4h-6z"/><path class="cls-11" d="M22 22v3h-3a2 2 0 0 1-2-2v-1z"/>
                      <path class="ship-4" d="M16 18h6v4h-6z"/><path class="cls-5" d="M22 18v3h-3a2 2 0 0 1-2-2v-1z"/>
                      <path class="cls-12" d="M16 14h6v4h-6z"/><path class="cls-13" d="M22 14v3h-3a2 2 0 0 1-2-2v-1z"/>
                      <path style="fill:#fc6" d="M22 18h6v4h-6z"/><path d="M28 18v3h-3a2 2 0 0 1-2-2v-1z" style="fill:#ffde76"/>
                      <path class="ship-2" d="M2 22h6v4H2z"/><path class="cls-3" d="M7 22v3H6a3 3 0 0 1-3-3z"/>
                      <path class="cls-10" d="M2 18h6v4H2z"/><path class="cls-11" d="M7 18v3H5a2 2 0 0 1-2-2v-1z"/>
                      <path class="cls-12" d="M22 22h6v4h-6z"/><path class="cls-13" d="M28 22v3h-3a2 2 0 0 1-2-2v-1z"/>
                      <path class="cls-8" d="M14 10h-4a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2z"/>
                      <path class="cls-9" d="M15 9h-4a1 1 0 0 1-1-1h4a1 1 0 0 1 1 1z"/>
                    </g>
                  </svg>
                  <p class="box-content-header">Vessel</p>
                  <p class="box-content-subheader">List of Vessel</p>
                </div>
                <center>
                  @foreach($totalvessel as $totalvessel)
                  <div class="days-left">
                    {{$totalvessel->TotalVessel}}
                  </div>
                  @endforeach
                </center>
                
            </div>
        </div>
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

    <div class="messages-section">
      <button class="messages-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
          <circle cx="12" cy="12" r="10" />
          <line x1="15" y1="9" x2="9" y2="15" />
          <line x1="9" y1="9" x2="15" y2="15" /></svg>
      </button>
      <div class="projects-section-header">
        <p>Notifications</p>
        <div class="input-section">
          <input id="searchbar" onkeyup="search_notification()" type="text" name="search" placeholder="Search By Vessel">
        </div>
      </div>
      @foreach($notification as $notification)
      <div class="messages">
        <div class="message-box">
          <svg width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <defs>
              <style>
                .pd-1{
                  fill:#a07765 !important
                }
                .pd-3{
                  fill:#be927c !important
                }
                .pd-4{
                  fill:#ffdec7 !important
                }
                .pd-5{
                  fill:#dad7e5 !important
                }
                .pd-6{
                  fill:#f6ccaf !important
                }
              </style>
            </defs>
            <g id="Fast_Delivery" data-name="Fast Delivery">
              <path class="pd-1" d="m37 14-4 26H7l4-26h26z"/>
              <path d="m37 14-4 26H16.23a6.2 6.2 0 0 1-6.13-7.15L13 14z" style="fill:#a87e6b"/>
              <path class="pd-3" d="m47 8-4 26-10 6 4-26 10-6z"/>
              <path class="pd-3" d="m47 8-10 6H27l10-6h10z"/>
              <path class="pd-4" d="m37 8-10 6h-6l10-6h6z"/>
              <path class="pd-3" d="m31 8-10 6H11l10-6h10z"/>
              <path class="pd-5" d="M19 10H7a1 1 0 0 1 0-2h12a1 1 0 0 1 0 2zM7 14H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM14 20H4a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2zM5 24H3a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zM15 29H2a1 1 0 0 1 0-2h13a1 1 0 0 1 0 2zM10 36H4a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM13 45H2a1 1 0 0 1 0-2h11a1 1 0 0 1 0 2zM28 5h-4a1 1 0 0 1 0-2h4a1 1 0 0 1 0 2zM20 5h-6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM19 45h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2z"/>
              <path class="pd-6" d="m21 14-.77 5h6l.77-5h-6z"/>
              <path class="pd-1" d="M20.23 19c.73-4.72.57-3.69.77-5h-1c-.9 5.82-.71 4.67-1 6h6.19l.15-1z"/>
              <path class="pd-4" d="M21 14a4.34 4.34 0 0 0 4.29 5h.94l.77-5z"/>
              <path class="pd-6" d="M23.77 35c-.73 4.72-.57 3.69-.77 5h-6l.77-5z"/>
              <path class="pd-1" d="M16.77 35 16 40h1l.77-5h-1z"/>
              <path class="pd-4" d="M23.77 35c-.73 4.72-.57 3.69-.77 5h-.94a4.34 4.34 0 0 1-4.29-5z"/>
            </g>
          </svg>
          <div class="message-content">
  
            <div class="message-header">
              <div class="name">{{$notification->VesselName}}</div>
              {{-- <div class="star-checkbox">
                <input type="checkbox" id="star-1">
                <label for="star-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>
                </label>
              </div> --}}
            </div>
            <p class="message-line">
              <strong>{{$notification->SerialNumber}}</strong> <br/>
              {{$notification->VesselDesc}}
            </p>
            <p class="message-line time">
              ETA : {{$notification->DelETA}}
            </p>
          </div>
        </div>
      </div>
      @endforeach
      <div class="messages">
        <div class="message-box">
          <div class="message-content">
            <center>
            <p class="message-line">
              <strong></strong> <br/>
              No more pending item to be delivered in 10 days
            </p>
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
