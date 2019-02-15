<?php
	class ChainEdit{
		public $conn;
		public $item_code;
		public $sts_id;
		public $site;
		public $location;
		public $note;
		public $date;
		public $time;
		public $author;

		public function __construct($item_code,$sts_id,$site,$location,$note,$date,$time,$author)
		{
			$this->conn = mysqli_connect('69.64.39.233','iccs_assets1','Ass3ts!','iccs_assets1');
			$this->item_code = $item_code;
			$this->sts_id = $sts_id;
			$this->site = $site;
			$this->location = $location;
			$this->note = $note;
			$this->date = $date;
			$this->time = $time;
			$this->author = $author;

			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);

			if($this->sts_id != $item['sts_id']){
				$this->editStatus();
			}
			if($this->site != $item['site_name']){
				$this->editSite();
			}
			if($this->location != $item['location']){
				$this->editLocation();
			}
			if($this->note != $item['note']){
				$this->editnote();
			}

		}

		public function editStatus()
		{
			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);
			$id = $item['id'];
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
			$hash = hash('sha256',$this->item_code.$this->time.$this->author.'editStatus');
			$previous_block = $item['hash'];
			$insert = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','EDIT','$brand_name','$model_name','$this->sts_id','$stord_id','$location','$note','$this->date','$this->time','$this->author','$site_name','$hash','$previous_block')";
			if(mysqli_query($this->conn,$insert))
			{
				//convert status id to status mark(OLD)
				$old_select_sts_mark = "SELECT `sts_mark` FROM `status_tbl` WHERE `sts_id`='$sts_id'";
				$old_sts_mark_result = mysqli_query($this->conn,$old_select_sts_mark);
				$old_mark = mysqli_fetch_assoc($old_sts_mark_result);
				$old_mark = $old_mark['sts_mark'];

				//convert status id to status mark(NEW)
				$select_sts_mark = "SELECT `sts_mark` FROM `status_tbl` WHERE `sts_id`='$this->sts_id'";
				$sts_mark_result = mysqli_query($this->conn,$select_sts_mark);
				$new_mark = mysqli_fetch_assoc($sts_mark_result);
				$new_mark = $new_mark['sts_mark'];

				
				$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$old_mark','$new_mark')";
							mysqli_query($this->conn,$insert_changes);
			}else
			{
				echo mysqli_error();
			}
		}

		public function editSite()
		{
			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);
			$id = $item['id'];
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
			$hash = hash('sha256',$this->item_code.$this->time.$this->author.'editSite');
			$previous_block = $item['hash'];
			$insert = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','TRANSFER','$brand_name','$model_name','$sts_id','$stord_id','$location','$note','$this->date','$this->time','$this->author','$this->site','$hash','$previous_block')";
			if(mysqli_query($this->conn,$insert))
			{
				$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$site_name','$this->site')";
							mysqli_query($this->conn,$insert_changes);
			}else
			{
				echo mysqli_error();
			}
		}

		public function editLocation()
		{
			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);
			$id = $item['id'];
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
			$hash = hash('sha256',$this->item_code.$this->time.$this->author.'editLocation');
			$previous_block = $item['hash'];
			$insert = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','TRANSFER','$brand_name','$model_name','$sts_id','$stord_id','$this->location','$note','$this->date','$this->time','$this->author','$site_name','$hash','$previous_block')";
			if(mysqli_query($this->conn,$insert))
			{
				$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$location','$this->location')";
							mysqli_query($this->conn,$insert_changes);
			}else
			{
				echo mysqli_error();
			}
		}

		public function editnote()
		{
			$select_item = "SELECT * FROM `transaction` WHERE `item_code`='$this->item_code' ORDER BY `id` DESC LIMIT 1";
			$item_result = mysqli_query($this->conn,$select_item);
			$item = mysqli_fetch_assoc($item_result);
			$id = $item['id'];
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
			$hash = hash('sha256',$this->item_code.$this->time.$this->author.'editnote');
			$previous_block = $item['hash'];
			$insert = "INSERT INTO `transaction` (`item_code`,`action`,`brand_name`,`model_name`,`sts_id`,`stord_id`,`location`,`note`,`date_modify`,`time_modify`,`modify_by`,`site_name`,`hash`,`previous_block`)VALUES('$item_code','EDIT','$brand_name','$model_name','$sts_id','$stord_id','$location','$this->note','$this->date','$this->time','$this->author','$site_name','$hash','$previous_block')";
			if(mysqli_query($this->conn,$insert))
			{
				$insert_changes = "INSERT INTO `transaction_changes` (`hash`,`input`,`output`)VALUES('$hash','$note','$this->note')";
							mysqli_query($this->conn,$insert_changes);
			}else
			{
				echo mysqli_error();
			}
		}


	}
	

	

?>