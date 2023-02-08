<!--Menu bar code start here-->
<link rel="stylesheet" href="{{asset('css/manage_vendor.css')}}"/>

@include('layouts.app')  

<div class="container">
    <header>Manage Category</header>
    <div class="exportandadd">
        <form class="reportform" action="{{ url('add_category')}}" method="post">
            {{ csrf_field() }}
            <div class="first division">
                <div class="fields">
                    <div class="input-section">
                        <input type="text" name="CategoryName" placeholder="Category Name" required>
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
                <span data-href="/exportcategory" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export</span>
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
						
                            @foreach($categorys_detail as $category_detail) 
                            <tr>
                                <!--Call data to the interface-->
                                
                                <td>{{$category_detail->Category_Id}}</td>
								<td>{{$category_detail->Category}}</td>
                                <td>{{$category_detail->CreationDate}}</td>
                                <td>
                                    
                                    <a  href="#" class="PromoteBtn delete" data-name="{{$category_detail->Category}}" data-id="{{$category_detail->Category_Id}}">
                                        <i class='bx bxs-trash-alt' ></i>
                                    </a>
                                </td>
                                
								{{-- href="makesystemadmin/{{$users_details->email}}" --}}
                            </tr>
                            @endforeach
                            
							
                        </tbody>
                    </table>
                    {{ $categorys_detail->appends(request()->except('page'))->links() }}
        </div>
</div>
                 

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--js script link for the interface-->
    <script src="{{ asset('js/reporting.js') }}"></script>
	
<script>

$('.delete').click( function(){
    var name = $(this).attr('data-name');
    var category_id = $(this).attr('data-id');
    var _url = "categorydelete/"+category_id;
    //check if the data is pending deliery and delivered state

    if(category_id == '1'){
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
        text: "This will also delete all the assets related to "+name+" category?",
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