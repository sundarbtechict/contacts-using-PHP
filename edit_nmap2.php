<html>
	<head>
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
					padding:20px;
					width: 40%;
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
		<h3 style="text-align:center" >Edit your details:</h3>

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
			
				echo
					"<form action=edit1_nmap2.php method=post>
					<input type=hidden name=id value={$id}>
					<p class=box>
					<table>
						<tr>
							<th>
							 First name:
							 </th>
							 <td>
							 <input type=text name=firstname value={$row['FIRSTNAME']}>
							 </td>
						</tr>
						<tr>
							 <th>
							 last name:
							 </th>
							 <td>							 
							 <input type=text name=lastname value={$row['LASTNAME']}>
							 </td>
						</tr>
						<tr>
							<th>
							Age:
							</th>
							<td>
					        <input type=number name=age value={$row['AGE']}>
							</td>
						</tr>
						<tr> 
							<th>
							Date-Of-Birth:
							</th>
							<td>
					        <input type=date name=dob value={$row['DOB']}>
							</td>
						</tr>
						<tr>
							<th>
							Address:
							</th>
							<td>
							<input type=text name=address value={$row['ADDRESS']}>
							</td>
						</tr>
						<tr>
							<th>
							City:
							</th>
							<td>
							<input type=text name=city value={$row['CITY']}>
							</td>
						</tr>
						<tr>
							<th>
					        Country:
							</th>
							<td>
					        <input type=text name=country value={$row['COUNTRY']}>
							</td>
						</tr>
						<tr>
							<th>
							Email Id:
							</th>
							<td>
					        <input type=email name=email value={$row['EMAIL_ID']}>
							</td>
						</tr>
						<tr>
							 <th>
							 Mobile:
							 </th>
							 <td>";
					 
					 $sql2="SELECT * FROM MOBILE WHERE CONTACT_ID=$id";
			
									$resultset2=mysql_query( $sql2, $conn );
									if ($resultset2)
										{
											$i=0;
											while($row2 = mysql_fetch_array($resultset2, MYSQL_ASSOC))
												{
													echo "<input type=number name=mobile[] value={$row2['NUMBER']}>
														  <input type=hidden name=mobile_id[] value={$row2['MOBILE_ID']}><br><br>";
													$i++;
												}
											mysql_free_result($resultset2);                                                                                                                                                                                                                                                                                            
										}
							}
							
							mysql_free_result($resultset);
					 }
						echo
							"</td>
							</tr>
							</table>
							</p>
							<p style=text-align:center;><input type=submit value=Edit></p>
					</form>";
				
		?>
	</body>
</html>