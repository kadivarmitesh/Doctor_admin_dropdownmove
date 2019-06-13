<?php
session_start();
require 'config.php';
if(!isset($_SESSION['id']))
{
    header("Location: login.php?msg=Please login first");
}

$sql = "SELECT * FROM `disease_tbl` ORDER BY orderby";
$res = mysqli_query($con,$sql);

?>

  <?php include_once('header.php');  ?>
  
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
                <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <h2 class="text-center">Patient Details</h2><hr>
                            <form class="form-sample">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="firstname"  placeholder="Enter Firstname"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="lastname" placeholder="Enter Lastname" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="email" placeholder="Enter Email"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="birthdate" placeholder="Patient Birthdate">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Disease</label>
                                    <div class="col-sm-9">
                                    
                                    <div class="dropdown form-control" id="dropdisease">
                                    <a onclick="myFunction()" id="data" class="dropbtn from-control" data-id="">Select Disease</a>
                                    <div id="myDropdown" class="dropdown-content">
                                      <ul style="height: 300px;">
                                      <?php while ($row = mysqli_fetch_assoc($res)): ?>
                                        <li data-id=<?php echo $row['orderby'];  ?> id=<?php echo $row['id'];?> onclick="setValue('<?php echo $row['disease']; ?>');">
                                        <a href="#" class="reorder-up"><i class="fa fa-angle-double-up"></i></a> 
                                        <a href="#" class="reorder-down"><i class="fa fa-angle-double-down"></i></a> 
                                        <?php echo $row['disease']; ?></li>
                                      <?php endwhile; ?> 
                                       
                                      </ul>
                                      
                                      
                                    </div>
                                  </div>
                                  </div> 
                                  </div> 

                                </div>
                                <div class="col-md-6">
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mobile Number</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="mobileno" placeholder="Enter Phone no"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Appointment Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="appdate" placeholder="Appointement Date">
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Appointment Time</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="apptime">
                                          <option>Select Aappointment time</option>
                                          <option>07:00 to 07:10 PM</option>
                                          <option>07:20 to 07:30 PM</option>
                                          <option>07:40 to 07:50 PM</option>
                                          <option>08:00 to 08:10 PM</option>
                                          <option>08:20 to 08:30 PM</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" rows="5" id="description" placeholder="Enter Description"></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-gradient-success mb-2 float-right" id="submit">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
        </div>

    <?php include_once('footer.php');  ?>
        
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

  <!-- datepicker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script>
      $('#birthdate').datepicker({ 
        format: 'dd-mm-yyyy',
        endDate: "today",
        autoclose:true,
      });
      
      var date = new Date();
        date.setDate(date.getDate());
      $('#appdate').datepicker({ 
        format: 'dd-mm-yyyy',
        startDate: date,
        autoclose:true,
      });
  
  </script>


<script type="text/javascript"> 
   $(".reorder-up").click(function(){
      var $current = $(this).closest('li')
      var $previous = $current.prev('li');
      if($previous.length !== 0){
        $current.insertBefore($previous);
      }
      GetValue();
      return false;
    });

    $(".reorder-down").click(function(){
      var $current = $(this).closest('li')
      var $next = $current.next('li');
      if($next.length !== 0){
        $current.insertAfter($next);
      }
      GetValue();
      return false;
    });
</script>


<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");

}
function setValue(item)
{
$("#data").text(item);

}

window.onclick = function(event) { 
  if (!event.target.matches('.dropbtn')) {
   var dropdowns = document.getElementsByClassName("dropdown-content");
   var i; 
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i]; 
       if (openDropdown.classList.contains('show')) { 
         openDropdown.classList.remove('show'); 
       } 
     } 
  } 
 } 
</script>
<script>
function GetValue() {
  var d = [];
    $('#dropdisease ul li').each(function(i)
    {
      d.push($(this).attr('id'));

    });
    // alert(d); 
    var jsonString = JSON.stringify(d);
    $.ajax({
        type: "POST",
        url: "script.php",
        data: {data : jsonString}, 
        cache: false,

        success: function(status){
          //alert(status);
           
        }
    });
}

$('#submit').on('click', function() {
  var firstname = $('#firstname').val();
  var lastname = $('#lastname').val();
  var email = $('#email').val();
  var birthdate = $('#birthdate').val();
  var disease = $('#disease').val();
  var mobileno = $('#mobileno').val();
  var appdate = $('#appdate').val();
  var apptime = $('#apptime').val();
  var description = $('#description').val();
  $(".error").remove();

  alert(firstname);
  alert(lastname);
  alert(email);
  alert(birthdate);
  alert(disease);
  alert(mobileno);
  alert(appdate);
  alert(apptime);
  alert(description);


	
	});


</script>

</body>

</html>
