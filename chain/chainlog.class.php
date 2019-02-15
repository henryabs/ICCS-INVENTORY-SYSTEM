<?php
	class chainLog{
		public $conn;
		public $item_code;
		public $action;
		public $brand_name;
		public $model_name;
		public $status_id;
		public $storage_id;
		public $location;
		public $note;
		public $date_modify;
		public $time_modify;
		public $modify_by;
		public $site_name;
		public $hash;
		public $previous_block;
		
		public function __construct($item_code,$action,$brand_name,$model_name,$status_id,$storage_id,$location,$note,$date_modify,$time_modify,$modify_by,$site_name,$hash,$previous_block){
			$this->conn = mysqli_connect('69.64.39.233','iccs_assets1','Ass3ts!','iccs_assets1');
			$this->item_code = $item_code;
			$this->action = $action;
			$this->brand_name = $brand_name;
			$this->model_name = $model_name;
			$this->status_id = $status_id;
			$this->storage_id = $storage_id;
			$this->location = $location;
			$this->note = $note;
			$this->date_modify = $date_modify;
			$this->time_modify = $time_modify;
			$this->modify_by = $modify_by;
			$this->site_name = $site_name;
			$this->hash = $hash;
			$this->previous_block = $previous_block;

		}

		public function addGenesisBlock(){
			$conn = mysqli_connect('localhost','root','','inventory');
			//check if genesis block exists
			$select_block = "SELECT `item_code` FROM `transaction` WHERE `item_code`='$this->item_code'";
			$block_result = mysqli_query($this->conn,$select_block);
			$count = mysqli_num_rows($block_result);
			if($count < 1){
				//insert new Genesis Block
				$insert_genesis = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$this->item_code','$this->action','$this->brand_name','$this->model_name','$this->status_id','$this->storage_id','$this->location','$this->note','$this->date_modify','$this->time_modify','$this->modify_by','$this->site_name','$this->hash','$this->previous_block')";
				if(mysqli_query($this->conn,$insert_genesis))
				{
					//insert transaction changes
					$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$this->hash','','$this->item_code')";
					mysqli_query($this->conn,$insert_changes);
				}
					
			}
			

		}

		
	}

	class Editchain{
		public $conn;
		public $item_code;
		public $action;
		public $status_id;
		public $site_name;
		public $location;
		public $note;
		public $date;
		public $time;
		public $author;
		public function __construct($item_code,$action,$status_id,$site_name,$location,$note,$date,$time,$author){
			$this->conn = mysqli_connect('69.64.39.233','iccs_assets1','Ass3ts!','iccs_assets1');
			$this->item_code = $item_code;
			$this->action = $action;
			$this->status_id = $status_id;
			$this->site_name = $site_name;
			$this->location = $location;
			$this->note = $note;
			$this->date = $date;
			$this->time = $time;
			$this->author = $author;
			
			//select previous block
			$edit_block = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' DESC";
			$edit_result = mysqli_query($this->conn,$edit_block);
			$edit = mysqli_fetch_assoc($edit_result);
			$old_sts_id = $edit['sts_id'];

			if(($this->status_id != $edit['sts_id'])){
				//insert new edit block
				//get status mark old
				$select_mark = "SELECT `sts_mark` FROM `status_tbl` WHERE `sts_id`='$old_sts_id'";
				$mark_result = mysqli_query($this->conn,$select_mark);
				$mark = mysqli_fetch_assoc($mark_result);
				$mark = $mark['sts_mark'];

				//get new mark
				$select_new_mark = "SELECT `sts_mark` FROM `status_tbl` WHERE `sts_id`='$this->status_id'";
				$new_mark_result = mysqli_query($this->conn,$select_new_mark);
				$new_mark = mysqli_fetch_assoc($new_mark_result);
				$new_mark = $new_mark['sts_mark'];

				$item_code;
				$action = $this->action;
				$brand_name = $edit['brand_name'];
				$model_name = $edit['model_name'];
				$status_id = $this->status_id;
				$storage_id = $edit['stord_id'];
				$location = $edit['location'];
				$note = $edit['note'];
				$date = $this->date;
				$time = $this->time;
				$author = $this->author;
				$site_name = $edit['site_name'];
				$hash = hash('sha256',$item_code.$time.$author);
				$previous_block = $edit['hash'];
				
				$insert_edit = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','$action','$brand_name','$model_name','$status_id','$storage_id','$location','$note','$date','$time','$author','$site_name','$hash','$previous_block')";
				if(mysqli_query($this->conn,$insert_edit))
				{
					//insert transaction changes
					$insert_sts = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$mark','$new_mark')";
					mysqli_query($this->conn,$insert_sts);
				}
				
			}

			if(($this->note != $edit['note'])){
				$edit_block = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' DESC";
				$edit_result = mysqli_query($this->conn,$edit_block);
				$edit = mysqli_fetch_assoc($edit_result);
				
				echo $old_note = $edit['note'];
				//insert new edit block
				
				$item_code;
				$action = $this->action;
				$brand_name = $edit['brand_name'];
				$model_name = $edit['model_name'];
				$status_id = $edit['sts_id'];
				$storage_id = $edit['stord_id'];
				$location = $edit['location'];
				$note = $this->note;
				$date = $this->date;
				$time = $this->time;
				$author = $this->author;
				$site_name = $edit['site_name'];
				$hash = hash('sha256',$item_code.$time.$author);
				$previous_block = $edit['hash'];
				
				$insert_edit = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','$action','$brand_name','$model_name','$status_id','$storage_id','$location','$note','$date','$time','$author','$site_name','$hash','$previous_block')";
				if(mysqli_query($this->conn,$insert_edit)){
					//insert transaction changes
					$old_note = $edit['note'];
					$insert_sts = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$old_note','$this->note')";
					mysqli_query($this->conn,$insert_sts);
				}
				
			}
		}

		
	}
	
	/*

	class Transferchain{
		public $conn;
		public $item_code;
		public $action;
		public $status_id;
		public $site_name;
		public $location;
		public $note;
		public $date;
		public $time;
		public $author;
		public function __construct($item_code,$action,$status_id,$site_name,$location,$note,$date,$time,$author){
			$this->conn = mysqli_connect('localhost','root','','inventory');
			$this->item_code = $item_code;
			$this->action = $action;
			$this->status_id = $status_id;
			$this->site_name = $site_name;
			$this->location = $location;
			$this->note = $note;
			$this->date = $date;
			$this->time = $time;
			$this->author = $author;
			
			//select previous block
			$edit_block = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `time_modify` DESC";
			$edit_result = mysqli_query($this->conn,$edit_block);
			$edit = mysqli_fetch_assoc($edit_result);
			$old_sts_id = $edit['sts_id'];
			if(($this->site_name != $edit['site_name'])){
				//insert new edit block
				

				$item_code;
				$action = $this->action;
				$brand_name = $edit['brand_name'];
				$model_name = $edit['model_name'];
				$status_id = $edit['sts_id'];
				$storage_id = $edit['stord_id'];
				$location = $edit['location'];
				$note = $edit['note'];
				$date = $this->date;
				$time = $this->time;
				$author = $this->author;
				$site_name = $this->site_name;
				$hash = hash('sha256',$item_code.$time.$author);
				$previous_block = $edit['hash'];
				
				$insert_tf = "INSERT INTO `transaction` (`id`,`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('','$item_code','$action','$brand_name','$model_name','$status_id','$storage_id','$location','$note','$date','$time','$author','$site_name','$hash','$previous_block')";
				if(mysqli_query($this->conn,$insert_tf))
				{
					//insert transaction changes
					$insert_site = "INSERT INTO `transaction_changes` (`id`,`hash`,`input`,`output`)VALUES('','$hash','$edit['site_name']','$this->site_name')";
					mysqli_query($this->conn,$insert_site);
				}
				
			}
			/*
			if(($this->note != $edit['note'])){
				//insert new edit block
				
				$item_code;
				$action = $this->action;
				$brand_name = $edit['brand_name'];
				$model_name = $edit['model_name'];
				$status_id = $edit['sts_id'];
				$storage_id = $edit['stord_id'];
				$location = $edit['location'];
				$note = $this->note;
				$date = $this->date;
				$time = $this->time;
				$author = $this->author;
				$site_name = $edit['site_name'];
				$hash = hash('sha256',$item_code.$time.$author);
				$previous_block = $edit['hash'];
				
				$insert_edit = "INSERT INTO `transaction` (`id`,`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('','$item_code','$action','$brand_name','$model_name','$status_id','$storage_id','$location','$note','$date','$time','$author','$site_name','$hash','$previous_block')";
				if(mysqli_query($this->conn,$insert_edit)){
					//insert transaction changes
					$old_note = $edit['note'];
					$insert_sts = "INSERT INTO `transaction_changes` (`id`,`hash`,`input`,`output`)VALUES('','$hash','$old_note','$this->note')";
					mysqli_query($this->conn,$insert_sts);
				}
				
			}
		}

		
	}
	*/

?>