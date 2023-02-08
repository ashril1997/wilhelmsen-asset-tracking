<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>

@include('layouts.app')  

<div class="container">
    <header>Manage State</header>
    <div class="exportandadd">
        <form class="reportform" action="{{ url('add_state')}}" method="post">
            {{ csrf_field() }}
            <div class="first division">
                <div class="fields">
                    <div class="input-section">
                        <input type="text" name="StateName" placeholder="State Name" required>
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
                <span data-href="/exportstate" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span>
            </button>
            </center>
        </div>
    </div>
                
        <div class="reportlist">
                    <table  class="content-table" id="myTable" width="100%" cellspacing="0">
                        <thead>
							<!--Show label to the interface and the arrangement button-->
                            <th>Id&nbsp;</th>
                            <th>Name&nbsp;</th>
                            <th>Date Created&nbsp;</th>
                            <th>Action&nbsp;</th>
                            
                        </thead>
                        <tbody>
						
                            @foreach($states_detail as $state_detail) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$state_detail->State_Id}}</td>
								<td>{{$state_detail->State}}</td>
                                <td>{{$state_detail->CreationDate}}</td>
                                <td>
                                    
                                    <a  id="delete_btn" href="#" class="PromoteBtn delete" data-name="{{$state_detail->State}}" data-id="{{$state_detail->State_Id}}">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </a>
                                </td>
                                
								{{-- href="makesystemadmin/{{$users_details->email}}" --}}
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $states_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
                 

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
<script>

$('.delete').click( function(){
    var name = $(this).attr('data-name');
    var state_id = $(this).attr('data-id');
    var _url = "statedelete/"+state_id;

    //check if the data is pending deliery and delivered state

    if(state_id == '1'){
        swal({
        title: "Important Data!",
        text: name+" cannot be deleted",
        icon: "warning",
        dangerMode: true,
    });
    }
    else if(state_id == '2'){
        swal({
        title: "Important Data!",
        text: name+" cannot be deleted",
        icon: "warning",
        dangerMode: true,
    });
    }
    else{
        swal({
            title: "Are you sure?",
            text: "This will also delete all the assets related to "+name+" state?",
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

    }
    
});

</script>

{{-- Export Function Js --}}
<script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script>