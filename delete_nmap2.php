<html>
	<body>
		<h3>Welcome!!!</h3><br>
		<?php
			
					
			$Id = $_GET['id'];
			
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
			    
							
			//selecting DB(database)
			mysql_select_db('CONTACTS');
			//Assign Query into the variable
			$sql="DELETE FROM MOBILE
				 WHERE CONTACT_ID='$Id'";
			
			//check the query is worked			
			if (mysql_query($sql,$conn))
			{
			echo"b";
			
			}
			
			else		
			{
				echo "Error: " . $sql . "<br>" . mysql_error($conn);
			}
			
			//Assign Query into the variable
			$sql="DELETE FROM CONTACT		 
				 WHERE CONTACT_ID='$Id'";
				 
				 
			//check the query is worked			
			if (mysql_query($sql,$conn))			
			{	 
				header("Location: show_nmap2.php");
                 exit;
			
			} 
			else
			{
				echo "Error: " . $sql . "<br>" . mysql_error($conn);
			}
			//8. Closing the DB Connection  *****IMPORTANT******
			mysql_close($conn);
			?>
	</body>
</html>