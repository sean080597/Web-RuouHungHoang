<?php

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
										<div class="col-md-3">Số lượng</div>
										<div class="col-md-3">Hình ảnh</div>
										<div class="col-md-3">Tên sản phẩm</div>
										<div class="col-md-3">Giá tiền</div>
									</div>
								</div>
								<div class="panel-body">
									<div id="thongtin_giohang">
										<!--div class="row">
											<div class="col-md-3">Sl.No</div>
											<div class="col-md-3"><img src="http://localhost:8888/shopper/themes/images/ruoubanchay/1.jpg" width="60px"></div>
											<div class="col-md-3">Product Name</div>
											<div class="col-md-3">Price in $.</div>
										</div-->
									</div>
								</div>
								<div class="panel-footer">
									<a class="btn btn-success" style="width:40%; display: table; margin: 5px auto;" id="mua_hang" data-toggle="modal" data-target="#myModal">Mua</a>
								</div>
							</div>
						</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Đăng nhập</div>
									<div class="panel-heading">
										<form onsubmit="return false" id="login">
											<label for="email">Tên đăng nhập</label>
											<input type="text" class="form-control" name="" id="taikhoan" required/>
											<label for="email">Mật khẩu</label>
											<input type="password" class="form-control" name="password" id="matkhau" required/>
											<p><br/></p>
											<a href="#" style="color:white; list-style:none;">Quên mật khẩu</a><input type="submit" class="btn btn-success" style="float:right;">
										</form>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
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
						<h4>GIỚI THIỆU</h4>
					</div>
					<div class="panel-body">
						<h1><center>Cơ sở rượu Bàu Đá HÙNG HOÀNG</center></h1>
						<p>	Rượu Bàu Đá là một đặc sản nổi tiếng của xứ sở anh hùng áo vải Quang Trung – Nguyễn Huệ. Được chưng cất theo phương thức cổ truyền của làng nghề truyền thống tại làng Bàu Đá, xã Nhơn Lộc, huyện An Nhơn, tỉnh Bình Định, với công thức nấu rượu cổ truyền hơn 200 năm qua mà người dân địa phương chúng tôi gìn giữ cho đến tận ngày nay. Nguyên liệu chính làm nên Rượu Bàu Đá gồm: Gạo, Men, Mạch nước ngầm tại làng Bầu Đá.</p>
						
						<p>	Do nhu cầu sử dụng ngày càng nhiều nên một số người đã lợi dụng thương hiệu Rượu Bàu Đá để kinh doanh ồ ạt, làm sai quy trình sản xuất Rượu Bàu Đá. Dẫn đến sự xuất hiện Rượu Bàu Đá thật và giả trên thị trường, gây tổn hại đến sức khỏe cho người tiêu dùng, làm ảnh hưởng uy tín của thương hiệu rượu Bàu Đá được ông cha gầy dựng từ bao đời nay. Trăn trở trước thực trạng như vậy, ngày 05/11/2002, Cơ sở rượu Bàu Đá HÙNG HOÀNG được thành lập nhằm giữ “lửa” cho Rượu Bàu Đá Bình Định, là nơi cung cấp rượu Bàu Đá chính gốc cho người tiêu dùng và khẳng định thương hiệu Rượu Bàu Đá.
							Với phương thức nấu rượu cổ truyền tại làng nghề, Cơ sở rượu Bầu Đá HÙNG HOÀNG sẽ mang đến cho bạn một sản phẩm rượu Bàu Đá đặc biệt của miền đất võ BÌNH ĐỊNH. Khi bạn uống vào một ly rượu Bàu Đá HÙNG HOÀNG, bạn sẽ cảm nhận ngay một mùi thơm đặc trưng dễ chịu, một vị rượu tuyệt vời mà không có một loại rượu nào sánh được.
							Qua hơn 14 năm phát triển của cơ sở, kết hợp giữa phương thức nấu rượu cổ truyền và bao bì, mẫu mã hiện đại. Chúng tôi cung cấp đến người tiêu dùng những sản phẩm rượu Bàu Đá với chất lượng tuyệt hảo, phong phú về mẫu mã, kiểu dáng, màu sắc mang đậm nét văn hóa truyền thống của người Việt Nam, rất thích hợp để làm quà tặng, quà lưu niệm cho bạn bè, người thân, đồng nghiệp trong các dịp lễ, Tết…
							Cùng với sự nỗ lực không ngừng để nâng cao chất lượng sản phẩm, phong cách chăm sóc khách hàng tận tình chu đáo. Vì vậy rượu Bàu Đá HÙNG HOÀNG đã được đông đảo khách hàng tín nhiệm hầu hết các địa phương trong cả nước.
							Hiện nay chúng tôi đã phát triển được mạng lưới đại lý trên khắp cả nước, quý khách có nhu cầu đặt hàng, vui lòng liên hệ với chúng tôi để được hỗ trợ mua và nhận hàng. Xin chân thành cảm ơn đã ghé thăm !</p>
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
















































