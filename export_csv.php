<?php
	function createMysqlConnection()
	{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "employees";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			$conn->query('SET NAMES UTF8');
			return $conn;
	}
function export_departments_csv()
{

			$filName = "salaries_100000.txt";

			$objWrite = fopen("salaries_100000.txt", "w");


			$conn = createMysqlConnection();

			$sql = "SELECT *  FROM salaries LIMIT 100000";
			$result = $conn->query($sql);
			$departments = array();
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc())   //fetch_assoc() ดีงข้อมูลมา 1 row มาใส่ในตัวแปร row
			    {
			    	echo $row["emp_no"]."|".$row["salary"]."|".$row["from_date"]."|".$row["to_date"]."<br/>";
			    	$x = $row["emp_no"]."|".$row["salary"]."|".$row["from_date"]."|".$row["to_date"];
			    	$y = $x . PHP_EOL;
			    	fwrite($objWrite, $y);
			       
			    }
			} else {
			    echo "0 results";
			}
			//$stmt->close();
			fclose($objWrite);
			$conn->close();
			//return $customers;
	}
			export_departments_csv();


		

