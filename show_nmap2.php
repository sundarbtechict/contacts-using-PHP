<html>
	<head>
		<style>
			body 
			{
                  background-image:url(aaaa.gif);
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
				border-collapse: collapse;
			}

			th, td 
			{
				padding: 15px;
				width: 60%;
				text-align:left;
			}

			tr:nth-child(odd){background-color: MistyRose}
			tr:nth-child(even){background-color: OldLace }

			th 
			{
				background-color:Tan;
				color: Indigo;
			}		
			div 
			{
			background-color: tan;
			width: 500px;
			border: 7px groove Indigo;
			padding: 3px;
			margin-left: 400px;
			}
			
		</style>
	</head>
	<title>Contacts</title>
	<body>
		<h1>contacts</h1>
		<br><br><br>
		
		<?php	
			// database configure _variable
			$dbhost = 'localhost';
			$dbuser = 'root';
			$dbpass= "";
			
			
			// 1.Create connection
			$conn = mysql_connect ($dbhost,$dbuser ,$dbpass);
			
			
			// 2.Check connection						
			if (!$conn)
				{
				die("Connection failed: " . mysql_connect_error());			    
			    }
				
			  
				
			//3.selecting DB(database)
			mysql_select_db('CONTACTS');
			
			//4.Assign Query into the variable 
			$sql='SELECT * FROM CONTACT';
				  
			//5.Assign result of the  query into variable 
			$resultset=mysql_query( $sql, $conn );  //It gives only the '1st row pointer'
			
			
			
			//6.check the data(row) 
			if($resultset)
			{		
			echo "<div><table>
						<tr>
							<th>firstname</th>
							<th>lastname</th>
							<th style=margin-right:0px;>view</th>
						</tr>";
						
			//7. Getting Each Row --till row available		
						// 7.1. $resultSet [1st row pointer]  --> row data --> $row
						// 7.2. Changing the pointer next row  $resultSet[2nd row pointer]
			while($row = mysql_fetch_array($resultset, MYSQL_ASSOC))
			{
			$ID=$row['CONTACT_ID'];
			echo 	"<tr>
					 <td>{$row['FIRSTNAME']}</td>
					 <td>{$row['LASTNAME']}</td>
					 <td style=margin-right:0px;><a href=http://localhost:8080/sundar/new/view_nmap2.php?id={$row['CONTACT_ID']}>	&#8942;</a></td>
					 </tr>";
					 
					 }
			echo "</table></div>";
			mysql_free_result($resultset);
			}
			// if data(row) is empty
			else 
			echo "empty record";
			
			
			
			
		   echo "<br><a href=insert1_nmap2.php><h3 style=text-align:center;>create new</h3></a>";

			//8. Closing the DB Connection  *****IMPORTANT******
			mysql_close($conn);
			?>
	</body>
</html>
					 
			
					 
	
</html>	