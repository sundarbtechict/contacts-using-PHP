<html>	
	<head>
		<style>
			 body 
				{
					 background-image:url("cccc.jpg"); 
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
					padding:20px;
					width: 40%;
					text-align:left;
				}
				div
				{	
					margin-left: 150px;	
				}
		</style>
	</head>
	<title>contacts</title>
	<body>
		<h1>contacts</h1><br>
		<h3>your details are here:</h3>
		
		<?php
			
			
			// get the data from show page and aasign into another variable
			$id=$_GET['id'];
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
			$sql="SELECT * FROM CONTACT WHERE CONTACT_ID=$id";
			
			//5.Assign result of the  query into variable 
			$resultset=mysql_query( $sql, $conn );  //It gives only the '1st row pointer'
			
			
			
			//6.check the data(row) 
			if($resultset)
			{
			
			//7. Getting Each Row --till row available		
						// 7.1. $resultSet [1st row pointer]  --> row data --> $row
						// 7.2. Changing the pointer next row  $resultSet[2nd row pointer]
			while($row = mysql_fetch_array($resultset, MYSQL_ASSOC))
			{
			
			echo "<table>
						<tr>
									<th>FIRSTNAME:</th>
									<td>{$row['FIRSTNAME']}</td>
						</tr>
						<tr>
									<th>LASTNAME:</th>
									<td>{$row['LASTNAME']}</td>
						</tr>
						<tr>
									<th>AGE:</th>
									<td>{$row['AGE']}</td>
						</tr>
						<tr>									
									<th>DOB:</th>
									<td>{$row['DOB']}</td>
						</tr>
						<tr>								
									<th>ADDRESS:</th>
									<td>{$row['ADDRESS']}</td>
						</tr>
						<tr>									
									<th>CITY:</th>
									<td>{$row['CITY']}</td>
						</tr>
						<tr>									
									<th>COUNTRY:</th>
									<td>{$row['COUNTRY']}</td>
						</tr>
						<tr>									
									<th>EMAIL_ID:</th>
									<td>{$row['EMAIL_ID']}</td>
						</tr>
						<tr>									
									<th>MOBILE:</th>
									<td>";
									$sql2="SELECT * FROM MOBILE WHERE CONTACT_ID=$id";
			
									$resultset2=mysql_query( $sql2, $conn );
									if ($resultset2)
										{
											$i=0;
											while($row2 = mysql_fetch_array($resultset2, MYSQL_ASSOC))
												{
													echo $row2['NUMBER']."<br>";
													$i++;
												}
											mysql_free_result($resultset2);                                                                                                                                                                                                                                                                                            
										}
							}
							
							mysql_free_result($resultset);
						echo	"</td>
									
						</tr>
						<tr>
						<td><a href=http://localhost:8080/sundar/new/edit_nmap2.php?id={$id}> Edit </a></td>
						<td><a href=http://localhost:8080/sundar/new/delete_nmap2.php?id={$id}> Delete</a></td>
						</tr>
						</table>
						<div><a href=http://localhost:8080/sundar/new/show_nmap2.php>Back</a></div>";
						}
						
						// if data(row) is empty
						else 
						echo "empty record";
								
			
		?>
	</body>
</html>