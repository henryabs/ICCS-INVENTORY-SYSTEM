<?php
	class Delete{
		public $conn;
		public $item_code;
		
		public $date;
		public $time;
		public $author;
		public function __construct($item_code,$date,$time,$author){
			$this->conn = mysqli_connect('69.64.39.233','iccs_assets1','Ass3ts!','iccs_assets1');
			$this->item_code = $item_code;
			$code = $this->item_code;
			$this->date = $date;
			$this->time = $time;
			$this->author = $author;

			
			
				$this->pull();
			
		}


		public function pull(){
			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);
			$item_code = $item['item_code'];
			$action = $item['action'];
			$brand_name = $item['brand_name'];
			$model_name = $item['model_name'];
			$sts_id = $item['sts_id'];
			$stord_id = $item['stord_id'];
			$location = $item['location'];
			$note = $item['note'];
			$date_modify = $item['date_modify'];
			$time_modify = $item['time_modify'];
			$modify_by = $item['modify_by'];
			$site_name = $item['site_name'];
			$hash = hash('sha256',$this->item_code.$this->time.$this->author.'editDelete');
			$previous_block = $item['hash'];
			$insert = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','DELETE','deleted','deleted','$sts_id','$stord_id','deleted','deleted','$this->date','$this->time','$this->author','$site_name','$hash','$previous_block')";
			if(mysqli_query($this->conn,$insert)){
				$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','','$this->item_code')";
				mysqli_query($this->conn,$insert_changes);
				
			}
		}
	}
?>