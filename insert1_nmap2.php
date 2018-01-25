<html>
	<head>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
		<style>
			body 
			{
                  background-image:url("dddd.jpg");
				  color:Indigo;
			}
			h1
			{
				border-style:inset;
				text-align: center;
				color:Indigo;
				border-color: Indigo;
				background-color: Tan ;
			}
			table
			{
				padding:25px;
				width: 30%;
				text-align:left;
			}
			p.box
			{
			background-color: GhostWhite ;
			width: 500px;
			border: 7px groove Indigo;
			padding: 6px;
			margin-left: 400px;
			}
		</style>
	</head>
	<title>contacts</title> 
	<body>
	<h1>contacts</h1><br>
	<h3 style="text-align:center";>Enter your details here:</h3>
	  <div id="main">
		<form role="form" action="insert2_nmap2.php" method="post">
		<p class="box">
		<table>
			<tr>
				<th>
				 Name:
				 </th>
				 <td>
				 </td>
			 </tr>
			 <tr>
				 <td>
				  <input type="text" name="firstname" value="Firstname">
				 </td>
				 <td>
				 <input type="text" name="lastname" value="Lastname">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Age:
				 </th>
				 <td>
				 <input type="number" name="age">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Date-Of-Birth:
				 </th>
				 <td>
				 <input type="date" name="dob">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Address:
				 </th>
				 <td>
				 <input type="text" name="address">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 City:
				 </th>
				 <td>
				 <input type="text" name="city">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Country:
				 </th>
				 <td>
				 <input type="text" name="country" value="India">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Email Id:
				 </th>
				 <td>
				 <input type="email" name="email">
				 </td>
			 </tr>
			 <tr>
				 <th>
				 Mobile:
				 </th>
				 <td>
				 <div class="my-form">
				 <p class="text-box">
				 <input type="number" name="mobile[]" value="" id="mobile1">
				 </p>
				 <a class="add-box" href="#">Add More</a>
				 </div>
				 </td>
			 </tr>
			 </table>
			 </p>
			 <p style="text-align:center"><input type="submit" value="Submit">
		</form>
		 </div>
    </div>
		<script type="text/javascript">
					jQuery(document).ready(function($){
						$('.my-form .add-box').click(function(){
							var n = $('.text-box').length + 1;
							if( 5 < n ) {
								alert('Stop it!');
								return false;
							}
							var box_html = $('<p class="text-box"><input type="text" name="mobile[]" value="" id="mobile1' + n + '" /> <a href="#" class="remove-box">Remove</a></p>');
							box_html.hide();
							$('.my-form p.text-box:last').after(box_html);
							box_html.fadeIn('slow');
							return false;
						});
						$('.my-form').on('click', '.remove-box', function(){
							$(this).parent().css( 'background-color', '#FF6C6C' );
							$(this).parent().fadeOut("slow", function() {
								$(this).remove();
							});
							return false;
						});
					});
		</script>
	</body>
</html>