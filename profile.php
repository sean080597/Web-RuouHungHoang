<?php
	session_start();
	if (isset($_SESSION['name'])) {
	}else {
	    echo '<script>location.href = "http://localhost:8888/RuouHungHoang/index.php";</script>';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Rượu Hùng Hoàng</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Rượu Hùng Hoàng</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Trang chủ</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Sản Phẩm</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon glyphicon-book"></span>Giới thiệu</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon glyphicon-film"></span>Tin tức</a></li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Search" id="search">
					</div>
					<button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
				 </form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart" id="hienthi_giohang"></span> Giỏ hàng<div id="dem_gio_hang" style="float: left"><!--span class="badge">0</span--></div></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-1 col-sm-1">STT</div>
										<div class="col-md-3 col-sm-3">Hình ảnh</div>
										<div class="col-md-3 col-sm-3">Tên sản phẩm</div>
										<div class="col-md-3 col-sm-3">Giá tiền</div>
										<div class="col-md-2 col-sm-2">Xóa</div>
									</div>
								</div>
								<div class="panel-body">
									<div id="thongtin_giohang">
										<!--div class="row">
											<div class="col-md-1">Sl.No</div>
											<div class="col-md-3"><img src="http://localhost:8888/shopper/themes/images/ruoubanchay/1.jpg" width="60px"></div>
											<div class="col-md-3">Product Name</div>
											<div class="col-md-3">Price in $.</div>
											<div class="col-md-2"><a class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></div>
										</div-->
									</div>
								</div>
								<div class="panel-footer">
									<div style="width:60%; display:table; margin:0px auto;">
										<a href="#" class="btn btn-success" style="width:40%;" id="mua_hang" data-toggle="modal" data-target="#myModal">Mua</a>
										<a href="#" class="btn btn-danger pull-right" id="xoahetgiohang">Xóa giỏ hàng</a>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li id="dangnhap_admin">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Xin chào, <?php echo $_SESSION["name"]; ?></a>
						<ul class="dropdown-menu">
							<li><a href="" style="color: blue;">Thay đổi mật khẩu</a></li>
							<li class="divider"></li>
							<li><a href="logout.php" style="color: blue;">Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	
	<p><br/></p>
	<p><br/></p>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<img src="http://localhost:8888/RuouHungHoang/themes/images/backgr/1.png" width="100%" alt="No image">
		</div>
	</div>
	
	<p><br/><p>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div id="hienthi_themgiohang" >
				<!--div class="col-md-10 panel panel-success">
					<div class="panel-heading">
						Da them vao gio
					</div>
				</div-->
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="phan_loai">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading" style="text-align:center">
						<h4>SẢN PHẨM CỬA HÀNG</h4>
					</div>
					<div class="panel-body">
						<div class="row" id="lay_sp">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div-->
					</div>
					<div class="panel-footer" style="text-align: center">
						 <h4>Cơ sở sản xuất rượu Bàu Đá HÙNG HOÀNG</h4>                
				            <a href="">ĐC: 281 - 283 Võ Nguyên Giáp - Thôn Huỳnh Kim - Phường Nhơn Hòa - TX An Nhơn - Bình Định</a></br>
				            <a href="">ĐT: (0256) 383 8 799 - DĐ : 0914 135 001</a></br>
				            <a href="">Email: ruouhunghoang@gmail.com</a></br>
				            <a href="https://www.facebook.com/ruouhunghoang">Facebook: https://www.facebook.com/ruouhunghoang</a></br>
				            <a href="">Websites: http://ruouhunghoang.com</a></br>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Nhập thông tin khách hàng</h4>
			</div>
			<div class="modal-body">
			  <form>
				<label>Tên khách hàng</label>
				<input type="text" placeholder="Nhập tên" id="nhap_tenkh">
				<br>
				<label>Số điện thoại</label>
				<input type="number" placeholder="Nhập số điện thoại" id="nhap_sdtkh">
				<br>
				<label>Địa chỉ</label>
				<input type="text" placeholder="Nhập địa chỉ" id="nhap_diachikh">
				<br>
				<label>Email</label>
				<input type="email" placeholder="Nhập email" id="nhap_emailkh">
			  </form>
			</div>
			<div class="modal-footer">
			  <div class="pull-left" style="width: 50%">
				<div class="pull-left"><strong>Tổng tiền:</strong></div>
				<div id="tongtien_giohang" style="float: left; margin: 0px 10px;">
					
				</div>
			  </div>
			  <button type="button" class="btn btn-success" data-dismiss="modal" id="thanhtoangiohang">Đặt mua</button>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
			</div>
		  </div>
		  
		</div>
	  </div>
	
</body>
</html>
















































