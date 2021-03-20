<?php
session_start();
if(!isset($_SESSION['Admin'])){
  //var_dump($_SESSION);
  header('Location: ../../../index.php');
}
require "../menus.php";
$pageName = 'User';
$level = "../../../";
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CommSys | <?php echo $pageName;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo $level;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $level;?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $level;?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $level;?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $level;?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $level;?>dist/css/skins/_all-skins.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo $level;?>dist/css/commsys.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php echo getHeader($level); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
      <?php echo getSideBar($pageName,$level);?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $pageName;?>
        <small>Manage Users Info</small>
      </h1>


    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-8">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Users Info</h3>
                <div class="box-tools">
                  <button class="btn btn-primary btn-sm" onclick="addUser()">Add New </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12">
                <table id="userTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              </div>
            </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-lg-4">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Roles</h3>
                <div class="box-tools">
                  <button class="btn btn-primary btn-sm" onclick="addRoles()">Add New </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12">
                <table id="rolesTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Role Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              </div>
            </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php echo getFooter();?>

</div>
<!-- ./wrapper -->

<!-- Modal -->
<div id="userAddEditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">

        <form class="modalForm" id="userForm">

            <div class="row">
              <div class="form-group col-md-12 actionRow">
                <input type="text" class="form-control" id="action" name="action" >
                <input type="text" class="form-control" id="id" name="id" >
              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
              </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Role</label>
                  <select class="form-control" id="type" name="type">
                  </select>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submit-btn" onclick="addUpdateUser()">Add New</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="rolesAddEditModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Role</h4>
      </div>
      <div class="modal-body">

        <form class="modalForm" id="rolesForm">
        <div class="row">
          <div class="form-group col-md-12 actionRow">
            <input type="text" class="form-control" id="action" name="action" >
            <input type="text" class="form-control" id="id" name="id" >
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Role Type</label>
            <input type="text" class="form-control" id="role_type" name="role_type" placeholder="Enter role type">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary  submit-btn" onclick="addUpdateRoles()">Add New</button>
      </div>

    </form>

    </div>

  </div>
</div>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo $level;?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $level;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $level;?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $level;?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $level;?>dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script>
     userDataTable = null;
     roleDataTable = null;
     $(document).ready(function() {
          getAllUsers();
          getAllRoles();
      } );
      function getAllUsers(){
        $.post("../../controller/user.php",{ 'action':'getUsers' },function(response) {
          var data = jQuery.parseJSON(response);
          //console.log(data);
          $.each(data, function(idx, user) {
              console.log(user);
              html = createUserRow(user);
              $('#userTable').find('tbody').append(html);
          });
          userDataTable = $('#userTable').DataTable();
        });
      }
      function createUserRow(user){
        html = '<tr id="user'+user['id']+'">';
        html += '  <td>'+user['fname']+' '+user['lname']+'</td>';
        html += '  <td>'+user['email']+'</td>';
        html += '  <td>'+user['type']+'</td>';
        html += ' <td> <button type="button" onclick="editUser('+user['id']+')"class="btn btn-box-tool"><i class="fa fa-edit fa-2x"></i></button>';
        html += '  <button type="button" onclick="removeUser('+user['id']+')" class="btn btn-box-tool"><i class="fa fa-remove  fa-2x"></i></button>';
        html += '  </td>';
        html += '</tr>';
        return html;
      }
      function addUser(){
         $("#userForm")[0].reset();
        modal = $('#userAddEditModal');
        $(modal).find('.modal-title').html('Add New User');
      $(modal).find('#action').val('addUsers');
        $(modal).find('.submit-btn').html('Add User');
        $('#userAddEditModal').modal('show');
      }
      function editUser(id){
        $.post("../../controller/user.php",{ 'action':'getUsersById','id':id },function(response) {
          var user = jQuery.parseJSON(response);
          //console.log(user);
          modal = $('#userAddEditModal');
          modal.find('.modal-title').html('Edit User');
          modal.find('#action').val('editUsers');
          modal.find('.submit-btn').html('Update User');
          modal.find('#id').val(user['id']);
          modal.find('#fname').val(user['fname']);
          modal.find('#lname').val(user['lname']);
          modal.find('#password').val(user['password']);
          modal.find('#email').val(user['email']);
          modal.find('#type').val(user['type']);
          $('#userAddEditModal').modal('show');
        });
      }
      function addUpdateUser(){
        var formdata = $("#userForm").serializeArray();
             console.log(formdata);
              $.post("../../controller/user.php", $.param(formdata), function(response) {
                user = JSON.parse(response);
                console.log(user);
                user['type'] = $('#userAddEditModal').find("#type option:selected").text();
                console.log(user);
                if(formdata[0]['value']=='addUsers'){
                    addRowToUserTable(user,false);
                }
                else{
                    addRowToUserTable(user,true);
                }
                modal = $('#userAddEditModal');
                modal.modal('hide');
              });
      }
      function addRowToUserTable(user,isUpdate){
        html = createUserRow(user);
        userDataTable.destroy();
        if(isUpdate)
          $('#user'+user['id']).remove();
        $('#userTable').find('tbody').append(html);
        userDataTable = $('#userTable').DataTable();
      }
      function removeUser(id){
        var formdata = $('.modalForm').serialize();
        $.post("../../controller/user.php",{ 'action': 'deleteUsers','id':id },function(response) {
          data = JSON.parse(response);
            if(data['status']==true){
              $('#user'+id).remove();
            }
        });
      }



      ///////// ROLES FUNCTIONS
      function getAllRoles(){
        $.post("../../controller/roles.php",{ 'action':'getRoles' },function(response) {
          var data = jQuery.parseJSON(response);
          //console.log(data);
          $.each(data, function(idx, roles) {
            console.log('roles',roles);
              html = createRolesRow(roles);
              $('#userAddEditModal').find('#type').append('<option value="'+roles['id']+'">'+roles['role_type']+'</option>');
              $('#rolesTable').find('tbody').append(html);
          });
          roleDataTable = $('#rolesTable').DataTable( {"order": [[ 1, "asc" ]]} );
        });
      }



      function createRolesRow(roles){
        html = '<tr id="roles'+roles['id']+'">';
        html += '  <td>'+roles['role_type']+'</td>';
        html += '  <td>';
        if(roles['role_type']!='Admin' && roles['role_type']!='Unit Owner'){
          html += '  <button type="button" onclick="editRoles('+roles['id']+')"class="btn btn-box-tool"><i class="fa fa-edit fa-2x"></i></button>';
          html += '  <button type="button" onclick="removeRoles('+roles['id']+')" class="btn btn-box-tool"><i class="fa fa-remove  fa-2x"></i></button>';
        }
        else{
          html += '<small class="label bg-red">Default Roles</small>';
        }
        html += '  </td>';
        html += '</tr>';
        return html;
      }
      function addRoles(){
         $("#rolesForm")[0].reset();
        modal = $('#rolesAddEditModal');
        $(modal).find('.modal-title').html('Add New Role');
      $(modal).find('#action').val('addRoles');
        $(modal).find('.submit-btn').html('Add Roles');
        $('#rolesAddEditModal').modal('show');
      }
      function editRoles(id){

        $.post("../../controller/roles.php",{ 'action':'getRolesById','id':id },function(response) {
          var role = jQuery.parseJSON(response);
          console.log('role=',role);
          modal = $('#rolesAddEditModal');
          modal.find('.modal-title').html('Edit Role');
          modal.find('#action').val('editRoles');
          modal.find('.submit-btn').html('Edit Role');
          modal.find('#id').val(role['id']);
          modal.find('#role_type').val(role['role_type']);
          $('#rolesAddEditModal').modal('show');
        });

      }
      function addUpdateRoles(){

        var formdata = $("#rolesForm").serializeArray();
              console.log(formdata);
              $.post("../../controller/roles.php", $.param(formdata), function(response) {

                console.log(response);
                data = JSON.parse(response);
                console.log(data);
                if(formdata[0]['value']=='addRoles'){
                    addRowToRolesTable(data,false);
                }
                else{
                    addRowToRolesTable(data,true);
                }

                modal = $('#rolesAddEditModal');
                modal.modal('hide');
              });

      }



      function addRowToRolesTable(data,isUpdate){

        html = createRolesRow(data);
        roleDataTable.destroy();
        if(isUpdate){
          $('#userAddEditModal').find('#type').find('[value='+data['id']+']').remove();
          $('#roles'+data['id']).remove();
        }
        $('#userAddEditModal').find('#type').prepend('<option value="'+data['id']+'">'+data['role_type']+'</option>');
        $('#rolesTable').find('tbody').append(html);
        roleDataTable = $('#rolesTable').DataTable( {"order": [[ 1, "asc" ]]} );

      }

      function removeRoles(id){
        var formdata = $('.modalForm').serialize();
        $.post("../../controller/roles.php",{ 'action': 'deleteRoles','id':id },function(response) {
          data = JSON.parse(response);
            if(data['status']==true){
              $('#roles'+id).remove();
            }
        });
      }
     </script>
</body>
</html>
