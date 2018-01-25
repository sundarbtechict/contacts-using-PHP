
<html>
	<body>
		<?php
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];		
		$age=$_POST["age"];	
		$dob=$_POST["dob"];	
		$address=$_POST["address"];	
		$city=$_POST["city"];	
		$country=$_POST["country"];	
		$email=$_POST["email"];
		$mobile=array_values($_POST["mobile"]);
		$n=count($mobile);
		
		//database configure into variable
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
				
			//selecting DB(database)	
			mysql_select_db('CONTACTS');
			
			
			//Assign Query into the variable AND it's for first table(insert)
			$sql = "INSERT INTO CONTACT (FIRSTNAME,LASTNAME,AGE,DOB,ADDRESS,CITY,COUNTRY,EMAIL_ID) 
			        VALUES ('$firstname','$lastname','$age','$dob','$address','$city','$country','$email')";
			
			//check the query is worked
			if (mysql_query($sql,$conn))
			{
			echo "a";
			
			
			}	
			else
			{
				echo "Error: " . $sql . "<br>" . mysql_error($conn);
			}
			
			
			//get the auto_increment value and assign into the variable
			$ID= mysql_insert_id();
			
			//Insert for second table 
				//Assign Query into the variable 
				for($i=0;$i<$n;$i++)
				{
					echo $mobile[$i]."<br>";
					$sql="INSERT INTO MOBILE (CONTACT_ID,NUMBER) VALUES ('$ID',$mobile[$i])";
					if(mysql_query($sql,$conn))
					{
						if($i==$n-1)
						{
							header("Location:show_nmap2.php");
							exit;
						}
					}
					else
					{
						echo "Error1: " . $sql1 . "<br>" . mysql_error($conn);
					}
				}
				
		
			//check the query is worked
			
			
			
			//8. Closing the DB Connection  *****IMPORTANT******
			mysql_close($conn);
			?>
	</body>
</html>