<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/asset_list.css')}}"/>
@if(Auth::user()->position == 'admin')
    @include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif 

<div class="container">
    <header>Asset List</header>
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Serial Number&nbsp;</th>
                            <th>Purchase Date&nbsp;</th>
                            <th>Vendor&nbsp;</th>
                            <th>Vessel&nbsp;</th>
                            <th>Description&nbsp;</th>
                            <th>State&nbsp;</th>
                            <th>Category&nbsp;</th>
							<th>Delivery Detail&nbsp;</th>
                            <th>Action&nbsp;</th>

                        </thead>
                        <tbody>
						
                            @foreach($reporting as $reporting_info ) 
                            <tr>
                                <!--Call data to the interface-->
                                <td>{{$reporting_info->SerialNumber}}</td>
                                <td>{{$reporting_info->year}}-{{$reporting_info->month}}-{{$reporting_info->day}}</td>
                                <td>{{$reporting_info->VendorName}}</td>
                                <td>{{$reporting_info->VesselName}}</td>
                                <td>{{$reporting_info->VesselDesc}}</td>
                                <td>{{$reporting_info->State}}</td>
                                <td>{{$reporting_info->Category}}</td>
                                <td>{{$reporting_info->DeliveryDetail}}</td>
                                <td>
                                    {{-- copy button --}}
                                    <a  href="#" class="Btncopy copy" data-name="{{$reporting_info->SerialNumber}}" data-id="{{$reporting_info->SerialNumber}}">
                                        <i class='bx bxs-copy'></i>
                                    </a>
                                    {{-- update button --}}
                                    <a  href="#" class="Btnupdate update" data-name="{{$reporting_info->SerialNumber}}" data-id="{{$reporting_info->SerialNumber}}">
                                        <i class='bx bxs-message-square-edit'></i>
                                    </a>
                                    {{-- delete button --}}
                                    <a  href="#" class="Btndelete delete" data-name="{{$reporting_info->SerialNumber}}" data-id="{{$reporting_info->SerialNumber}}">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </a>
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
                    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
<script>
    //if button delete is clicked
    $('.delete').click( function(){
        var name = $(this).attr('data-name');
        var asset_id = $(this).attr('data-id');
        var _url = "assetdelete/"+asset_id;
        swal({
            title: "Are you sure?",
            text: "Do you want to delete "+name+" from this system?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = _url,
                swal(name+" data has been deleted!", {
                icon: "success",
                });
            } else {
                swal(name+" will remain as it is.");
            }
        });
    });

    //if button update is clicked
    $('.update').click( function(){
        var name = $(this).attr('data-name');
        var asset_id = $(this).attr('data-id');
        var _url = "get_edit_info/"+asset_id;
        swal({
            title: "Are you sure?",
            text: "Do you want to update "+name+" information?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = _url;
            } else {
                swal(name+" information will remain as it is.");
            }
        });
    });

    //if button update is clicked
    $('.copy').click( function(){
        var name = $(this).attr('data-name');
        var asset_id = $(this).attr('data-id');
        var _url = "get_copy_info/"+asset_id;
        swal({
            title: "Are you sure?",
            text: "Do you want to copy "+name+" detail?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = _url;
            } else {
                swal(name+" information will remain as it is.");
            }
        });
    });

</script>
	
