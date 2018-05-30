 <?php
	class DbConnection{
		private $conn = NULL;
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db_name = "inf-5ogruppo4";
		
		function __construct(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
		}
		
		function prepared_query($query, $type, ...$params){
			$stmt = $this->conn->prepare($query);
			if(isset($type)){
				$stmt->bind_param($type, )
			}
		}
		
		function __destruct(){
			$this->conn->close();
		}
		
	}
	
	
 ?>