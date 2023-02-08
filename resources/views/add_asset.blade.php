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



    <title>Manage Asset </title> 
</head>

<body>
    
<div class="container">
 <header>Manage Asset</header>
    <form action="">


        <div class="first division">
            <div class="details personal">
                <span class="title1">Asset Info</span>
            </div>

            <div class="fields">

                <div class="input-field">
                    <label>Serial Number <span style="color:#FF0000">*</span></label>
                    <input type="text" placeholder="Serial Number" required>
                </div>

                <div class="input-field">
                    <label>Purchased Date <span style="color:#FF0000">*</span></label>
                    <input type="date" placeholder="purchased date" required>
                </div>

                <div class="input-field">
                    <label>Description</label>
                    <input type="text" placeholder="Description">
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
                    <select required>
                        <option disabled selected>Select Vessel</option>
                        @foreach($vesseldd as $vessel)
                        <option>{{$vessel->VesselName}}</option>
                        @endforeach
                    </select>
                </div>
                

                
                <div class="input-field">
                    <label>State <span style="color:#FF0000">*</span></label>
                    <select required>
                        <option >Select State</option>
                        @foreach($statedd as $state)
                        <option>{{$state->State}}</option>
                        @endforeach
                    </select>
                </div>
                

                
                <div class="input-field">
                    <label>Vendor</label>
                    <select >
                        <option >Select Vendor</option>
                        @foreach($vendordd as $vendor)
                        <option>{{$vendor->VendorName}}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="input-field">
                    <label>Delivery Port</label>
                    <input type="text" placeholder="Delivery Port" >
                </div>

                <div class="input-field">
                    <label>Delivery ETA</label>
                    <input type="date" placeholder="Delivery ETA">
                </div>

                <div class="input-field">
                    <label>Delivery Detail</label>
                    <input type="text" placeholder="Delivery Detail" >
                </div>

                
                <div class="input-field">
                    <label>Category <span style="color:#FF0000">*</span></label>
                    <select required>
                        <option >Select Category</option>
                        @foreach($categorydd as $category)
                        <option>{{$category->Category}}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="input-field">
                    <label>Warranty Expiry Date</label>
                    <input type="date" placeholder="Expiry Date" >
                </div>

                <div class="input-field">
                    <label>Price</label>
                    <input type="number" placeholder="Price">
                </div>

            </div>

        </div>

        <!---Next Page-->
        
        <div class="first nextdivision">
            <div class="details personal">
                <span class="title1">Category Info</span>
            </div>

            <div class="fields">

                <div class="input-field">
                    <label>Maker</label>
                    <input type="text" placeholder="Maker">
                </div>

                <div class="input-field">
                    <label>Model</label>
                    <input type="date" placeholder="Model">
                </div>

                <div class="input-field">
                    <label>Ship Installation Location</label>
                    <input type="text" placeholder="Ship installation location ">
                </div>

                <div class="input-field">
                    <label>System Provider</label>
                    <input type="text" placeholder="System provider">
                </div>

                <div class="input-field">
                    <label>Connectivity</label>
                    <input type="text" placeholder="Connectivity">
                </div>

                <div class="input-field">
                    <label>Support Provider</label>
                    <input type="text" placeholder="Support provider">
                </div>

            </div>
        </div>


        <div class="second nextdivision">
            <div class="details two">
                <span class="title2">Category Details</span>
            </div>

            <div class="fields">

                <div class="input-field">
                    <label>Device Name</label>
                    <input type="text" placeholder="Device name" >
                </div>

                <div class="input-field">
                    <label>Processor</label>
                    <input type="text" placeholder="Processor">
                </div>

                <div class="input-field">
                    <label>Operating System</label>
                    <input type="text" placeholder="Operating system">
                </div>

                <div class="input-field">
                    <label>Win Key</label>
                    <input type="text" placeholder="Win key">
                </div>

                <div class="input-field">
                    <label>IP Address</label>
                    <input type="text" placeholder="IP Address"/>
                </div>

                <div class="input-field">
                    <label>Subnet</label>
                    <input type="text" placeholder="Subnet" >
                </div>

                <div class="input-field">
                    <label>Gateway</label>
                    <input type="text" placeholder="Gateway">
                </div>

                <div class="input-field">
                    <label>CPU Speed</label>
                    <input type="text" placeholder="CPU speed">
                </div>

                <div class="input-field">
                    <label>Hard Disk Size</label>
                    <input type="number" placeholder="Hard disk size">
                </div>

                <div class="input-field">
                    <label>RAM</label>
                    <input type="number" placeholder="RAM">
                </div>

            </div>

        </div>
          <!---End Of Second Page-->

        <div class="buttons">
    
          
            <button class="nextBtn">
                <span class="btnText">Save</span>
                <i class="uil uil-navigator"></i>
            </button>
    
        </div>

    </form>

</div>


<script src="{{ asset('js/add_asset.js') }}"></script>

</body>