<?php
	class Chain{
		public $action;
		public function add($action)
		{
			$this->action = $action;
			echo $this->action;
		}

		public function edit($action)
		{
			$this->action = $action;
			echo $this->action;
		}

		public function transfer($action)
		{
			echo "Edite";
		}

		public function delete($action)
		{
			echo "Edite";
		}
	}

	$action = new Chain();
	$action->edit("edit");

?>