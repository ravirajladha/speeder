<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; 
$wallet = $data['wallet'];
?>

        <!-- page content start -->
        <div class="container mt-3 mb-4 text-center">
            <h5 class="text-white mb-4">Send Parcel Locally</h5>
        </div>

        <div class="main-container card">

            <div class="container mb-2">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body container" >
                           
                            <div>
                            <input placeholder='Select Source' type="text" class='form-control' name="source_pincode" style="color:#333;" id="search_input"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container mb-2">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body container" >
                           
                            <div>
                            <input type="text" placeholder='Select Destination' class='form-control' name="source_pincode" style="color:#333;" id="search_input2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                        <div class="container form-group float-label" style="display: table-cell">
                        <select style="height: 37px; white-space: pre-wrap;" name="package_type" class="form-control" id="parcel_type">
                           <option value="Any" id="packnormal">Parcel Type</option>
                            <option value="Electronics" id="packnormal">Electronics</option>
                            <option value="Medicine">Medicine</option>
                            <option value="Groceries">Groceries</option>
                            <option value="Documents">Documents</option> 
                        </select>  
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card" style="display:table">
                            <div style="display:table-cell">
                           
                            <button class="btn btn-warning" onclick="distance_calc()">Calculate Cost</button>
                            </div>
                            <div style="display:table-cell">
                            <span style="display:none;font-size:15px;margin-left:20px;padding-right:20px" id="distance"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <div id="more_detail" style="display:none;">
            <div class="container mb-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                
                            </div>
                        </div>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="crd">
                                    <div class="card-body container" style="padding:0px !important;" >
                                
                                    <div>
                                    <input type="text" placeholder='Source Address' class='form-control' name="sourcd_pincode" style="color:#333;" id="from_address"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div style="display:table">
                        <div class="container mb-4" style="display:table-cell">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="cad">
                                    <div class="card-body container" style="padding:0px !important;" >
                                
                                    <div>
                                    <input type="text" placeholder='Recipent Name' class='form-control' name="sourcedpincode" style="color:#333;" id="to_name"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-4" style="display:table-cell">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="cad">
                                    <div class="card-body container" style="padding:0px !important;" >
                                
                                    <div>
                                    <input type="text" placeholder='Recipent Phone' class='form-control' name="sourde_pincode" style="color:#333;width:150px" id="to_phone"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                        <br>
                        
                        <div class="container mb-4">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="crd">
                                        <div class="card-body container" style="padding:0px !important;" >
                                    
                                        <div>
                                        <input type="text" placeholder='Destination Address' class='form-control' name="source_pincode" style="color:#333;" id="to_address"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <center><button onclick="create_hyperlocal_order()" type="submit" class="btn btn-success">Create Order</button></center>

                    </div>
</div>

            
            <div class="container">
            <center> <span style="font-size:15px" id="no_hyperlocal"></span></center>
                        </div>
            
           

          

            <div class="container">
                


<div class="cont-main">


    <div class="cont-checkbox" id="t1" style="display:none">
      <input type="radio" name="myRadio" id="myRadio-1" />
      <label for="myRadio-1">
        <img
          src="https://etimg.etb2bimg.com/photo/87713340.cms"
        />
        <span class="cover-checkbox">
          <svg viewBox="0 0 12 10">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
          </svg>
        </span>
        <div class="info" id="tcost1"></div>
       
      </label>
    </div>


    <div class="cont-checkbox" id="t2" style="display:none">
      <input type="radio" name="myRadio" id="myRadio-2" />
      <label for="myRadio-2">
        <img
          src="https://etimg.etb2bimg.com/photo/87713340.cms"
        />
        <span class="cover-checkbox">
          <svg viewBox="0 0 12 10">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
          </svg>
        </span>
        <div class="info" id="tcost2"></div>
      </label>
    </div>

    <div class="cont-checkbox" id="t3" style="display:none">
      <input type="radio" name="myRadio" id="myRadio-3" />
      <label for="myRadio-3">
        <img
          src="https://etimg.etb2bimg.com/photo/87713340.cms"
        />
        <span class="cover-checkbox">
          <svg viewBox="0 0 12 10">
            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
          </svg>
        </span>
        <div class="info" id="tcost3"></div>
      </label>
    </div>


    


</div>
<br><br>
<center><button onclick="create_hyperlocal_order()" id="book_hyperlocal" style="width:100%;display:none" class="btn btn-success">Book hyperlocal</button></center>
  </div>



                        

                
            </div>
            </div>
        </div>
    </main>


    <?php require APPROOT . '/views/inc/nav-footer.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAVtRoMM1uSg9AXpwG8CBZRCAZO1AGH3JM"></script>



<script>
var searchInput = 'search_input';
$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        
        lat = near_place.geometry.location.lat();
        lon = near_place.geometry.location.lng();
		
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();

        var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&key=AIzaSyAVtRoMM1uSg9AXpwG8CBZRCAZO1AGH3JM";

        $.getJSON(geocodingAPI, function (json) {
         if (json.status == "OK") {
          //Check result 0

          var result = json.results[0];
          for(i=0;i<10;i++){
              if(result.address_components[i].types == "postal_code"){
                var pincode = result.address_components[i].long_name;
                document.getElementById('pincode').innerHTML = pincode;
              }

          }
           
               
      }    
  });
    });
});

$(document).on('change', '#'+searchInput, function () {
    document.getElementById('latitude_view').innerHTML = '';
    document.getElementById('longitude_view').innerHTML = '';
});


</script>

<span style="display:none" id="latitude_view"></span>
<span style="display:none" id="longitude_view"></span>
<span style="display:none" id="pincode"></span>


<script>
var searchInput2 = 'search_input2';
$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput2)), {
        types: ['geocode'],
    });
	
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place2 = autocomplete.getPlace();
        
        lat2 = near_place2.geometry.location.lat();
        lon2 = near_place2.geometry.location.lng();
		
        document.getElementById('latitude_view2').innerHTML = near_place2.geometry.location.lat();
        document.getElementById('longitude_view2').innerHTML = near_place2.geometry.location.lng();

        var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat2+","+lon2+"&key=AIzaSyAVtRoMM1uSg9AXpwG8CBZRCAZO1AGH3JM";

        $.getJSON(geocodingAPI, function (json) {
         if (json.status == "OK") {
          //Check result 0

          var result = json.results[0];
          for(i=0;i<10;i++){
              if(result.address_components[i].types == "postal_code"){
                var pincode2 = result.address_components[i].long_name;
                document.getElementById('pincode2').innerHTML = pincode2;
              }

          }
           
               
      }    
  });
    });
});

$(document).on('change', '#'+searchInput, function () {
    document.getElementById('latitude_view').innerHTML = '';
    document.getElementById('longitude_view').innerHTML = '';
});


</script>



<span style="display:none" id="latitude_view2"></span>
<span style="display:none" id="longitude_view2"></span>
<span style="display:none" id="pincode2"></span>



<script>
    function distance_calc(){
        var lat1 = $("#latitude_view").text();
        var lon1 =  $("#longitude_view").text();
        var lat2 = $("#latitude_view2").text();
        var lon2 =  $("#longitude_view2").text();    
        var pincode1 =  $("#pincode").text();    
        var pincode2 =  $("#pincode2").text();    

        $.ajax({
            url  : '<?php echo URLROOT; ?>/pages/check_hyperlocal',
            type : 'POST',
            data : {lat1,lon1,lat2,lon2,pincode1,pincode2},

            success : function(res)
            {
                res_val = res.split("*");
                dist = res_val[0] * 1;
                hyperlocal = res_val[1] * 1;
                wallet = res_val[2] * 1;
                cost = dist * 10;
                cost = Math.round(cost);
                document.getElementById("distance").style.display = "block";
                document.getElementById("distance").innerHTML = "₹"+cost+" ("+dist+" Kms)";
                if(dist){
                if(dist < 20 && hyperlocal){
                    if(wallet > cost){
                    document.getElementById("more_detail").style.display = "block";
                    document.getElementById("no_hyperlocal").innerHTML = ""; 
                    } else {
                    document.getElementById("more_detail").style.display = "none";
                    document.getElementById("no_hyperlocal").innerHTML = "Insufficent wallet ballance.";   
                    }
                }else {
                    document.getElementById("more_detail").style.display = "none";
                    document.getElementById("no_hyperlocal").innerHTML = "Non Serviceable!"; 
                }}
            }

        });
             


}



function create_hyperlocal_order(){
        var from_area =  $("#search_input").val();
        var to_area =  $("#search_input2").val();
        var lat1 = $("#latitude_view").text();
        var lon1 =  $("#longitude_view").text();
        var lat2 = $("#latitude_view2").text();
        var lon2 =  $("#longitude_view2").text();    
        var from_pincode =  $("#pincode").text();    
        var to_pincode =  $("#pincode2").text();
        var from_address =  $("#from_address").val();
        var to_name =  $("#to_name").val();
        var to_phone =  $("#to_phone").val();
        var to_address =  $("#to_address").val();   
        var parcel_type =  $("#parcel_type").val();   


       $.ajax({
            url  : '<?php echo URLROOT; ?>/pages/create_hyperlocal_order',
            type : 'POST',
            data : {from_area,to_area,lat1,lon1,lat2,lon2,from_pincode,to_pincode,from_address,to_name,to_phone,to_address,parcel_type},

            success : function(res)
            {
                var res_val = res.split(",");
                var flag = res_val[0]; 
                if(flag == "1"){
                    window.location.href = "<?php echo URLROOT; ?>/pages/hyperlocal_orders";
                }else {
                    document.getElementById("no_hyperlocal").innerHTML = "Enter all fields"; 
                }
            }

        });
}





$(document).ready(function () {      
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
});

function showPosition(position) {
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
  var city;


  var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&key=AIzaSyAVtRoMM1uSg9AXpwG8CBZRCAZO1AGH3JM";

  $.getJSON(geocodingAPI, function (json) {
      if (json.status == "OK") {
          //Check result 0

          var result = json.results[0];
          document.getElementById('latitude_view').innerHTML = lat;
          document.getElementById('longitude_view').innerHTML = lon;     
          document.getElementById('pincode').innerHTML = result.address_components[7].long_name;
          document.getElementById('search_input').value = result.address_components[1].long_name;
          console.log(result);
          
      }    
  });

}







</script>

