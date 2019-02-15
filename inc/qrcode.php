<?php
		include "./phpqrcode/qrlib.php";
		$back_color = 0xFFFF00;
		$fore_color = 0xFF00FF;
		$user = 'Henry Abayan';
		//QRcode::png($item_code,'./phpqrcode/image/'.$item_code.'.png', 'H', 20, 2, false, $back_color, $fore_color);
		//QRcode::png($user,'./image/'.strtoupper($user).'.png','H',10,2);
		QRcode::png($user);

?>