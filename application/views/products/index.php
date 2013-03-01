<?php
//echo $manufacture_selected;
    //data use with code igniter library to build our form
    $attributes = array('class' => 'email', 'id' => 'myform');
    $hidden_data = array(
		'name'  => 'John Doe',
		'email' => 'john@example.com',
		'url'   => 'http://example.com'
    );

    //create array to save the filter data
	$options = array(0 => "all");

    //loop the data sent by the controller and populate the filter array

	foreach ($manufactures as $row)
	{
	  /* "id" => "name", */	
	  $options[$row['id']] = $row['name'];
	}

    //use form code igniter library to build our form
    echo form_open('products', $attributes);
	    echo form_hidden($hidden_data);
	    echo form_label('Filter your data', 'filter');
	    echo form_dropdown('manufacture_id', $options, $manufacture_selected);
	echo form_submit('mysubmit', 'Send!');
	echo form_close();

	echo '<table border="1">'; 

		echo '<thead>';
			echo '<tr>';
				echo '<td>Id</td>';
				echo '<td>Description</td>';
				echo '<td>Stock</td>';
				echo '<td>Cost Price</td>';
				echo '<td>Sell Price</td>';
				echo '<td>Manufacuture id</td>';
				echo '<td>View Details</td>';
			echo '<tr>';
		echo '</thead>';
	
		foreach ($products as $row)
		{
		echo '<tbody>';				
			echo '<tr>';
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['description'].'</td>';
				echo '<td>'.$row['stock'].'</td>';
				echo '<td>'.$row['cost_price'].'</td>';
				echo '<td>'.$row['sell_price'].'</td>';
				echo '<td>'.$row['manufacture_id'].'</td>';
				echo '<td><a href="products/'.$row['id'].'"><button>View</button></a></td>';
			echo '<tr>';
		echo '</tbody>';				
		}
		echo "</table>"; 

	echo '</table>';		
   
?>

