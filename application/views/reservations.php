<?php
  $period = new DatePeriod(new DateTime(date('Y-m-d')), new DateInterval('P1D'), new DateTime('2017-04-15 +1 day'));
    foreach ($period as $date) {
        $dates[] = $date->format("Y-m-d");
    }

    //$date_to_remove = array();
    if($booked_dates != null){
      foreach ($booked_dates as  $value) {
            $date_to_remove[] = $value->eff_date;
          }
    }
    else{
      $date_to_remove = array(date('Y-m-d'));
    }
    
    
    $eff_dates = array_diff($dates, $date_to_remove);

    $str="[";
    foreach ($eff_dates as $key => $value) {
      $str.="{title: 'Avalable',url: '$value',start: '$value',className:'avail',color: 'blue'},";
    }

    foreach ($date_to_remove as $key => $value) {
      $str.="{title: 'Not Available',url: '$value',start: '$value',className:'notavail',color: 'red'},";
    }
    $str = rtrim($str,',');
    $str.="]";
?>
<script type="text/javascript" src="js/reservations.js"></script>

<script type="text/javascript">


$(document).ready(function() {
  $(document).on("click",".avail",function(e){
    e.preventDefault();
    
    $('#reservation').show();
    $("#eff_date").val($(this).attr('href'));
    $('html, body').animate({
      scrollTop: $("#reservation").offset().top
    }, 1000);
  });

  $(document).on("click",".notavail", function(e){
    e.preventDefault();
  });

  $(document).on("click","#package_id", function(){
    var package_id = $("#package_id").val();
    $.post("index.php/main/load_data/reservations/load", {
      package_id:package_id
    }, function(r){
     $("#packages").html(r);
     caltot();
   },"text");
  });

  $(document).on("click",".cl",function(){
    caltot();
  });

  $(document).on("click","#reservationSave",function(e){
    e.preventDefault();
    var a ={};

    a.package_id = $("#package_id").val();
    a.eff_date = $("#eff_date").val();
    
    var is_custom = '0';
    if($("#package_id").val() ==='0'){
      is_custom = '1';
    }
    a.is_custom = is_custom;

    var total = $("#total").val();
    a.total = total;

    var det = [];
    $(".cl").each(function(){
      if($(this).is(':checked')){
        det.push($(this).attr('data-id'));
      }
    });

    a.det = det;


    $.post("index.php/main/load_data/reservations/save", {
      data: a,
    }, function(r){
     location.reload();
   },"text");
  });


  function caltot(){
    var tot=0;
    $(".cl").each(function(){
      if($(this).is(':checked')){
        tot += parseFloat($(this).attr('data-selling'));
      }
      
    });

    $("#total").val(tot);
  }


  $('#calendar').fullCalendar({
    defaultDate: '2017-02-12',
    editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?=$str?>
   });

});

</script>
<style>

body {
  /*margin: 40px 10px;
  padding: 0;
  font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  font-size: 14px;*/
}

#calendar {
  max-width: 900px;
  margin: 0 auto;
}

</style>
<title>Mangala Studio</title>
</head>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
<div class="container">
  
  <class class="row">
    <div id='calendar'></div>
  </class>

<?php
  if ($this->session->flashdata('vimu_alert')) {
    ?>
    <div class="alert alert-success">
      <strong>Success!</strong> <?=$this->session->flashdata('vimu_alert')?>
    </div>
    <?php
  }
  ?>
  
  <div class="row" id="reservation" style="display:none;">
    <div class="col-sm-12 text-center">
      <h2>Make a Reservation</h2>
    </div>
    <div class="col-sm-12">
     <form class="form-horizontal" id="frm_reservation">
      <div class="form-group">
        <label class="control-label col-sm-2" for="eff_date">Date:</label>
        <div class="col-sm-4">
          <input readonly type="text" class="form-control" id="eff_date" name="eff_date" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Package:</label>
        <div class="col-sm-5">
          <select type="text" class="form-control" id="package_id" name="package_id">

            <?php
            echo "<option value=''>Select a Package</option>";
            foreach ($packages as  $value) {
              echo "<option value='".$value->id."'>".$value->name."</option>";
            }
            echo "<option value='0'>Custom</option>";
            ?>

          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="row" id="packages" >

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="eff_date">Total</label>
        <div class="col-sm-4">
          <input readonly type="text" class="form-control" id="total" name="total" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" id="reservationSave" class="btn btn-default">Save</button>
        </div>
      </div>
    </form>



  </div>
</div>
</div>





