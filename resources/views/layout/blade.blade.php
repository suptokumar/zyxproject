 {!! isset($blok['_editable']) ? $blok['_editable'] : '' !!}
 <!-- hero_section -->
        <section class="hero_section" style="background:  rgba(0, 0, 0, 0) url({{$blok['background']==''?url('public/assets/images/hero_bg.png'):$blok['background']}}) no-repeat scroll top center/cover">
            <div class="container container-md">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <h1>{{$blok['title']}}<span>.</span></h1>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="book_section">

<style type="text/css">
.nav-tabs {
    border-bottom: 0px solid #dee2e6;
    margin-bottom: 20px;
}

.nav-tabs .nav-item{
   width: 50%;
  
}
.nav-tabs .nav-item > .nav-link{
   width: 100%;
   border-bottom: 5px solid #C4C4C4 !important;
}
.nav-tabs .nav-item > .nav-link.active{
   width: 100%;
   border-bottom: 5px solid #FF700A !important;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    border-color: none;
    border: 0;
}
.nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {
    width: 100%;
    border-color: none;
    border: 0;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link::hover{
    border-color: none;
    border: 0;
}
.input-group .form-select{
    border: 0;
    background-color: transparent;
}
.form-select:focus{
    border: 0;
    outline: 0;
    box-shadow: 0 0 0 0 rgb(13 110 253 / 25%);
}

.from  {

    background: none;
    border-radius: 0;
}
.from .input-group {
    margin-bottom: 10px;
    background: #F2F4F4;
    border-radius: 10px;
    padding-top: 3px;
    padding-bottom: 3px;
}

.mar_left{
    margin-left: 20px;
    width: 38% !important;
}
.icon_resiz .cus_span {
    width: 23px;
    margin-left: 10px;
}
.icon_resiz .cus_span img{
    margin-top: 10px;
}
.book_section {
    margin-top: 1%;

}
.icon_resiz a:hover {
    filter: brightness(0);
    transition: 0.5s;
}
</style>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Enkeit Tur</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Returrejse</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                  <div class='bus-selector'>
                                        
                                    </div>
                                <div class="tab-pane fade show active panel-g2" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    
                                                                                               <div class="from">
                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/pin.svg"></span>
                                                                    <input id="from_address" type="text" class="form-control"
                                                                        placeholder="Opsamlings adresse" />
                                                                </div>

                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/pin.svg"></span>
                                                                    <input id="to_address" type="text" class="form-control"
                                                                        placeholder="Destinations adresse" />
                                                                </div>
 <div class="from my-3">
                                                                <div class="input-group" style="background:transparent;">
                                                                    <span><a href="javascript:void(0)" onclick="addnewstop()"><img src="{{asset("/public/assets")}}/images/add.svg"></a></span>
                                                                    <input type="" class="form-control" placeholder="Tilføj Stops" disabled />
                                                                </div>
                                                            </div>
<div class="custom_form_maker">



                                                                
</div>
<script>
function addnewstop(){
    var data = $("#stops");
    if(data.val()==''){
        let form_id = Math.floor(Math.random() * 15000000);
        $(".custom_form_maker").html(`<div class="d-flex icon_resiz remover`+form_id+`">
<div class="input-group w-50">
<span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
<input type="text" id="geoapirun`+form_id+`" name="stoploc`+form_id+`" class="form-control" placeholder="Stop Indtast adresse" />
</div>
<div class="input-group mar_left">
<span></span>
<input class="form-control" name="stoploc`+form_id+`" id="stoploc`+form_id+`" style="margin-left: -19px;" aria-label="Default select example" placeholder="" type=number><span style="padding: 0; margin-top: 10px">vaelg ventetid</span>
</div>


<a href="javascript:void(0)" onclick="deleteid(`+form_id+`)" class="mt-3">
<span class="cus_span">

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="25" height="25" x="0" y="0" viewBox="0 0 427 427.00131" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/></g></svg>
</span> </a>
</div>`);

$("#stops").val(form_id);
geo_cool(form_id);
    }else{
        let myArr = data.val().split(",");

        let form_id = Math.floor(Math.random() * 15000000);
        $(".custom_form_maker").append(`<div class="d-flex icon_resiz remover`+form_id+`">
<div class="input-group w-50">
<span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
<input type="text" id="geoapirun`+form_id+`" name="stoploc`+form_id+`" class="form-control" placeholder="Stop Indtast adresse" />
</div>
<div class="input-group mar_left">
<span></span>
<input class="form-control" name="stoploc`+form_id+`" id="stoploc`+form_id+`" style="margin-left: -19px;" aria-label="Default select example" placeholder="" type=number><span style="padding: 0; margin-top: 10px">vaelg ventetid</span>
</div>


<a href="javascript:void(0)" onclick="deleteid(`+form_id+`)" class="mt-3">
<span class="cus_span">

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="25" height="25" x="0" y="0" viewBox="0 0 427 427.00131" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#bdb6b6" data-original="#000000" style="" class=""/></g></svg>
</span> </a>
</div>`);
myArr.push(form_id);
$("#stops").val(myArr.toString());
geo_cool(form_id);


    }
}
</script>
<script>
function geo_cool(id){
            var from_places = new google.maps.places.Autocomplete(document.getElementById("geoapirun"+id));

}

function deleteid(id)
{
    $(".remover"+id).remove();
let array =  $("#stops").val().split(",");
    const index = array.indexOf(id.toString());
if (index > -1) {
  array.splice(index, 1);
}

$("#stops").val(array.toString());

}
</script>
<input type="hidden" name="stops" id="stops" value="">

                                                                 <div class="d-flex icon_resiz">
                                                                    
                                                                    <div class="input-group w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="date" id="date" class="form-control" placeholder="Indtast dato" />
                                                                    </div> 
                                                                    <div class="input-group ms-3 w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="time" id="time" class="form-control" placeholder="Indtast tidspunkt" />
                                                                    </div>
                                                                </div>


                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                    <input class="form-control" id="pax" type="number" placeholder="Pessenger" aria-label="Default select example"/>                                                                 
                                                                </div>
                                                            </div>
                                                           

                                                            <p class="py-3">Find de nyeste COVID-19 rejsevejledninger <a href="#">her</a></p>

                                                            <a href="javascript:void(0)" onclick="" class="btn form_btn submiter">
                                                                Søg priser <span><img src="{{asset("/public/assets")}}/images/left-arrow.svg" alt="left-arrow" /></span>
                                                            </a>

                                </div>
                                <style>
.busselector{
  width: 40%;
  display: inline-block;
  margin: 2.5%;
  border:1px solid #ccc;
  padding: 10px;
}
.busselector img{
  width: 100%;
}
.bus-selector h3{
  font-size: 15px;
}
.bus-selector h2{
  font-size: 18px;
}
.busselector:hover{
  box-shadow: 0px 0px 5px 3px;
  transition: .4s;
}
                                                              </style>

<script>
function pad(number, length){
    var str = "" + number
    while (str.length < length) {
        str = '0'+str
    }
    return str
}

    $('.submiter').click(function(){
        let date = new Date($("#date").val()+'T'+$("#time").val()+'Z');
        let request = {};
        var offset = new Date().getTimezoneOffset()

        
        offset = ((offset<0? '+':'-')+ // Note the reversed sign!
          pad(parseInt(Math.abs(offset/60)), 2)+
          pad(Math.abs(offset%60), 2))
          
          
          
        request.DepartureTime = $("#date").val()+'T'+date.getHours()+":"+((date.getMinutes().toString().length < 2) ? "0"+date.getMinutes() : date.getMinutes())+":00.000"+offset.toString().slice(0,-2)+":00";
        request.token = '{{csrf_token()}}';
        request.carrier = 5;
        request.Destination = $('#to_address').val();
        request.hasReturn = false;
        request.ReturnStops = [];
        request.Origin = $('#from_address').val();
        request.Pax = $('#pax').val();
        let stops = $('#stops').val().split(",");
        let stopcounter = [];
        for (let stop in stops){
            let stoploc = $("#geoapirun"+stops[stop]).val();
            let stopmin = $("#stoploc"+stops[stop]).val();
            if(stopmin=='' ||  stopmin==0 || stopmin==null){
                continue;
            }
            let stopsec = Number(stopmin)*60;
            stopcounter.push({
                "StopAddress":stoploc,
                "StopMinutes":stopmin,
                "StopSeconds":stopsec
            });
        }
        request.Stops =  stopcounter;
        $("#stopser").val(JSON.stringify(stopcounter));
// let lg = {"Stops":[],"ReturnStops":[],"Pax":11,"Origin":"aaa","Destination":"aaa","DepartureTime":"2021-08-29T15:00:00.000+06:00","carrier":"5"};
        console.log(JSON.stringify(request));
$.ajax({
    url: 'https://test-bus-booking.azurewebsites.net/api/search',
    type: 'POST',
    data: request,
    // data: lg,
})
.done(function(data) {
    if(data.Message=='Auto calculated'){
        $(".bus-selector").html('');
        for(buses of data.TripPrices){
            $(".bus-selector").append(`<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" onclick='bookapi(\``+JSON.stringify(buses)+`\`)'><div class="busselector"><img src="https://assets.busbooking.dk/carriers`+buses.BusPictures[0].Path+buses.BusPictures[0].Name+`" class='image'><h2>`+buses.BusName+`</h2><p>`+buses.BusDescription+`</p><h3>Pax:`+buses.BusPax+`</h3><h3>Total Price:`+buses.TotalPrice+`</h3><h3>Driving Time:`+buses.DrivingDuration+`</h3></div></a>`);
        }
         $(".bus-selector").append(`<a href="#" onclick="donaoenoe()" class="btn form_btn">
                                                                Back</span>
                                                            </a>`);
        $(".panel-g2").hide();
                $(".bus-selector").show();

    }else{
        alert("location not valid");
    }
});


       // $( "input[id][name$='man']" ).val( "only this one" );
    });
    
    
function dhown_submit_api(){
let request = {};
         request.trip = {};
request.trip.Stops = JSON.parse($("#stopser").val());
request.trip.ReturnStops = [];
request.trip.Pax = $("");
let date = new Date($("#date").val()+'T'+$("#time").val()+'Z');
var offset = new Date().getTimezoneOffset()

        
        offset = ((offset<0? '+':'-')+ // Note the reversed sign!
          pad(parseInt(Math.abs(offset/60)), 2)+
          pad(Math.abs(offset%60), 2))
          
          
        request.trip.DepartureTime = $("#date").val()+'T'+date.getHours()+":"+((date.getMinutes().toString().length < 2) ? "0"+date.getMinutes() : date.getMinutes())+":00.000"+offset.toString().slice(0,-2)+":00";
        request.trip.carrier = 5;
        request.trip.Destination = $('#to_address').val();
        request.trip.Origin = $('#from_address').val();
        request.trip.Pax = Number($('#pax').val());
        request.dirty = false;
        request.contact = {};
        request.contact.FirstName = $("#firstname").val();
        request.contact.LastName = $("#lastname").val();
        request.contact.Email = $("#email").val();
        request.contact.PhoneNumber = $("#phone").val();
        request.contact.Country = $("#country").val();
        request.contact.Address = $("#address").text();
        request.contact.Comments = $("#comments").text();
        request.item = JSON.parse($("#bus").val());
// {
//   "trip":{
//       "Stops":[
         
//       ],
//       "ReturnStops":[
         
//       ],
//       "Pax":11,
//       "Origin":"Vejlby Fed Strand Camping, Rigelvej, Middelfart, Denmark",
//       "Destination":"Skovlund Camping - Middelfart, Kystvejen, Asperup, Denmark",
//       "DepartureTime":"2021-08-29T15:00:00.000+06:00",
//       "carrier":"5"
//   },
//   "dirty":false,
//   "contact":{
//       "FirstName":"so",
//       "LastName":"son",
//       "Email":"pe@son.com",
//       "PhoneNumber":"91478410",
//       "Country":"sons",
//       "Address":"Dohna, Germany",
//       "Comments":"dfeafgagsg"
//   },
//   "item":{
//       "TripPriceId":666422,
//       "CarrierName":"ST Turistfart",
//       "BusName":"Minibus ",
//       "BusDescription":"Dansk vognmand vestjylland",
//       "BusPictures":[
//          {
//             "Path":"/img/buspictures/21/",
//             "Name":"minibus-1e81b5d0195b430ab6c6271745073cb3.jpg"
//          }
//       ],
//       "BusAttributes":[
//          "Salg af kaffe/the",
//          "Salg af øl/vand",
//          "AUX-stik",
//          "Trailer kan tilkøbes",
//          "Avisnet"
//       ],
//       "BusPax":19,
//       "BusType":2,
//       "TotalPrice":2000,
//       "DrivingDuration":"00:08:53",
//       "WaitDuration":"00:00:00",
//       "ArrivalTime":"2021-08-29T19:08:53.000+06:00",
//       "ReturnArrivalTime":null,
//       "BusWaitsAtDestination":null,
//       "Promoted":false,
//       "EcoScore":22446
//   }
// }
console.log(request);
console.log(JSON.stringify(request));
console.log(JSON.parse(JSON.stringify(request)));
$.ajax({
    url: 'https://test-bus-booking.azurewebsites.net/api/booktrip',
    type: 'POST',
    contentType: "application/json",
    dataType: "json",
    data: JSON.stringify(request)
    // data: lg,
})
.done(function(data) {
    console.log(data);
});
}
    
    function donaoenoe(){
        $(".panel-g2").show();
        $(".bus-selector").hide();
    }
    
function bookapi(json){
    $("#bus").val(json);
}
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">FirstName</label>
    <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">LastName</label>
    <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" id="email" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">PhoneNumber</label>
    <input type="text" id="phone" class="form-control" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Country</label>
    <input type="text" id="country" class="form-control"  aria-describedby="emailHelp">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <textarea type="text" id="address" class="form-control"  aria-describedby="emailHelp"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Comments</label>
    <textarea type="text" id="comments" class="form-control" aria-describedby="emailHelp"></textarea>
  </div>
  <input type="hidden" id="bus">
  <input type="hidden" id="stopser">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="dhown_submit_api()" data-dismiss="modal">Book Now</button>
      </div>
    </div>
  </div>
</div>


<style>
    .modal input.form-control {
    border: 1px solid #ccc;
}
</style>


                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="from">
                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/pin.svg"></span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Opsamlings adresse" />
                                                                </div>
                                                                  <div class="d-flex icon_resiz">
                                                                    <div class="input-group w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="text" class="form-control" placeholder="2.Stop Indtast adresse" />
                                                                    </div>
                                                                    <div class="input-group mar_left">
                                                                        <span></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                          <option selected>vaelg ventetid</option>
                                                                          <option value="1">One</option>
                                                                          <option value="2">Two</option>
                                                                          <option value="3">Three</option>
                                                                        </select>

                                                                    </div>
                                                                    <span class="cus_span" ><img class="w-100" src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                </div>
                                                                <div class="d-flex icon_resiz">
                                                                    <div class="input-group w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="text" class="form-control" placeholder="3.Stop Indtast adresse" />
                                                                    </div>
                                                                    <div class="input-group mar_left">
                                                                        <span></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                          <option selected>vaelg ventetid</option>
                                                                          <option value="1">One</option>
                                                                          <option value="2">Two</option>
                                                                          <option value="3">Three</option>
                                                                        </select>

                                                                    </div>
                                                                    <span class="cus_span" ><img class="w-100" src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                </div>

                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/pin.svg"></span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Destinations adresse" />
                                                                </div>


                                                                 <div class="from my-3">
                                                                <div class="input-group" style="background:transparent;">
                                                                    <span><a href="#"><img src="{{asset("/public/assets")}}/images/add.svg"></a></span>
                                                                    <input type="" class="form-control" placeholder="Tilføj retur" disabled />
                                                                </div>
                                                            </div>


                                                                 <div class="d-flex icon_resiz">
                                                                    
                                                                    <div class="input-group w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="text" class="form-control" placeholder="Indtast dato" />
                                                                    </div> 
                                                                    <div class="input-group ms-3 w-50">
                                                                        <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                        <input type="text" class="form-control" placeholder="Indtast tidspunkt" />
                                                                    </div>
                                                                </div>


                                                                <div class="input-group">
                                                                    <span><img src="{{asset("/public/assets")}}/images/calendar.svg"></span>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                      <option selected>Pessenger</option>
                                                                      <option value="1">One</option>
                                                                      <option value="2">Two</option>
                                                                      <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                           

                                                            <p class="py-3">Find de nyeste COVID-19 rejsevejledninger <a href="#">her</a></p>

                                                            <a href="#" class="btn form_btn">
                                                                Søg priser <span><img src="{{asset("/public/assets")}}/images/left-arrow.svg" alt="left-arrow" /></span>
                                                            </a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script>
    $(function() {
        // add input listeners
setInterval(function(){
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_address'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_address'));
    
},1500);
        // google.maps.event.addDomListener(window, 'load', function () {
        
        //     google.maps.event.addListener(from_places, 'place_changed', function () {
        //         var from_place = from_places.getPlace();
        //         var from_address = from_place.formatted_address;
        //         $('#origin').val(from_address);
        //     });

        //     google.maps.event.addListener(to_places, 'place_changed', function () {
        //         var to_place = to_places.getPlace();
        //         var to_address = to_place.formatted_address;
        //         $('#destination').val(to_address);
        //     });

        // });
        // // calculate distance
        // function calculateDistance() {
        //     var origin = $('#origin').val();
        //     var destination = $('#destination').val();
        //     var service = new google.maps.DistanceMatrixService();
        //     service.getDistanceMatrix(
        //         {
        //             origins: [origin],
        //             destinations: [destination],
        //             travelMode: google.maps.TravelMode.DRIVING,
        //             unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
        //             // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
        //             avoidHighways: false,
        //             avoidTolls: false
        //         }, callback);
        // }
        // // get distance results
        // function callback(response, status) {
        //     if (status != google.maps.DistanceMatrixStatus.OK) {
        //         $('#result').html(err);
        //     } else {
        //         var origin = response.originAddresses[0];
        //         var destination = response.destinationAddresses[0];
        //         if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
        //             $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
        //         } else {
        //             var distance = response.rows[0].elements[0].distance;
        //             var duration = response.rows[0].elements[0].duration;
        //             console.log(response.rows[0].elements[0].distance);
        //             var distance_in_kilo = distance.value / 1000; // the kilom
        //             var distance_in_mile = distance.value / 1609.34; // the mile
        //             var duration_text = duration.text;
        //             var duration_value = duration.value;
        //             $('#in_mile').text(distance_in_mile.toFixed(2));
        //             $('#in_kilo').text(distance_in_kilo.toFixed(2));
        //             $('#duration_text').text(duration_text);
        //             $('#duration_value').text(duration_value);
        //             $('#from').text(origin);
        //             $('#to').text(destination);
        //         }
        //     }
        // }
        // // print results on submit the form
        // $('#distance_form').submit(function(e){
        //     e.preventDefault();
        //     calculateDistance();
        // });

    });

</script>

        <!-- hero_section end -->