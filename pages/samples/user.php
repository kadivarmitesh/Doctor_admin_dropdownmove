<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location: login.php?msg=Please login first");
}

?>

  <?php include_once('header.php');  ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-md-6 col-sm-6">
                      <h2 class="text-center">User & Patients Details</h2>
                    </div>
                    <div class="col-md-3 col-sm-3">
                      <a href="addpatient.php" class="btn btn-link">Add Patient</a>
                    </div>
                  </div>
                  <hr>
                    <div class="table-responsive">
                        <table id="example" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th id="colspanall"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
      <!-- Modal HTML -->
      <div id="myModaldelete" class="modal fade">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                  
                </div>				
                <h4 class="modal-title"><i class="mdi mdi-alert"></i>Are you sure?</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
      </div> 

      <!-- Modal Delete Patient  -->
      <div id="myModaldeletepatient" class="modal fade">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                  
                </div>				
                <h4 class="modal-title"><i class="mdi mdi-alert"></i>Are you sure?</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
      </div> 

      
  <?php include_once('footer.php'); ?>

  <!-- datatable -->
  <script src="../../vendors/js/datatables.min.js"></script>

  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      // $('#zero_config').DataTable();
      	
/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<h3 class="text-center">Patient Pannel Design</h3><hr><table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;margin-left:39px;">'+
        '<tr>'+
            '<td>Patient name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Age:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Appointment Date:</td>'+
            '<td>'+'18-05-2019'+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Appointment Time:</td>'+
            '<td>'+'08:10 to 08:20AM'+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Category:</td>'+
            '<td>'+'Accountant'+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Description:</td>'+
            '<td>'+'Patient Description'+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td><a href="#myModaldeletepatient" class="btn btn-gradient-danger btn-icon-text btn-sm" data-toggle="modal"  data-toggle="tooltip" class="tip-bottom" title="Delete Patient"><i class="mdi mdi-delete "></i>Delete Patient</a></td>'+
            '<td><a href="addpatient.html" class="btn btn-gradient-info  btn-icon-text btn-sm"><i class="mdi mdi-file-check btn-icon-prepend"></i>Edit Patient</a></td>'+
            '<td><button type="button" class="btn btn-gradient-warning btn-icon-text btn-sm"><i class="mdi mdi-email btn-icon-prepend"></i>Send mail</button></td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "objects.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "email" },
            { "data": "phone" },
            { "data": "status" },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="#myModaldelete" class="trigger-btn" data-toggle="modal" id="delete-user"data-toggle="tooltip" class="tip-bottom" title="Delete User"><i class="mdi mdi-delete ">'
            }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
      });
    
    $('#colspanall').on('click', function(){
        // Enumerate all rows
        table.rows().every(function(){
            // If row has details collapsed
            if(!this.child.isShown()){
                // Open this row
                this.child(format(this.data())).show();
                $(this.node()).addClass('shown');
                imageUrl = '../../images/less.png';
                $('#colspanall').css('background-image', 'url(' + imageUrl + ')'); 
            }
            else
            {
              this.child.hide();
                $(this.node()).removeClass('shown');
                 imageUrl = '../../images/expandlmore.png';
                $('#colspanall').css('background-image', 'url(' + imageUrl + ')');
            }
        });
    });
    
});

  </script>

</body>

</html>
