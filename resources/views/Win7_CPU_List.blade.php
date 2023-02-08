<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>
@if(Auth::user()->position == 'admin')
    @include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif
 

<div class="container">
    <header>List Of Windows 7 OS</header>
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Device Name</th>
                            <th>Processor</th>
                            <th>Operating System</th>
                            <th>Windows Key</th>
                            <th>IP Address</th>
                            <th>Subnet</th>
                            <th>Gateway</th>
                            <th>CPU Speed</th>
                            <th>Hard Disk</th>
                            <th>RAM</th>
                            
                        </thead>
                        <tbody>
						
                            @foreach($windows_detail as $window_detail) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$window_detail->DeviceName}}</td>
								<td>{{$window_detail->Processor}}</td>
                                <td>{{$window_detail->OS}}</td>
                                <td>{{$window_detail->WinKey}}</td>
								<td>{{$window_detail->IPAdd}}</td>
                                <td>{{$window_detail->Subnet}}</td>
                                <td>{{$window_detail->Gateway}}</td>
								<td>{{$window_detail->CPUSpeed}}</td>
                                <td>{{$window_detail->HardDisk}}</td>
                                <td>{{$window_detail->RAM}}</td>
                                
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $windows_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>