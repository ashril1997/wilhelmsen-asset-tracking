@if(Auth::user()->position == 'admin')
    @include('layouts.app') 
@endif
@if(Auth::user()->position == 'staff')
    @include('layouts.staff_app') 
@endif
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com ===//https://www.youtube.com/watch?v=wL9YzgA13c4 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link href="{{asset('css/add_asset.css')}}" rel="stylesheet" type="text/css" >
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



    <title>Manage Asset </title> 
</head>

<body>
    

    
    <div class="container">
        <header>Manage Asset</header>
       
       
           <form action="{{ url('add')}}" method="POST">
               @csrf
       
               <div class="first division">
                   <div class="details personal">
                       <span class="title1">Asset Info</span>
                   </div>
       
                   <div class="fields">
       
                       <div class="input-field">
                           <label>Serial Number <span style="color:#FF0000">*</span></label>
                           <input required type="text" placeholder="Serial Number" name="SerialNumber" class="form-control" >
                       </div>
       
                       <div class="input-field">
                           <label>Purchased Date <span style="color:#FF0000">*</span></label>
                           <input required type="date" placeholder="purchased date" name="PurchaseDate" class="form-control">
                       </div>
       
                       <div class="input-field">
                           <label>Description</label>
                           <input type="text" placeholder="Description" name="VesselDesc" class="form-control"  >
                       </div>
       
                   </div>
               </div>
       
               
               <div class="second division">
                   <div class="details two">
                       <span class="title2">Asset Details</span>
                   </div>
       
                   <div class="fields">
                       
                       <div class="input-field">
                           <label>Vessel <span style="color:#FF0000">*</span></label>
                           <select required name="Vessel" class="form-control">
                               <option value="">Select Vessel</option>
                              @foreach ($vessel_list as $vesselY)
                              <option value="{{ $vesselY -> Vessel_Id }}" >{{ $vesselY -> VesselName }}</option>
                              @endforeach
                               
                           </select>
                       </div>
                       
       
                       
                       <div class="input-field">
                           <label>State <span style="color:#FF0000">*</span></label>
                           <select name="State" class="form-control" required>
                               <option value="">Select State</option>
                                   @foreach ($state_list as $stateY)
                                   <option value="{{ $stateY -> State_Id }}" >{{ $stateY -> State }}</option>
                                   @endforeach
                               </option>
                              
                           </select>
                       </div>
                       
       
                       
                       <div class="input-field">
                           <label>Vendor<span style="color:#FF0000">*</span></label>
                           <select name="Vendor" class="form-control" required>
                               <option value="">Select Vendor</option>
                                   @foreach ($vendor_list as $vendorY)
                                   <option value="{{ $vendorY -> Vendor_Id }}" >{{ $vendorY -> VendorName }}</option>
                                   @endforeach
                               </option>
                           </select>
                       </div>
                       
       
                       <div class="input-field">
                           <label>Delivery Port</label>
                           <input type="text" placeholder="Delivery Port" class="form-control" name="DelPort" >
                       </div>
       
                       <div class="input-field">
                           <label>Delivery ETA</label>
                           <input type="date" placeholder="Delivery ETA" class="form-control" name="DelETA">
                       </div>
       
                       <div class="input-field">
                           <label>Delivery Detail</label>
                           <input type="text" placeholder="Delivery Detail" class="form-control" name="DeliveryDetail" >
                       </div>
       
                       
                       <div class="input-field" id="Category">
                           <label>Category<span style="color:#FF0000">*</span></label>
                           <select id="category_id" name="Category" class="form-control" required>
                               <option value="">Select Category</option>
                                   @foreach ($category_list as $categoryY)
                                   <option id="{{ $categoryY -> Category }}" value="{{ $categoryY -> Category_Id }}">{{ $categoryY -> Category }}</option>
                                   @endforeach
                           </select>
                           </div>
       
                       <div class="input-field">
                           <label>Warranty Expiry Date</label>
                           <input type="date" placeholder="Expiry Date" class="form-control" name="WEDate">
                       </div>
       
                       <div class="input-field">
                           <label>Price (USD)</label>
                           <input type="number" min="0" max="999999999" placeholder="Price" class="form-control" name="Price">
                       </div>

                       <div class="input-field">
                        <label>Maker</label>
                        <input type="text" placeholder="Maker" class="form-control" name="Maker">
                    </div>
    
                    <div class="input-field">
                        <label>Model</label>
                        <input type="text" placeholder="Model" class="form-control" name="Model">
                    </div>
    
                    <div class="input-field">
                        <label>Ship Installation Location</label>
                        <select name="Location" class="form-control">
                            <option >Select Location</option>
                            <option value="A Deck" >A Deck</option>
                            <option value="B Deck" >B Deck</option>
                            <option value="C Deck" >C Deck</option>
                            <option value="D Deck" >D Deck</option>
                            <option value="E Deck" >E Deck</option>
                            <option value="Upper Deck" >Upper Deck</option>
                            <option value="Cargo Control Room" >Cargo Control Room</option>
                            <option value="Ship Office" >Ship Office</option>
                            <option value="Engine Room" >Engine Room</option>
                            <option value="Store Room" >Store Room</option>
                            <option value="Electrical Room" >Electrical Room</option>
                            <option value="Accomodation Deck" >Accomodation Deck</option>
                            <option value="Bridge" >Bridge</option>
                        </select>
                    </div>
    
    
                    <div class="input-field">
                        <label>System Provider</label>
                        <select name="SystemProvider" class="form-control">
                            <option value="Vessel IT" >Vessel IT</option>
                            <option value="Owner IT"  >Owner IT</option>
                            <option value="Third Party / Vendor" >Third Party / Vendor</option>
                        </select>
                    </div>
    
                    <div class="input-field">
                        <label>Connectivity</label>
                        <select name="Connectivity" class="form-control">
                            <option >Select Connectivity</option>
                            <option value="Business LAN" >Business LAN</option>
                            <option value="OT LAN" >OT LAN</option>
                            <option value="Crew LAN" >Crew LAN</option>
                           
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Support Provider</label>
                        <select name="SuppProv" class="form-control">
                            <option value="Vessel IT" >Vessel IT</option>
                            <option value="Owner IT"  >Owner IT</option>
                            <option value="Third Party / Vendor" >Third Party / Vendor</option>
                        </select>
                    </div>
       
                   </div>
       
               </div>
       
               <!---Next Page-->
               
               <div class="first nextdivision" id="nextdivisions">
                   <div class="details personal">
                       <span class="title1">CPU Info</span>
                   </div>
       
                   <div class="fields">
       
                       <div class="input-field">
                           <label>Device Name</label>
                           <input type="text" placeholder="Device name" name="DeviceName"  class="form-control">
                       </div>
       
                       <div class="input-field">
                            <label>Processor</label>
                            <select name="Processor" class="form-control">
                                <option >Select Processor</option>
                                <option value="Intel i3" >Intel i3</option>
                                <option value="Intel i5"  >Intel i5</option>
                                <option value="Intel i7" >Intel i7</option>
                                <option value="Intel i9" >Intel i9</option>
                                <option value="AMD" >AMD</option>
                            </select>
                       </div>
       
                       <div class="input-field">
                           <label>Operating System</label>
                           <select name="OS" class="form-control">
                               <option >Select Operating System</option>
                               <option value="Windows XP" >Windows XP</option>
                               <option value="Windows 7" >Windows 7</option>
                               <option value="Windows 10" >Windows 10</option>
                               <option value="Windows 11" >Windows 11</option>
                           </select>
                       </div>
       
                       <div class="input-field">
                           <label>Win Key</label>
                           <input type="text" placeholder="Win key" class="form-control" name="WinKey">
                       </div>
       
                       <div class="input-field">
                           <label>IP Address</label>
                           <input type="text" placeholder="IP Address" class="form-control" name="IPAdd">
                       </div>
       
                       <div class="input-field">
                           <label>Subnet</label>
                           <input type="text" placeholder="Subnet" class="form-control" name="Subnet">
                       </div>
       
                       <div class="input-field">
                           <label>Gateway</label>
                           <input type="text" placeholder="Gateway" class="form-control" name="Gateway">
                       </div>
       
                       <div class="input-field">
                           <label>CPU Speed</label>
                           <input type="text" placeholder="CPU speed" class="form-control" name="CPUSpeed">
                       </div>
       
                       <div class="input-field">
                           <label>Hard Disk Size</label>
                           <input type="text" placeholder="Hard disk size" class="form-control" name="HardDisk">
                       </div>
       
                       <div class="input-field">
                           <label>RAM</label>
                           <input type="text" placeholder="RAM" class="form-control" name="RAM">
                       </div>
       
                   </div>
       
               </div>
       
               <div class="buttons">
                   <button class="nextBtn" type="submit">
                       <span class="btnText">Save</span>
                       <i class="uil uil-navigator"></i>
                   </button>
               </div>
       
               </div>
               
           </form>
       
       </div>
       
       <script type="text/javascript">
           $(function(){
       
               $('#nextdivisions').hide();
               $('#category_id').change(function()
               {
                   var selectmenuID = document.getElementById('category_id');
                   var selectedoptionmenuID = selectmenuID.options[selectmenuID.selectedIndex].id;
                   if(selectedoptionmenuID == 'CPU'){
                       $('#nextdivisions').show();
                   }
                   else if(selectedoptionmenuID != 'CPU'){
                       $('#nextdivisions').hide();
                   }
               });
       });
       </script>
</body>
</html>