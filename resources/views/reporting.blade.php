<!--Menu bar code start here-->
	<link rel="stylesheet" href="{{asset('css/reporting.css')}}"/>
@if(Auth::user()->position == 'admin')
@include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif

<div class="container">
    <header>Advanced Search</header>
                <form class="reportform" action="{{ url('advanceReportSearching')}}" method="post">
                    {{ csrf_field() }}
                    <div class="first division">
                        <div class="fields">
                            <div class="input-section">
                                <label>Vendor Name</label>
                                <select name="VendorName">
                                    @if ($selectedVendor == NULL)
                                        <option value=''>Select Vendor</option>
                                    @else
                                        <option>{{$selectedVendor}}</option>
                                    @endif
                                    @foreach($vendordd as $vendor)
                                    <option>{{$vendor->VendorName}}</option>
                                    @endforeach
                                </select><br>
                            </div>
            
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
                                <label>State</label>
                                <select name="get_state">
                                    @if ($selectedState == NULL)
                                        <option value=''>Select State</option>
                                    @else
                                        <option>{{$selectedState}}</option>
                                    @endif
                                    @foreach($statedd as $state)
                                    <option>{{$state->State}}</option>
                                    @endforeach
                                </select><br>
                            </div>

                            <div class="input-section">
                                <label>Year</label>
                                <select name="get_year" class="get_year" id="get_year">
                                    @if ($selectedYear == NULL)
                                        <option value=''>Select Year</option>
                                    @else
                                        <option>{{$selectedYear}}</option>
                                    @endif
                                    
                                </select><br>
                            </div>
                            <div class="input-section">
                                <label>Month</label>
                                        <select name="get_month" class="get_month">
                                            @if ($selectedMonth == NULL)
                                                <option value=''>Select Month</option>
                                            @else
                                                <option>{{$selectedMonth}}</option>
                                            @endif
                                            <option value='1'>January</option>
                                            <option value='2'>February</option>
                                            <option value='3'>March</option>
                                            <option value='4'>April</option>
                                            <option value='5'>May</option>
                                            <option value='6'>June</option>
                                            <option value='7'>July</option>
                                            <option value='8'>August</option>
                                            <option value='9'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select><br>
                            </div>
                            <div class="input-section">
                                <center>
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
                            <th>Purchase Date&nbsp;</th>
                            <th>Serial Number&nbsp;</th>
                            <th>Vendor Name&nbsp;</th>
                            <th>Vessel Name&nbsp;</th>
                            <th>Vessel Description&nbsp;</th>
                            <th>State&nbsp;</th>
							<th>Delivery Detail&nbsp;</th>
                            <th>Delivery Date&nbsp;</th>
                        </thead>
                        <tbody>
						
                            @foreach($reporting as $reporting_info ) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$reporting_info->year}}-{{$reporting_info->month}}-{{$reporting_info->day}}</td>
								<td>{{$reporting_info->SerialNumber}}</td>
                                <td>{{$reporting_info->VendorName}}</td>
                                <td>{{$reporting_info->VesselName}}</td>
                                <td>{{$reporting_info->VesselDesc}}</td>
                                <td>{{$reporting_info->State}}</td>
                                <td>{{$reporting_info->DeliveryDetail}}</td>
								<td>{{$reporting_info->DeliveryDate}}</td> 
                                
								
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
                    
                    

	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
