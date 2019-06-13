<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location:http://localhost/doctor_admin/pages/samples/login.php?msg=Please login first");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Online Consult Doctor- Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- Datatable -->
  <link rel="stylesheet" href="vendors/css/dataTables.bootstrap4.css">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/loginlogo.jpg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="images/faces/doctor.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">David Greymaax</p>
              </div>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="pages/samples/logout.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/user.php">
              <span class="menu-title">User</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="pages/samples/addpatient.php">
                <span class="menu-title">Add Patients</span>
                <i class="mdi mdi-account-plus menu-icon"></i>
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/adddisease.php">
              <span class="menu-title">Add Disease </span>
              <i class="mdi mdi-plus menu-icon"></i>
            </a>
        </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          </div>
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-success text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              Dashboard
            </h3>

          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Today Appointments
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">1,500</h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">Pending Appointments
                    <i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">564</h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Total Patients
                    <i class="mdi mdi-application mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">18</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="text-center">Today Appointment</h2><hr>
                  <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                 <th>Appo. time</th>
                                <th>Patient Name</th>
                                <th>Mobile no</th>
                                <th>Age</th>
                                <th>Category</th>
                                <th>Prescription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Tiger Nixon</td>
                                <td>9876325140</td>
                                <td>61</td>
                                <td>System Architect</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class="mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                   <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>09:10 to 9:20 PM</td>
                                <td>Garrett Winters</td>
                                <td>9876325140</td>
                                <td>63</td>
                                <td>Accountant</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                  <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Ashton Cox</td>
                                <td>9876325140</td>
                                <td>66</td>
                                <td>Junior Technical Author</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>09:10 to 9:20 PM</td>
                                <td>Cedric Kelly</td>
                                <td>9876325140</td>
                                <td>22</td>
                                <td>Senior Javascript Developer</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Airi Satou</td>
                                <td>9876334150</td>
                                <td>33</td> 
                                <td>Accountant</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>09:00 to 9:10 PM</td>
                                <td>Brielle Williamson</td>
                                <td>7876325140</td>
                                <td>61</td>
                                <td>Integration Specialist</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Herrod Chandler</td>
                                <td>9876325140</td>
                                <td>59</td>
                                <td>Sales Assistant</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Rhona Davidson</td>
                                <td>9874466140</td>
                                <td>55</td>
                                <td>Integration Specialist</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Colleen Hurst</td>
                                <td>8776325140</td>
                                <td>39</td>
                                <td>Javascript Developer</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>09:00 to 9:10 PM</td>
                                <td>Sonya Frost</td>
                                <td>7845963210</td>
                                <td>23</td>
                                <td>Software Engineer</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>09:20 to 9:30 PM</td>
                                <td>Jena Gaines</td>
                                <td>9876325140</td>
                                <td>30</td>
                                <td>Description Manager</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Quinn Flynn</td>
                                <td>9876325140</td>
                                <td>22</td>
                                <td>Support Lead</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>09:00 to 9:10 PM</td>
                                <td>Charde Marshall</td>
                                <td>9876325140</td>
                                <td>36</td>
                                <td>Regional Director</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Haley Kennedy</td>
                                <td>9876325140</td>
                                <td>43</td>
                                <td>Senior Marketing Designer</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>09:00 to 9:10 PM</td>
                                <td>Tatyana Fitzpatrick</td>
                                <td>9876325140</td>
                                <td>19</td>
                                <td>Regional Director</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Michael Silva</td>
                                <td>9876325140</td>
                                <td>66</td>
                                <td>Marketing Designer</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Paul Byrd</td>
                                <td>9876325140</td>
                                <td>64</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>08:00 to 8:10 AM</td>
                                <td>Gloria Little</td>
                                <td>9876325140</td>
                                <td>59</td>
                                <td>Systems Administrator</td>
                                <td><button type="button" class="btn btn-desc-icon btn-gradient-success btn-rounded" data-toggle="modal" data-target="#Prescription"
                                  data-toggle="tooltip" class="tip-bottom" title="Add Prescription"><i class=" mdi mdi-plus"></i></button></td>
                                <td class="test"><button type="button" class="btn btn-gradient-info btn-sm" data-toggle="tooltip" class="tip-bottom" title="follow up">Follow Up</button>
                                <button type="button" class="btn btn-gradient-success btn-sm" data-toggle="modal" class="tip-bottom" title="Cancel Appointment" data-toggle="modal"  data-target="#Modalcancelapp">Cancel</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Modal Prescription -->
        <div class="modal fade" id="Prescription" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Prescription</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      
                          <div class="col-lg-4">
                              <div class="card" id="prescriotioncard">
                                <div class="">
                                <table class="table" id="patientdetails">
                                  <tbody>
                                    <tr>
                                      <th scope="row">Name</th>
                                      <th>:-</th>
                                      <td>Parth Goswami</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <th>:-</th>
                                        <td>23</td>
                                      </tr>
                                    <tr>
                                      <th scope="row">Mobile No</th>
                                      <th>:-</th>
                                      <td>9903124560</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Email</th>
                                      <th>:-</th>
                                      <td>test@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Category</th>
                                        <th>:-</th>
                                        <td>headache</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <th>:-</th>
                                        <td>test..</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Appointment Date</th>
                                        <th>:-</th>
                                        <td>11-05-2019</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Appointment Time</th>
                                        <th>:-</th>
                                        <td>09:00 to 09:10 PM</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" id="symptomscard">
                            <div class="prescription">
                              <div class="row"> 
                              <div class="col-md-3 col-sm-3"> 
                                  <label for="symptoms">Symptoms:-</label>
                              </div>
                              <div class="col-md-9 col-sm-9"> 
                                <textarea class="form-control" rows="5" id="symptoms" placeholder="Type Here..."></textarea>
                              </br>
                              <button type="button" class="btn btn-success btn-sm"> <i class="mdi mdi-note-plus btn-icon-prepend"></i>                                                    
                                Save Symptoms</button>
                              </div>
                             
                            </div>  
                            <br>
                            <div class="row"> 
                                <div class="col-md-3 col-sm-3"> 
                                    <label for="symptoms">Prescription:-</label>
                                </div>
                                <div class="col-md-9 col-sm-9"> 
                                  <textarea class="form-control" rows="5" id="symptoms" placeholder="Type Prescription Here..."></textarea>
                                </br>
                                  <button type="button" class="btn btn-success btn-sm"> <i class="mdi mdi-note-plus btn-icon-prepend"></i>                                                    
                                    Add</button>
                                </div>
                            </div>                        
                            </div>
     
                        </div>  
                      </div>
                      <div class="col-lg-4">
                          
                          <div class="card" id="previous-pre">
                              <h5 class="card-header">Previous Prescription</h5>
                              <div class="card-body" style="padding:0px !important">
                                  <div class="table-responsive">          
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Prescription</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>05-06-2019</td>
                                            <td>data</td>
                                            <td><a href="#myModaldelete" class="trigger-btn" data-toggle="modal" id="edit-Prescription"
                                              data-toggle="tooltip" class="tip-bottom" title="Edit Prescription">
                                              <i class="mdi mdi-lead-pencil " style="font-size: 25px"></i>
                                            </a>
                                              <a href="#myModaldelete" class="trigger-btn" data-toggle="modal" id="delete-Prescription"
                                              data-toggle="tooltip" class="tip-bottom" title="Delete Prescription">
                                              <i class="mdi mdi-delete " style="font-size: 25px"></i>
                                            </a></td>
      
                                          </tr>
                                        </tbody>
                                      </table>
                                      </div>
                              </div>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

      <!-- Modal Cancel Appointment HTML -->
      <div id="Modalcancelapp" class="modal fade">
          <div class="modal-dialog modal-confirm">
            <div class="modal-content">
              <div class="modal-header">
                <div class="icon-box">
                  
                </div>				
                <h4 class="modal-title">Cancel Appointment </h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="card" id="cancelappcard">
                      <div class="card-body">
                        <div class="row"> 
                        <div class="col-md-3 col-sm-3"> 
                            <label for="reason">Reason:-</label>
                        </div>
                        <div class="col-md-9 col-sm-9"> 
                          <textarea class="form-control" rows="5" id="reason" placeholder="Enter Reason Cancel Appointment..."></textarea>
                        </div>
                      </div>                          
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger btn-sm">Cancel Appointment</button>
              </div>
            </div>
          </div>
      </div>   

        <!-- Modal Delete HTML -->
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

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->

  <!-- datatable -->
  <script src="vendors/js/datatables.min.js"></script>


  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
  </script>

</body>

</html>
