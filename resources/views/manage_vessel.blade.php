<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>

@include('layouts.app')  

<div class="container">
    <header>Manage Vessel</header>
    <div class="exportandadd">
        <form class="reportform" action="{{ url('add_vessel')}}" method="post">
            {{ csrf_field() }}
            <div class="first division">
                <div class="fields">
                    <div class="input-section">
                        <input type="text" name="VesselName" placeholder="Vessel Name" required>
                    </div>
                    <div class="input-section">
                        <center>
                        <button class="submitBtn">
                            <span type="submit" class="btnText">Add</span>
                        </button>
                        </center>
                    </div>
                </div>
            </div>
        </form>

        <div class="input-section">
            <center>
            <button class="exportBtn">
                <span data-href="/exportvessel" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span>
            </button>
            </center>
        </div>
    </div>
        

                
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Id&nbsp;<a ng-click="sort_with('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Name&nbsp;<a ng-click="sort_with('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Date Created&nbsp;<a ng-click="sort_with('matrix_no');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Action&nbsp;<a ng-click="sort_with('matrix_no');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            
                        </thead>
                        <tbody>
						
                            @foreach($vessels_detail as $vessel_detail) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$vessel_detail->Vessel_Id}}</td>
								<td>{{$vessel_detail->VesselName}}</td>
                                <td>{{$vessel_detail->CreationDate}}</td>
                                <td>
                                    
                                    <a  href="#" class="PromoteBtn delete" data-name="{{$vessel_detail->VesselName}}" data-id="{{$vessel_detail->Vessel_Id}}">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </a>
                                </td>
                                
								{{-- href="makesystemadmin/{{$users_details->email}}" --}}
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $vessels_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
                 

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
<script>
$('.delete').click( function(){
    var name = $(this).attr('data-name');
    var vessel_id = $(this).attr('data-id');
    var _url = "vesseldelete/"+vessel_id;
    swal({
        title: "Are you sure?",
        text: "This will also delete all the assets related to "+name+" vessel?",
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

</script>

{{-- Export Function Js --}}
<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>