<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" type="image/png" href="./libs/images/favicon.ico">
  <link href="libs/css/styles.css" rel='stylesheet' type='text/css' media="all">
  <link href="vendors/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="vendors/fontawesome-free-5.15.3-web/css/all.css" />
  <link rel="stylesheet" href="vendors/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="./libs/images/favicon-16x16.png" type="image/x-icon">
  <link rel="shortcut icon" href="./libs/images/favicon-32x32.png" type="image/x-icon">
  <link rel="manifest" href="./libs/images/site.webmanifest">
  <link rel="apple-touch-icon" href="./libs/images/apple-touch-icon.png">
  <link rel="stylesheet" href="vendors/css/sweetalert2.min.css">

  <title>Company Directory</title>
</head>

<body>
  <div class="container">
    <!--header start-->
    <?php include('header.php'); ?>
    <!--header end-->

    <!-- Main Section Start-->
    <section class="py-lg-4 py-md-3 py-sm-3 py-3">
      <!-- Get data dynamically on cards -->
      <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
        <div class="row-employeeData-container"></div>
    </section>
    <!-- Main Section End-->


    <!-- Update Personnel Pop up Modal Start -->
    <div class="modal fade" id="updEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="#">Update Employee Record</h3>
            <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="#">ID</label>
                <input type="text" class="form-control" id="empid" aria-describedby="empid" readonly>
              </div>
              <div class="form-group">
                <label for="#">First Name</label>
                <input type="text" class="form-control" id="firstname" aria-describedby="firstname">
              </div>
              <div class="form-group">
                <label for="#">Last Name</label>
                <input type="text" class="form-control" id="lastname" aria-describedby="lastname">
              </div>
              <div class="form-group">
                <label for="#">Job Title</label>
                <input type="text" class="form-control" id="jobtitle" aria-describedby="jobtitle" placeholder="Enter Job Title">
              </div>
              <div class="form-group">
                <label for="#">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email">
              </div>
              <div class="form-group" id="updDepartment">
                <label>Department</label>
                <select id='department' class='form-control'>
                </select>
                <!-- <input type="text" class="form-control" id="department" aria-describedby="department"> -->
              </div>
              <div class="form-group" id="updLocation">
                <label>Location</label>
                <select id='location' class='form-control'>
                </select>
                <!-- <input type="text" class="form-control" id="location" aria-describedby="location"> -->
              </div>
              <button type="submit" id="updateEmp" class="btn btn-primary">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button id='closeModal' type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Update Personnel Pop up Modal End -->

    <!-- Add Personnel Details Pop up Modal Start -->
    <div class="modal fade" tabindex="-1" role="dialog" id="AddEmployee" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="#">Add Employee Record</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">

                <input type="text" class="form-control" id="emp_firstname" value="" placeholder="First Name">
                <br>
                <input type="text" class="form-control" id="emp_lastname" value="" placeholder="Last Name">
                <br>
                <input type="text" class="form-control" id="emp_jobTitle" value="" placeholder="Job Title">
                <br>
                <input type="text" class="form-control" id="emp_email" value="" placeholder="Email">
                <br>
                <select id="dept" class='form-control'>
                </select>
                <br>
                <select id="loc" class='form-control'>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" id="addEmployee">Add</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Personnel Details Pop up Modal End -->

    <!-- Add Department Details Pop up Modal Start -->
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="AddDepartment">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Add Department</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="#">Department</label>
                <input type="text" class="form-control" id="departmentAdd" value="" placeholder="Add New Department Name">
                <br>
                <select id="loca" class='form-control'>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" id="addDepartment">Add</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Department Details Pop up Modal End  -->

    <!-- Update Department Details Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="UpdateDepartment">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Update Department</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <select id="prevDept" class='form-control'>
                </select>
                <br>
                <input type="text" class="form-control" id="newDept" value="" placeholder="Update Department Name">
                <br>
              </div>
              <button type="submit" class="btn btn-primary" id="updateDepartment">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Update Department Details Pop up Modal End  -->

    <!-- Delete Department Details Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="DeleteDepartment">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Delete Department</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <select id="deleteDept" class='form-control'>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" id="deleteDepartment">Delete</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete Department Details Pop up Modal End  -->

    <!-- Add Location Details Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="AddLocation">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Add Location</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="#">Location</label>
                <input type="text" class="form-control" id="locationAdd" value="" placeholder="Add New Location Name">
              </div>
              <button type="submit" class="btn btn-primary" id="addLocation">Add</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Location Details Pop up Modal End  -->

    <!-- Update Location Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="UpdateLocation">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Update Location</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <select id="prevLocation" class='form-control'>
                </select>
                <br>
                <input type="text" class="form-control" id="newLocation" value="" placeholder="Update Location Name">
              </div>
              <button type="submit" class="btn btn-primary" id="updateLocation">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Update Location Details Pop up Modal End  -->

    <!-- Delete Location Details Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="DeleteLocation">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Delete Location</h3>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <select id="deleteLoc" class='form-control'>
                </select>
              </div>
              <button type="submit" class="btn btn-primary" id="deleteLocation">Delete</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete Location Details Pop up Modal End -->

    <script type="application/javascript" src="vendors/js/jquery-3.6.0.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="libs/js/script.js"></script>
    <script type="application/javascript" src="vendors/js/scrolls.js"></script>
    <script type="text/javascript">
      scroller.init();
    </script>
    <script src="vendors/js/sweetalert2.all.min.js"></script>
</body>

</html>