<?php
	function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}
	function getDataFromtextfile_explode($file_name)
	{
		ini_set('memory_limit', '-1');
		$file_get = file_get_contents($file_name, FILE_USE_INCLUDE_PATH);
		$lines = explode("\n", $file_get);
		for($i = 0;$i<count($lines);$i++)
		{
			$kum[$i] = explode("|", $lines[$i]);
		}
			return $kum;
	}	
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
	function write_mysql_departments()
	{
			$data = getDataFromtextfile_explode("departments.txt");
			$data = array_slice($data, 0, count($data)-1);
			print_r($data);
			echo $data[0][0]."                ".$data[0][1];
			//$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < count($data); $i++)
            	{
					$sql = "INSERT INTO departments (dept_no, dept_name)
					VALUES ('".$data[$i][0]."', '".$data[$i][1]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			//$time_end = microtime_float();
			//$time = $time_end - $time_start;
			//echo "insert only $time seconds\n";
	}	
	function write_mysql_dept_emp()
	{
			$data = getDataFromtextfile_explode("dept_emp.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			//$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < count($data); $i++)
            	{
					$sql = "INSERT INTO dept_emp (emp_no, dept_no,from_date,to_date)
					VALUES ('".$data[$i][0]."', '".$data[$i][1]."', '".$data[$i][2]."', '".$data[$i][3]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			//$time_end = microtime_float();
			//$time = $time_end - $time_start;
			//echo "insert only $time seconds\n";
	}	
	function write_mysql_dept_manager()
	{
			$data = getDataFromtextfile_explode("dept_manager.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			//$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < count($data); $i++)
            	{
					$sql = "INSERT INTO dept_manager (dept_no,emp_no,from_date,to_date)
					VALUES ('".$data[$i][0]."', '".$data[$i][1]."', '".$data[$i][2]."', '".$data[$i][3]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			//$time_end = microtime_float();
			//$time = $time_end - $time_start;
			//echo "insert only $time seconds\n";
	}	
	function write_mysql_employees()
	{
			$data = getDataFromtextfile_explode("employees.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			//$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < 100; $i++)
            	{
					$sql = "INSERT INTO employees (emp_no,birth_date,first_name,last_name,gender,hire_date)
					VALUES ('".$data[$i][0]."','".$data[$i][1]."','".$data[$i][2]."','".$data[$i][3]."','".$data[$i][4]."','".$data[$i][5]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			//$time_end = microtime_float();
			//$time = $time_end - $time_start;
			//echo "insert only $time seconds\n";
	}	
	function write_mysql_salaries()
	{
			$data = getDataFromtextfile_explode("salaries_1000000.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < 10000; $i++)
            	{
					$sql = "INSERT INTO salaries (emp_no,salary,from_date,to_date)
					VALUES ('".$data[$i][0]."', '".$data[$i][1]."', '".$data[$i][2]."', '".$data[$i][3]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "insert salaries only $time seconds\n";
	}
	function write_mysql_multiple_salaries()
	{
			$data = getDataFromtextfile_explode("salaries_1000000.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			$count = 0;
			$sql = "INSERT INTO salaries (emp_no,salary,from_date,to_date)
					VALUES ('".$data[$count][0]."', '".$data[$count][1]."', '".$data[$count][2]."', '".$data[$count][3]."')";
            	for($i = 1; $i <100000; $i++)
            	{
					
						$count++;
						$sql .= ",('".$data[$count][0]."', '".$data[$count][1]."', '".$data[$count][2]."', '".$data[$count][3]."')";
						
				}
					//echo "<br/>"."command:".$sql;
						if ($conn->query($sql) === TRUE) 
						{
						    
						} 
						else 
						{
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
						
					
				

				$conn->close();
				
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "insert salaries only $time seconds\n";
	}		
	function write_mysql_titles()
	{
			$data = getDataFromtextfile_explode("titles.txt");
			$data = array_slice($data, 0, count($data)-1);
			//print_r($data);
			/*for($i = 0; $i < count($data); $i++)
            {
				echo $data[$i][0]."|".$data[$i][1]."|".$data[$i][2]."|".$data[$i][3]."<br/>";
			}*/
			//$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
            	for($i = 0; $i < 100; $i++)
            	{
					$sql = "INSERT INTO titles (emp_no,title,from_date,to_date)
					VALUES ('".$data[$i][0]."', '".$data[$i][1]."', '".$data[$i][2]."', '".$data[$i][3]."')";

					if ($conn->query($sql) === TRUE) 
					{
					    
					} 
					else 
					{
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				$conn->close();
			//$time_end = microtime_float();
			//$time = $time_end - $time_start;
			//echo "insert only $time seconds\n";
	}	
	function read_mysql_command1()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
	
		    $sql = "SELECT * FROM employees WHERE gender = 'M'";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "employees: " . $row["emp_no"]."|". $row["birth_date"]."|".$row["first_name"]."|".$row["last_name"]."|".$row["gender"]."|".$row["hire_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command2()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
	
		    $sql = "SELECT * FROM salaries LIMIT 10000";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "salaries: " . $row["emp_no"]."|". $row["salary"]."|".$row["from_date"]."|".$row["to_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command3()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no = b.dept_no";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "dept_emp: " . $row["emp_no"]."|". $row["dept_no"]."|".$row["dept_name"]."|".$row["from_date"]."|".$row["to_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command4()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT * FROM dept_emp WHERE emp_no='10021'";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "dept_emp: " . $row["emp_no"]."|". $row["dept_no"]."|".$row["from_date"]."|".$row["to_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command5()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT a.dept_name,b.emp_no
					FROM departments AS a , dept_manager AS b 
					WHERE a.dept_no=b.dept_no;";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "dept_emp: " . $row["dept_name"]."|". $row["emp_no"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command6()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT a.dept_name,b.emp_no,c.first_name,c.last_name
					FROM departments AS a INNER JOIN dept_manager AS b 
					ON a.dept_no = b.dept_no INNER JOIN employees AS c ON b.emp_no = c.emp_no;";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "dept_emp: " . $row["dept_name"]."|". $row["emp_no"]."|". $row["first_name"]."|". $row["last_name"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command7()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT b.emp_no,a.first_name,a.last_name,b.title
					FROM employees AS a , titles AS b 
					WHERE a.emp_no= b.emp_no;";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "employees: " . $row["emp_no"]."|". $row["first_name"]."|". $row["last_name"]."|". $row["title"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command8()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT *
					FROM employees
					WHERE emp_no IN (SELECT emp_no FROM dept_manager)";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "employees: " . $row["emp_no"]."|". $row["birth_date"]."|". $row["first_name"]."|". $row["last_name"]."|". $row["gender"]."|". $row["hire_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function read_mysql_command9()
	{
			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			/*SELECT b.emp_no,b.dept_no,b.from_date,b.to_date,a.dept_name
			FROM departments AS a ,dept_emp AS b 
			WHERE a.dept_no=b.dept_no;*/
	
		    $sql = "SELECT *
					FROM employees
					WHERE emp_no IN (SELECT DISTINCT emp_no FROM salaries WHERE salary <= '50000')";
		   
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
							    // output data of each row
					while($row = $result->fetch_assoc()) 
						{
						echo "employees: " . $row["emp_no"]."|". $row["birth_date"]."|". $row["first_name"]."|". $row["last_name"]."|". $row["gender"]."|". $row["hire_date"]."<br/>";
						}
				} 
				else 
				{
					echo "0 results";
				}
			
		
			$conn->close();
		
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function update_salaries()
	{

			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			
			$sql = "UPDATE `salaries` SET `salary`=55555 WHERE `emp_no` > 0;";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function mysql_delete()
	{
		$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			
			$sql = "DELETE FROM `salaries`";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function update_condition_1()
	{

			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			$update = "Marketing";//Software development
			//$update = "Software development";
			//UPDATE `departments` SET `dept_name`='Sotfff' WHERE `dept_no` = 'd001';
			$sql = "UPDATE `departments` SET `dept_name`='$update' WHERE `dept_no` = 'd001';";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	//UPDATE `titles` SET `title`='System analysis',`to_date`='2016-10-23' WHERE `emp_no` = '10277' AND `from_date` = '1985-06-16'
	function update_condition_2()
	{

			$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			//$update = "System analysis";//Software development
			$update = "Staff";
			//$to_dateup= "2016-10-23";
			$to_dateup= "1991-06-16";
			//UPDATE `departments` SET `dept_name`='Sotfff' WHERE `dept_no` = 'd001';
			$sql = "UPDATE `titles` SET `title`='$update',`to_date`='$to_dateup' WHERE `emp_no` = '10277' AND `from_date` = '1985-06-16'";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function mysql_delete_bycondition()
	{
		$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			
			$sql = "DELETE FROM `salaries` WHERE emp_no = '10004'";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
	function mysql_delete_bycondition_2()
	{
		$time_start = microtime_float();
			$conn = createMysqlConnection();
			set_time_limit(0);
			// Create connection
			
			$sql = "DELETE FROM `departments` WHERE dept_no = 'd009'";

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			$time_end = microtime_float();
			$time = $time_end - $time_start;
			echo "read  $time seconds\n";	
	}
?>