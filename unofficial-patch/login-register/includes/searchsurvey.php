<!DOCTYPE html>
<html>
<head>
<title>ajax example</title>
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
<style>
.container{
	width:70%;
	height:30%;
	padding:20px;
}
</style>
</head>

<body>
	<div class="container">
	<h3><u>PHP MySQL search database and display results</u></h3>
	<br/><br/>
	<form class="form-horizontal" action="#" method="post">
	<div class="row">
		<div class="form-group">
		    <label class="control-label col-sm-4" for="email"><b>Search Employee Information:</b>:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="search" placeholder="search here">
		    </div>
		    <div class="col-sm-2">
		      <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
		    </div>
		</div>
		<div class="form-group">
			<span class="error" style="color:red;">* <?php echo $searchErr;?></span>
		</div>
		
	</div>
    </form>
	<br/><br/>
	<h3><u>Search Result</u></h3><br/>
	<div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Survey Code</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Start Date Time</th>
	        <th>End Date Time</th>
			<th>UserID<th>
			<th>StatusID<th>
			<th>Time Stamp<th>
	      </tr>
	    </thead>
	    <tbody>
	    		<?php
		    	 if(!$surveys)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
		    	 	foreach($surverys as $key=>$value)
		    	 	{
		    	 		?>
		    	 	<tr>
		    	 		<td><?php echo $key+1;?></td>
		    	 		<td><?php echo $value['Name'];?></td>
		    	 		<td><?php echo $value['phone_no'];?></td>
		    	 		<td><?php echo $value['age'];?></td>
		    	 		<td><?php echo $value['department'];?></td>
		    	 	</tr>
		    	 		
		    	 		<?php
		    	 	}
		    	 	
		    	 }
		    	?>
	    	
	     </tbody>
	  </table>
	</div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>