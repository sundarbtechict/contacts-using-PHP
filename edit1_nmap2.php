<html>
	<body>
		<h3>Welcome!!!</h3><br>
		<?php
			
			//post the data from edit page to edit1 page
			$id=$_POST["id"];
		    $firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];		
			$age=$_POST["age"];		
			$dob=$_POST["dob"];
			$address=$_POST["address"];	
			$city=$_POST["city"];	
			$country=$_POST["country"];				
			$email=$_POST["email"];
			$mobile=array_values($_POST["mobile"]);
			$mobile_id=array_values($_POST["mobile_id"]);
			$n=count($mobile);
			
			// database configure variable
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass= "";
			// Create connection
			$conn = mysql_connect ($dbhost,$dbuser ,$dbpass);
			// Check connection
			if (!$conn)
				{
				die("Connection failed: " . mysql_connect_error());
			    }
			else 
				echo "connection found";
				
					
			//3.selecting DB(database)
			mysql_select_db('CONTACTS');
			
			//Assign Query into the variable
			$sql="UPDATE CONTACT
				 SET FIRSTNAME='$firstname',LASTNAME='$lastname',AGE='$age',DOB='$dob',ADDRESS='$address',CITY='$city',COUNTRY='$country',EMAIL_ID='$email'
				 WHERE CONTACT_ID=$id";
			
			
			 		
			//check the query is worked and it connect the query into the sql 
			if (mysql_query($sql,$conn))
			{
			echo "a";		
			}
			
			else
			{
				echo "Error: " . $sql . "<br>" . mysql_error($conn);
			}
			
			
				for($i=0;$i<$n;$i++)
				{
					
					 $sql3="UPDATE MOBILE 
					 SET NUMBER='$mobile[$i]'
					 WHERE MOBILE_ID='$mobile_id[$i]'";
								
					//check the query is worked
					if (mysql_query($sql3,$conn))
					{
						if($i==$n-1)
						{
							header("Location: show_nmap2.php");
							exit;
						}
					}
					else
					{
						echo "Error: " . $sql3 . "<br>" . mysql_error($conn);
					}
				}
			
			
			
			
			//8. Closing the DB Connection  *****IMPORTANT******
			mysql_close($conn);
			?>
	</body>
</html>