<?php
//session_start();
function getHeader($level){
  $html = '  <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">

      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a <button onclick="logoutt()" class="btn btn-primary btn-flat">Sign out</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>';
    return $html;
}

function getSideBar($pageName,$level){
  $html = '    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="min-height: 70px;">
          <div class="pull-left info" style="left: 20px;">
            <p>'.$_SESSION['admin']['email'].'</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>';

          $class = ($pageName=='Dashboard') ? 'active' : '';
          $html .= '<li class="'.$class.'"><a href="'.$level.'admin/view/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>';

          $class = ($pageName=='Profile') ? 'active' : '';
          $html .= '<li class="'.$class.'"><a href="'.$level.'admin/view/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>';

          $html .= '</ul>
      </section>';
      return $html;
}


function getFooter(){
  $html = '<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>D Poland   V</b> 1.0.0
    </div>
    <strong>System Developed By <a href="https://one.com"> D Poland</a></strong> ()
  </footer>';
  return $html;
}

?>
