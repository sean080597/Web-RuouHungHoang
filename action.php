<?php
	session_start();
	include "db.php";

	if(isset($_POST["lay_loai_ruou"])){
		$sql = "SELECT * FROM loairuou";
		$run = mysqli_query($con,$sql);
		echo "
			<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Phân loại</h4></a></li>
		";
		if(mysqli_num_rows($run) > 0){
			while($row = mysqli_fetch_array($run)){
				$maruou = $row["MaLoai"];
				$tenruou = $row["TenRuou"];
				$dungtich = $row["DungTich"];
				
				echo "
						<li><a href='#' class='phanloai' maruou='$maruou'>$tenruou $dungtich</a></li>
				";
			}
			echo "</div>";
		}
		
	}

	if(isset($_POST["lay_ruou"])){
		$sql = "SELECT * FROM sanpham";
		$run = mysqli_query($con,$sql);
		if (mysqli_num_rows($run) > 0){
			while ($row = mysqli_fetch_array($run)){
				$masp = $row['MaSP'];
				$tensp = $row['TenSP'];
				$anh = $row['Anh'];
				$gia = $row['Gia'];
				
				echo '<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="panel panel-info anh_sp">
							<div class="panel-heading" tenruou="tenruou-'.$masp.'">'.$tensp.'</div>
							<div class="panel-body">
								<img src="'.$anh.'"/>
							</div>
							<div class="panel-heading">'.number_format($gia, 0, ".", ",").' VNĐ
								<button style="float:right;" class="btn btn-danger btn-xs them_vao_gio" maruou="'.$masp.'">Thêm vào giỏ</button>
							</div>
						</div>
					</div>
				</div>';
			}
		}
		
	}
	
	if(isset($_POST["lay_theo_loai"])){
		$maloai = $_POST['maloaisp'];
		$sql = "SELECT * FROM `sanpham` WHERE MaLoai='$maloai'";
		$run = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($run) > 0){
			while ($row = mysqli_fetch_array($run)){
				$masp = $row['MaSP'];
				$tensp = $row['TenSP'];
				$anh = $row['Anh'];
				$gia = $row['Gia'];
				
				echo '<div class="panel panel-info anh_sp">
							<div class="panel-heading" tenruou="tenruou-'.$masp.'">'.$tensp.'</div>
							<div class="panel-body">
								<img src="'.$anh.'"/>
							</div>
							<div class="panel-heading">'.$gia.'
								<button style="float:right;" class="btn btn-danger btn-xs them_vao_gio" maruou="'.$masp.'">Thêm vào giỏ</button>
							</div>
						</div>
					</div>';
			}
		}
		
	}
	
	if(isset($_POST["lay_theo_tukhoa"])){
		$noidung_timkiem = $_POST['noidung_timkiem'];
		$sql = "SELECT * FROM `sanpham` WHERE tukhoa LIKE '%$noidung_timkiem%'";
		$run = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($run) > 0){
			while ($row = mysqli_fetch_array($run)){
				$masp = $row['MaSP'];
				$tensp = $row['TenSP'];
				$anh = $row['Anh'];
				$gia = $row['Gia'];
				
				echo '<div class="panel panel-info anh_sp">
							<div class="panel-heading" tenruou="tenruou-'.$masp.'">'.$tensp.'</div>
							<div class="panel-body">
								<img src="'.$anh.'"/>
							</div>
							<div class="panel-heading">'.$gia.'
								<button style="float:right;" class="btn btn-danger btn-xs them_vao_gio" maruou="'.$masp.'">Thêm vào giỏ</button>
							</div>
						</div>
					</div>';
			}
		}
		
	}
	
	if(isset($_POST["themvaogio"])){
		$maruou = $_POST['macuasp'];
		
		$sql = "SELECT * FROM sanpham WHERE MaSP = '$maruou'";
		$run = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($run) > 0){
			$row = mysqli_fetch_array($run);
			$tensp = $row['TenSP'];
			$dungtich = $row['DungTich'];
			$anh = $row['Anh'];
			$gia = $row['Gia'];
			
			$sql = "SELECT * FROM `giohang` WHERE MaSP = '$maruou'";
			$run = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run);
			if ($count > 0){
				echo 'Sản phẩm đã có sẵn ở giỏ';
			}
			else{
				$sql = "INSERT INTO `giohang` (`MaSP`, `TenSP`, `Anh`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES ('$maruou', '$tensp', '$anh', '1', '$gia', '$gia');";
				mysqli_query($con, $sql);
				echo 'Thêm vào giỏ hàng thành công';
			}
			
		}
		
	}
	
	if(isset($_POST["hienthi_caigio"])){
		$sql = "SELECT * FROM giohang";
		$run = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($run) > 0){
			$i=1;
			while($row = mysqli_fetch_array($run)){
				$masp = $row['MaSP'];
				$anh = $row['Anh'];
				$tensp = $row['TenSP'];
				$gia = $row['DonGia'];
				echo 
					'<div class="row">
						<div class="col-md-1">'.$i.'</div>
						<div class="col-md-3"><img src="'.$anh.'" width="60px"></div>
						<div class="col-md-3">'.$tensp.'</div>
						<div class="col-md-3">'.$gia.'</div>
						<div class="col-md-2"><a href="#" class="btn btn-danger btn_remove" masp="'.$masp.'"><span class="glyphicon glyphicon-trash"></span></a></div>
					</div>';
				$i++;
			}
			
		}
		
	}
	
	if(isset($_POST["yeucau_dathang"])){
		$sql = "SELECT * FROM `giohang`";
		$run = mysqli_query($con, $sql);
		$total = 0;
		if(mysqli_num_rows($run) > 0){
			while($row = mysqli_fetch_array($run)){
				$total_1item = $row['ThanhTien'];
				$total_price = array($total_1item);
				$total_sum = array_sum($total_price);
				$total += $total_sum;
			}
		}
		echo '<input type="text" value="'.$total.'" id="tongtien" style="border:none; background-color: transparent;" disabled>';
	}
	
	if(isset($_POST["thanhtoan_giohang"])){
		$tenkh = $_POST['ten_kh'];
		$sdtkh = $_POST['sdt_kh'];
		$diachikh = $_POST['diachi_kh'];
		$emailkh = $_POST['email_kh'];
		$tongtienkh = $_POST['tongtien_kh'];
		
		$sql = "INSERT INTO `khachhang` (`MaKH`, `TenKH`, `DiaChi`, `Email`, `SDT`) VALUES (NULL, '$tenkh', '$diachikh', '$emailkh', '$sdtkh')";
		mysqli_query($con, $sql);
		
		$sql = "SELECT * FROM `khachhang` WHERE TenKH='$tenkh'";
		$run = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($run);
		$makh = $row['MaKH'];
		
		date_default_timezone_set("Asia/Ho_Chi_Minh");
	    $date = date('Y-m-d H:i:s', time());
		
		$mahd = "";
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    for ($i = 0; $i < 6; $i++)
	        $mahd .= $characters[mt_rand(0, 61)];
		
		$sql = "INSERT INTO `hoadon` (`MaHD`, `MaKH`, `ThanhTien`, `NgayLap`) VALUES ('$mahd', '$makh', '$tongtienkh', '$date');";
		mysqli_query($con, $sql);
		
		echo 'Da thanh cong';
	}
	
	//Count User cart item
	if (isset($_POST["dem_giohang"])) {
		
		$sql = "SELECT COUNT(*) AS count_item FROM giohang";
		
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
		echo '<span class="badge">'.$row["count_item"].'</span>';
	}
	
	//xóa sp trong giỏ hàng
	if (isset($_POST["xoasp_giohang"])) {
		$masp = $_POST['ma_sp'];
		
		$sql = "DELETE FROM `giohang` WHERE MaSP='$masp'";
		if (mysqli_query($con,$sql)){
			echo 'Đã xóa thành công';
		}else{
			echo 'Xóa không thành công';
		}
	}
	
	//xóa hết sp trong giỏ hàng
	if (isset($_POST["xoahet_giohang"])) {
		$sql = "TRUNCATE TABLE giohang";
		mysqli_query($con, $sql);
	}
	
	//lấy loại SP hiển thị trong select, option
	if (isset($_POST["lay_loai_sp"])) {
		$sql = "SELECT * FROM `loairuou`";
		$run = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($run) > 0){
			while ($row = mysqli_fetch_array($run)){
				$maloai = $row['MaLoai'];
				$tenruou = $row['TenRuou'];
				$dungtich = $row['DungTich'];
				
				$tenloai = $tenruou." - ".$dungtich;
				
				echo '<option value="'.$maloai.'">'.$tenloai.'</option>';
			}
		}
	}
	
	//thêm sp mới
	if (isset($_POST["them_sp_moi"])) {
		$masp = $_POST['ma_sp'];
		$maloai = $_POST['ma_loai'];
		$tensp = $_POST['ten_sp'];
		$dungtich = $_POST['dung_tich'];
		$giaban = $_POST['gia_ban'];
		$tukhoa = $_POST['tu_khoa'];
		$link_anh = $_POST['link_hinhanh'];
		
		$sql = "INSERT INTO `sanpham` (`MaSP`, `MaLoai`, `TenSP`, `Anh`, `DungTich`, `Gia`, `tukhoa`) 
			VALUES ('$masp', '$maloai', '$tensp', '$link_anh', '$dungtich', '$giaban', '$tukhoa')";
		if (mysqli_query($con,$sql)){
			echo 'Thêm SP mới thành công';
		}else{
			echo 'Thêm SP mới không thành công';
		}
	}

?>






