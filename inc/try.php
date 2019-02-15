<?php
include './core/internal_connect.php';
echo $t = $_GET['s'];
$rpt = "SELECT * FROM `report_tbl` WHERE `site`='$t'";
$rpt_result = mysqli_query($conn,$rpt);
if(mysqli_num_rows($rpt_result) > 0){
	while($row = mysqli_fetch_assoc($rpt_result)){
		$dataPoints[] = $row;
	}
}

?>
<script>
		window.onload = function () {
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: ""
			},
			axisY: {
				suffix: "%",
				scaleBreaks: {
					autoCalculate: true
				}
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0\"%\"",
				indexLabel: "{y}",
				indexLabelPlacement: "inside",
				indexLabelFontColor: "white",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
		</script>
		<div id="chartContainer" style="height: 500px; width: 100%;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>