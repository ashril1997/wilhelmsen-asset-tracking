<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_account.css')}}"/>

@include('layouts.app')  

<div class="container">
    <header>Manage Account</header>
                
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Name&nbsp;<a ng-click="sort_with('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Email&nbsp;<a ng-click="sort_with('name');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Date Created&nbsp;<a ng-click="sort_with('matrix_no');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Position&nbsp;<a ng-click="sort_with('matrix_no');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            <th>Action&nbsp;<a ng-click="sort_with('matrix_no');"><i class="glyphicon glyphicon-sort"></i></a></th>
                            
                        </thead>
                        <tbody>
						
                            @foreach($users_detail as $users_details) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$users_details->name}}</td>
								<td>{{$users_details->email}}</td>
                                <td>{{$users_details->created_at}}</td>
                                <td>{{$users_details->position}}</td>
                                <td>
                                    <a  href="#" class="PromoteBtn promoteadmin" data-name="{{$users_details->name}}" data-email="{{$users_details->email}}">
                                        Make Admin
                                    </a>&nbsp;
                                    <a  href="#" class="DeleteBtn delete" data-name="{{$users_details->name}}" data-email="{{$users_details->email}}">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </a>
                                </td>
                                
								{{-- href="makesystemadmin/{{$users_details->email}}" --}}
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $users_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
                 

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
<script>

$('.promoteadmin').click( function(){
    var name = $(this).attr('data-name');
    var email = $(this).attr('data-email');
    var _url = "makesystemadmin/"+email;
    swal({
        title: "Are you sure?",
        text: "Do you want to promote "+name+" as the system admin?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location.href = _url,
            swal("New System Admin Successfully Added!", {
            icon: "success",
            });
        } else {
            swal(name+" will remain as it is.");
        }
    });
});

$('.delete').click( function(){
    var name = $(this).attr('data-name');
    var email = $(this).attr('data-email');
    var _url = "systemadmindelete/"+email;
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

</script>