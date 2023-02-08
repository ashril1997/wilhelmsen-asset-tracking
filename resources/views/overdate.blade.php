<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>

@if(Auth::user()->position == 'admin')
@include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif 
<div class="container">
    <header>Asset That Is Overdate</header>

        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Serial Number&nbsp;</th>
                            <th>Vessel&nbsp;</th>
                            <th>Description&nbsp;</th>
                            <th>Category&nbsp;</th>
                            <th>Purchase Date&nbsp;</th>
                            <th>ETA Date&nbsp;</th>
                            <th>State&nbsp;</th>
                        </thead>
                        <tbody>
						
                            @foreach($reporting as $reporting_info ) 
                            <tr>
                                <!--Call data to the interface-->
                                <td>{{$reporting_info->SerialNumber}}</td>
                                <td>{{$reporting_info->VesselName}}</td>
                                <td>{{$reporting_info->VesselDesc}}</td>
                                <td>{{$reporting_info->Category}}</td>
                                <td>{{$reporting_info->year}}-{{$reporting_info->month}}-{{$reporting_info->day}}</td>
                                <td>{{$reporting_info->DelETA}}</td>
                                <td>{{$reporting_info->State}}</td>
                                
								
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    <div class="input-totalasset">
                        <label>Total of Asset</label>
                        <input type="text" name="VesselName" class="form-control" disabled value="{{$total_delivered_asset}}"><br>
                    </div>
                    {{ $reporting->appends(request()->except('page'))->links() }}
        </div>
</div>