<!DOCTYPE html> 
<html lang="en-US">
<head>
    <title>Twitter Bootstrap Admin</title>
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
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container top">

  <ul class="breadcrumb">
    <li>
      <a href=""><?php echo ucfirst($this->uri->segment(1));?></a> <span class="divider">/</span>
    </li>
    <li class="active">
      <?php echo ucfirst($this->uri->segment(2));?>
    </li>
  </ul>

  <div class="page-header users-header">
    <h2>
      <?php echo ucfirst($this->uri->segment(2));?> <a  href="" class="btn btn-success">Add a new</a>
    </h2>
  </div>
  

  
  <div class="row">
    <div class="span12 columns">
      <div class="well">
       
        <?php
       
        $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
       
        $options_manufacture = array(0 => "all");
        foreach ($manufactures as $row)
        {
          $options_manufacture[$row['id']] = $row['name'];
        }
        //save the columns names in a array that we will use as filter         
        $options_products = array();    
        foreach ($products as $array) {
          foreach ($array as $key => $value) {
            $options_products[$key] = $key;
          }
          break;
        }

        echo form_open('admin/products', $attributes);
 
          echo form_label('Search:', 'search_string');
          echo form_input('search_string', $search_string_selected);

          echo form_label('Filter by:', 'manufacture_id');
          echo form_dropdown('manufacture_id', $options_manufacture, $manufacture_selected, 'class="span2"');

          echo form_label('Order by:', 'order');
          echo form_dropdown('order', $options_products, $order, 'class="span2"');

          $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

          $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
          echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

          echo form_submit($data_submit);

        echo form_close();
        ?>

      </div>

      <table class="table table-striped table-bordered table-condensed">
        <thead>
          <tr>
            <th class="header">#</th>
            <th class="yellow header headerSortDown">Description</th>
            <th class="green header">Stock</th>
            <th class="red header">Cost Price</th>
            <th class="red header">Sell Price</th>
            <th class="red header">Manufacture</th>
            <th class="red header">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($products as $row)
          {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['stock'].'</td>';
            echo '<td>'.$row['cost_price'].'</td>';
            echo '<td>'.$row['sell_price'].'</td>';
            echo '<td>'.$row['manufacture_name'].'</td>';
            echo '<td class="crud-actions">
              <a href="" class="btn btn-info">view & edit</a>  
              <a href="" class="btn btn-danger">delete</a>
            </td>';
            echo '</tr>';
          }
          ?>      
        </tbody>
      </table>

      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

  </div>
</div>
  <div id="footer">
    <hr>
    <div class="inner">
      <div class="container">
        <p class="right">
          <a href="#">Back to top</a>
        </p>
        <p>
         
        </p>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
</body>
</html>
