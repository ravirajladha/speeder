<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/nav-header.php'; 
$wallet = $data['wallet'];
?>

<style>
    * {
  margin: 0;
  padding: 0;
  --transition: 0.15s;
  --border-radius: 0.5rem;
  --background: #ffc107;
  --box-shadow: #ffc107;
}



.cont-title {
  color: white;
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 1rem;
}

.cont-main {
  display: flex;
  flex-wrap: wrap;
  align-content: center;
  justify-content: center;
}

.cont-checkbox {
  width: 150px;
  height: 100px;
  border-radius: var(--border-radius);
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  background: white;
  transition: transform var(--transition);
}

.cont-checkbox:first-of-type {
  margin-bottom: 0.75rem;
  margin-right: 0.75rem;
}

.cont-checkbox:active {
  transform: scale(0.9);
}

input {
  display: none;
}

input:checked + label {
  opacity: 1;
  box-shadow: 0 0 0 3px var(--background);
}

input:checked + label img {
  -webkit-filter: none; /* Safari 6.0 - 9.0 */
  filter: none;
}

input:checked + label .cover-checkbox {
  opacity: 1;
  transform: scale(1);
}

input:checked + label .cover-checkbox svg {
  stroke-dashoffset: 0;
}

label {
  display: inline-block;
  cursor: pointer;
  border-radius: var(--border-radius);
  overflow: hidden;
  width: 100%;
  height: 100%;
  position: relative;
  opacity: 0.6;
}

label img {
  width: 100%;
  height: 70%;
  object-fit: cover;
  clip-path: polygon(0% 0%, 100% 0, 100% 81%, 50% 100%, 0 81%);
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
}

label .cover-checkbox {
  position: absolute;
  right: 5px;
  top: 3px;
  z-index: 1;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: var(--box-shadow);
  border: 2px solid #fff;
  transition: transform var(--transition),
    opacity calc(var(--transition) * 1.2) linear;
  opacity: 0;
  transform: scale(0);
}

label .cover-checkbox svg {
  width: 13px;
  height: 11px;
  display: inline-block;
  vertical-align: top;
  fill: none;
  margin: 5px 0 0 3px;
  stroke: #fff;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-dasharray: 16px;
  transition: stroke-dashoffset 0.4s ease var(--transition);
  stroke-dashoffset: 16px;
}

label .info {
  text-align: center;
  margin-top: 0.2rem;
  font-weight: 600;
  font-size: 0.8rem;
}
</style>
        <!-- page content start -->
        <div class="container mt-3 mb-4 text-center">
            <h5 class="text-white mb-4">Truck Booking</h5>
        </div>

        <div class="main-container">

            <div class="container mb-4">
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



            <div class="container mb-4">
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
                        <div class="card" style="display:table">
                            <div style="display:table-cell">
                            <button class="btn btn-warning" onclick="distance_calc()">Find Trucks</button>
                            </div>
                            <div style="display:table-cell">
                            <span style="display:none;font-size:15px;margin-left:20px;padding-right:20px" id="distance"></span>
                            </div>
                        </div>
                    </div>
                </div>
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
<center><button onclick="create_truck_order()" id="book_truck" style="width:100%;display:none" class="btn btn-success">Book Truck</button></center>
  </div>



                        <div class="container">
                           <center> <span style="font-size:15px" id="no_truck"></span></center>
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
            url  : '<?php echo URLROOT; ?>/pages/check_truck',
            type : 'POST',
            data : {lat1,lon1,lat2,lon2,pincode1,pincode2},

            success : function(res)
            {
                res_val = res.split("*");
                dist = res_val[0];
                truck_val = res_val[1];
                if(truck_val){
                trucks = truck_val.split(",");
                for (const truck of trucks) {
                    if(truck==1){
                    var tcost = 100 * dist;
                    document.getElementById("t1").style.display = "block";
                    document.getElementById("tcost1").innerHTML = "Tempo | ₹ "+tcost;
                    }
                    else if(truck==2){
                    var tcost = 200 * dist;
                    document.getElementById("t2").style.display = "block";
                    document.getElementById("tcost2").innerHTML = "Truck | ₹ "+tcost;
                    }
                    else if(truck==3){
                    var tcost = 300 * dist;
                    document.getElementById("t3").style.display = "block";
                    document.getElementById("tcost3").innerHTML = "Lorry | ₹ "+tcost;
                    }
                }
                document.getElementById("no_truck").innerHTML = "";   
                document.getElementById("book_truck").style.display = "block";
               } else {
                document.getElementById("no_truck").innerHTML = "Trucks not available.";   
                document.getElementById("book_truck").style.display = "none";
                document.getElementById("t1").style.display = "none";
                document.getElementById("t2").style.display = "none";
                document.getElementById("t3").style.display = "none";
               }
                document.getElementById("distance").style.display = "block";
                document.getElementById("distance").innerHTML = "Distance: "+dist+" Kms";
            }

        });
             


}





function create_truck_order(){
        var from =  $("#search_input").val();
        var to =  $("#search_input2").val();
        var lat1 = $("#latitude_view").text();
        var lon1 =  $("#longitude_view").text();
        var lat2 = $("#latitude_view2").text();
        var lon2 =  $("#longitude_view2").text();    
        var pincode1 =  $("#pincode").text();    
        var pincode2 =  $("#pincode2").text();   
        

        if($('#myRadio-1').is(":checked")){
        var truck = 1;
        }
        else if($('#myRadio-2').is(":checked")){
        var truck = 2;
        }else if($('#myRadio-3').is(":checked")){
        var truck = 3;
        }

       $.ajax({
            url  : '<?php echo URLROOT; ?>/pages/create_truck_order',
            type : 'POST',
            data : {from,to,lat1,lon1,lat2,lon2,pincode1,pincode2,truck},

            success : function(res)
            {
                var res_val = res.split(",");
                var flag = res_val[0];
                var response = res_val[1];
                document.getElementById("no_truck").innerHTML = response;  
                if(flag == "1"){
                    window.location.href = "<?php echo URLROOT; ?>/pages/truck_orders";
                }
            }

        });
}

</script>

