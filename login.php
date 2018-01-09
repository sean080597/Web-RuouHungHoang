<?php
	session_start();
	include "db.php";

	if (isset($_POST["yeucau_dangnhap"])) {
		$tk = mysqli_real_escape_string($con, $_POST["t_k"]);
		$mk = mysqli_real_escape_string($con, $_POST["m_k"]);

		$sql = "SELECT * FROM admin WHERE MaTK='$tk' AND MKhau='$mk'";
		$run = mysqli_query($con, $sql);
		if (mysqli_num_rows($run) > 0) {
			$row = mysqli_fetch_array($run);
			$_SESSION["name"] = $row["MaTK"];
			echo 'thanhcongdangnhap';
		}
	}
?>