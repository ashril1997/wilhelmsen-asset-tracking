<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>
@if(Auth::user()->position == 'admin')
    @include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif

<div class="container">
    <header>DE81 List</header>
    <form class="reportform" action="{{ url('de81exportCsv')}}" method="post">
        {{ csrf_field() }}
        <div class="first division">
            <div class="fields">

                <div class="input-section">
                    <label>Vessel Name</label>
                    <select name="VesselName">
                        @if ($selectedVessel == NULL)
                            <option value=''>Select Vessel</option>
                        @else
                            <option>{{$selectedVessel}}</option>
                        @endif
                        @foreach($vesseldd as $vessel)
                        <option>{{$vessel->VesselName}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="input-section">
                    <center style="padding-bottom: 5px;">
                        <input  type="submit" value="Search" name="submit" class="btnText"/>
                        <input  type="submit" value="Export" name="submit" class="btnText"/>
                    </center>
                </div>
            </div>
        </div>
    </form>
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Device Name</th>
                            <th>Item Description</th>
                            <th>Maker</th>
                            <th>Model</th>
                            <th>Installation Location</th>
                            <th>Connectivity</th>
                            <th>System Provider</th>
                            <th>Delivery ETA</th>
                            <th>Operating System</th>
                            <th>IP Address</th>
                            <th>Subnet</th>
                            <th>Gateway</th>
                            <th>RAM</th>
                            
                        </thead>
                        <tbody>
						
                            @foreach($windows_detail as $window_detail) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$window_detail->DeviceName}}</td>
								<td>{{$window_detail->VesselDesc}}</td>
                                <td>{{$window_detail->Maker}}</td>
                                <td>{{$window_detail->Model}}</td>
                                <td>{{$window_detail->Location}}</td>
                                <td>{{$window_detail->Connectivity}}</td>
                                <td>{{$window_detail->SystemProvider}}</td>
                                <td>{{$window_detail->DelETA}}</td>
                                <td>{{$window_detail->OS}}</td>
								<td>{{$window_detail->IPAdd}}</td>
                                <td>{{$window_detail->Subnet}}</td>
                                <td>{{$window_detail->Gateway}}</td>
                                <td>{{$window_detail->RAM}}</td>
                                
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $windows_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
    {{-- Export Function Js --}}
<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>