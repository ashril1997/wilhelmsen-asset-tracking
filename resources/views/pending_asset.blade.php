<!--Menu bar code start here-->
	<link rel="stylesheet" href="{{asset('css/pending_deliver_asset.css')}}"/>
    

    @if(Auth::user()->position == 'admin')
    @include('layouts.app') 
    @endif
    @if(Auth::user()->position == 'staff')
        @include('layouts.staff_app') 
    @endif 

<div class="container">
    <header>Pending Item</header>
                <form class="reportform" action="{{ url('pending_asset_Searching')}}" method="post">
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
                                </center>
                            </div>

                            

            
                        </div>
                        
                    </div>
                </form>
           

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
                            <th>Action&nbsp;</th>
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
                                <td>
                                    <a  href="#" class="PromoteBtn checkout" data-name="{{$reporting_info->SerialNumber}}" data-serial_number="{{$reporting_info->SerialNumber}}">
                                        Checkout
                                    </a>&nbsp;
                                </td> 
                                
								
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        $('.checkout').click( function(){
            var name = $(this).attr('data-name');
            var serial_number = $(this).attr('data-serial_number');
            var _url = "deliver_asset/"+serial_number;
            swal({
                title: "Are you sure?",
                text: "Do you want to checkout this asset ("+name+") ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = _url,
                    swal("Asset have been checkout!", {
                    icon: "success",
                    });
                } else {
                    swal(name+" will remain as it is.");
                }
            });
        });
        
    </script>
	
