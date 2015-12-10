<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Directions API</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("form").submit(function(){
				$.post($(this).attr("action"),
					   $(this).serialize(),
					   function(directions){
					   		console.log(directions);
					   		
						    if(directions.status == "OK")
						    {
						   		$("h3").html("Directions from " + directions.routes[0].legs[0].start_address + " to " + directions.routes[0].legs[0].end_address);
						   		$("#directions").html(" ");

						   		for (var i = 0; i < directions.routes[0].legs[0].steps.length; i++) 
						   		{
						   			$("#directions").append("<p>"+ (i+1) +"). " + directions.routes[0].legs[0].steps[i].html_instructions + "</p>");
						   		};
						    }
						    else
						   		alert('Cannot get direction!');

					   }, "json" );

				return false;
			})
		});
	</script>
</head>
<body>
	<form action="/maps/direction" method="post">
		<label>From: </label>
		<input type="text" name="origin">

		<label>To: </label>​
		<input type="text" name="destination">

		<input type="submit" value="Get directions!">
	</form>
	<h3></h3>
	<div id="directions"></div>
</body>
</html>