<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>CodeIgniter Admin Sample Project</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a href="dashboard.html" class="brand">Project Name</a>
	      <ul class="nav">
	        <li>
	          <a href="dashboard.html">Dashboard</a>
	        </li>
	        <li class="active">
	          <a href="list.html">Products</a>
	        </li>
	      
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="#">Change e-mail</a>
	            </li>
	            <li>
	              <a href="#">Change password</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	