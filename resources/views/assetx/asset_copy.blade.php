@include('layouts.app')  <!DOCTYPE html>
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
       
       
           <form action="{{ url('add_copy')}}" method="POST">
               @csrf
       
               <div class="first division">
                   <div class="details personal">
                       <span class="title1">Asset Info</span>
                   </div>
       
                   <div class="fields">
       
                       <div class="input-field">
                           <label>Serial Number <span style="color:#FF0000">*</span></label>
                           <input required value="" type="text" name="SerialNumber" class="form-control" >
                       </div>
       
                       <div class="input-field">
                           <label>Purchased Date <span style="color:#FF0000">*</span></label>
                           <input required value="{{$asset_info->PurchaseDate}}" type="date" placeholder="purchased date" name="PurchaseDate" class="form-control">
                       </div>
       
                       <div class="input-field">
                           <label>Description</label>
                           <input value="{{$reporting_info->VesselDesc}}" type="text" name="VesselDesc" class="form-control"  >
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
                               <option value="{{$asset_info->Vessel}}" >{{$reporting_info->VesselName}}</option>
                              @foreach ($vessel_list as $vesselY)
                              <option value="{{ $vesselY -> Vessel_Id }}" >{{ $vesselY -> VesselName }}</option>
                              @endforeach
                               
                           </select>
                       </div>
                       
       
                       
                       <div class="input-field">
                           <label>State <span style="color:#FF0000">*</span></label>
                           <select required name="State" class="form-control">
                               <option value="{{$asset_info->State}}">{{$reporting_info->State}}</option>
                                   @foreach ($state_list as $stateY)
                                   <option value="{{ $stateY -> State_Id }}" >{{ $stateY -> State }}</option>
                                   @endforeach
                               </option>
                              
                           </select>
                       </div>
                       
       
                       
                       <div class="input-field">
                           <label>Vendor <span style="color:#FF0000">*</span></label>
                           <select name="Vendor" class="form-control" required>
                               <option value="{{$asset_info->Vendor}}">{{$reporting_info->VendorName}}</option>
                                   @foreach ($vendor_list as $vendorY)
                                   <option value="{{ $vendorY -> Vendor_Id }}" >{{ $vendorY -> VendorName }}</option>
                                   @endforeach
                               </option>
                           </select>
                       </div>
                       
       
                       <div class="input-field">
                           <label>Delivery Port</label>
                           <input value="{{$reporting_info->DelPort}}" type="text" placeholder="Delivery Port" class="form-control" name="DelPort" >
                       </div>
       
                       <div class="input-field">
                           <label>Delivery ETA</label>
                           <input value="{{$reporting_info->DelETA}}" type="date" placeholder="Delivery ETA" class="form-control" name="DelETA">
                       </div>
       
                       <div class="input-field">
                           <label>Delivery Detail</label>
                           <input value="{{$reporting_info->DeliveryDetail}}" type="text" placeholder="Delivery Detail" class="form-control" name="DeliveryDetail" >
                       </div>
       
                       <div class="input-field" id="Category">
                           <label>Category<span style="color:#FF0000">*</span></label>
                           <select required id="category_id" name="Category" class="form-control">
                               <option id="{{$reporting_info->Category}}" value="{{$asset_info->Category}}">{{$reporting_info->Category}}</option>
                                   @foreach ($category_list as $categoryY)
                                   <option id="{{ $categoryY -> Category }}" value="{{ $categoryY -> Category_Id }}">{{ $categoryY -> Category }}</option>
                                   @endforeach
                           </select>
                           </div>
       
                       <div class="input-field">
                           <label>Warranty Expiry Date</label>
                           <input value="{{$reporting_info->WEDate}}" type="date" placeholder="Expiry Date" class="form-control" name="WEDate">
                       </div>
       
                       <div class="input-field">
                           <label>Price (USD)</label>
                           <input value="{{$reporting_info->Price}}" type="number" min="0" max="999999999" placeholder="Price" class="form-control" name="Price">
                       </div>

                       <div class="input-field">
                        <label>Maker</label>
                        <input value="{{$reporting_info->Maker}}" type="text" placeholder="Maker" class="form-control" name="Maker">
                    </div>
    
                    <div class="input-field">
                        <label>Model</label>
                        <input value="{{$reporting_info->Model}}" type="text" placeholder="Model" class="form-control" name="Model">
                    </div>
    
                    <div class="input-field">
                        <label>Ship Installation Location</label>
                        <select name="Location" class="form-control">
                            <option value="{{$reporting_info->Location}}">{{$reporting_info->Location}}</option>
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
                            <option value="{{$reporting_info->SystemProvider}}">{{$reporting_info->SystemProvider}}</option>
                            <option value="Vessel IT" >Vessel IT</option>
                            <option value="Owner IT"  >Owner IT</option>
                            <option value="Third Party / Vendor" >Third Party / Vendor</option>
                        </select>
                    </div>
    
                    <div class="input-field">
                        <label>Connectivity</label>
                        <select name="Connectivity" class="form-control">
                            <option value="{{$reporting_info->Connectivity}}" >{{$reporting_info->Connectivity}}</option>
                            <option value="Business LAN" >Business LAN</option>
                            <option value="OT LAN" >OT LAN</option>
                            <option value="Crew LAN" >Crew LAN</option>
                           
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Support Provider</label>
                        <select name="SuppProv" class="form-control">
                            <option value="{{$reporting_info->SuppProv}}">{{$reporting_info->SuppProv}}</option>
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
                           <input value="{{$reporting_info->DeviceName}}" type="text" placeholder="Device name" name="DeviceName"  class="form-control" id="DeviceName">
                       </div>
       
                       <div class="input-field">
                           <label>Processor</label>
                            <select name="Processor" class="form-control" id="Processor">
                                <option value="{{$reporting_info->Processor}}">{{$reporting_info->Processor}}</option>
                                <option value="Intel i3" >Intel i3</option>
                                <option value="Intel i5"  >Intel i5</option>
                                <option value="Intel i7" >Intel i7</option>
                                <option value="Intel i9" >Intel i9</option>
                                <option value="AMD" >AMD</option>
                            </select>
                        </div>
       
                       <div class="input-field">
                           <label>Operating System</label>
                           <select name="OS" class="form-control" id="OS">
                               <option value="{{$reporting_info->OS}}">{{$reporting_info->OS}}</option>
                               <option value="Windows XP" >Windows XP</option>
                               <option value="Windows 7" >Windows 7</option>
                               <option value="Windows 10" >Windows 10</option>
                               <option value="Windows 11" >Windows 11</option>
                           </select>
                       </div>
       
                       <div class="input-field">
                           <label>Win Key</label>
                           <input value="{{$reporting_info->WinKey}}" type="text" placeholder="Win key" class="form-control" name="WinKey" id="WinKey">
                       </div>
       
                       <div class="input-field">
                           <label>IP Address</label>
                           <input value="{{$reporting_info->IPAdd}}" type="text" placeholder="IP Address" class="form-control" name="IPAdd" id="IPAdd">
                       </div>
       
                       <div class="input-field">
                           <label>Subnet</label>
                           <input value="{{$reporting_info->Subnet}}" type="text" placeholder="Subnet" class="form-control" name="Subnet" id="Subnet">
                       </div>
       
                       <div class="input-field">
                           <label>Gateway</label>
                           <input value="{{$reporting_info->Gateway}}" type="text" placeholder="Gateway" class="form-control" name="Gateway" id="Gateway">
                       </div>
       
                       <div class="input-field">
                           <label>CPU Speed</label>
                           <input value="{{$reporting_info->CPUSpeed}}" type="text" placeholder="CPU speed" class="form-control" name="CPUSpeed" id="CPUSpeed">
                       </div>
       
                       <div class="input-field">
                           <label>Hard Disk Size</label>
                           <input value="{{$reporting_info->HardDisk}}" type="text" placeholder="Hard disk size" class="form-control" name="HardDisk" id="HardDisk">
                       </div>
       
                       <div class="input-field">
                           <label>RAM</label>
                           <input value="{{$reporting_info->RAM}}" type="text" placeholder="RAM" class="form-control" name="RAM" id="RAM">
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
       window.onload = function() {
                var selectmenuID = document.getElementById('category_id');
                var selectedoptionmenuID = selectmenuID.options[selectmenuID.selectedIndex].id;
                   if(selectedoptionmenuID == 'CPU'){
                       $('#nextdivisions').show();
                   }
                   if(selectedoptionmenuID != 'CPU'){
                        $('#IPAdd').val("");
                        $('#Subnet').val("");
                        $('#Gateway').val("");
                        $('#CPUSpeed').val("");
                        $('#HardDisk').val("");
                        $('#RAM').val("");
                        $('#WinKey').val("");
                        $('#OS').val("");
                        $('#Processor').val("");
                        $('#DeviceName').val("");
                        $('#nextdivisions').hide();
                   }
            }

        $('#category_id').change(function()
           {
               var selectmenuID = document.getElementById('category_id');
               var selectedoptionmenuID = selectmenuID.options[selectmenuID.selectedIndex].id;
               if(selectedoptionmenuID == 'CPU'){
                   $('#nextdivisions').show();
               }
               else if(selectedoptionmenuID != 'CPU'){
                    $('#IPAdd').val("");
                    $('#Subnet').val("");
                    $('#Gateway').val("");
                    $('#CPUSpeed').val("");
                    $('#HardDisk').val("");
                    $('#RAM').val("");
                    $('#WinKey').val("");
                    $('#OS').val("");
                    $('#Processor').val("");
                    $('#DeviceName').val("");
                    $('#nextdivisions').hide();
               }
           });

    
   </script>
</body>
</html>