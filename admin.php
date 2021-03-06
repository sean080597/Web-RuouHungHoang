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
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<script>
			$(document).ready(function(e){
				//load loại SP sau khi load trang
				layloaisp();
				function layloaisp(){
				  $.ajax({
					url: 'action.php',
					method: 'POST',
					data: {lay_loai_sp:1},
					success: function(data){
					  $('#lietke_loaisp').html(data);
					}
				  });
				}
				
				//submit thêm SP mới
				$("#form_them_sp").on('submit',(function(e) {
					e.preventDefault();
					var masp = $("#Masp").val();
					var maloai = $("#lietke_loaisp").val();
					var tensp = $("#Tensp").val();
					var dungtich = $("#dungtich").val();
					var giaban = $("#gia").val();
					var tukhoa = $("#tukhoa").val();
					
					var selectedFile = document.getElementById("anh");
					var link = "http://localhost:8888/RuouHungHoang/themes/images/" + selectedFile.files.item(0).name;
					
					$.ajax({
						url: "upload_hinhanh.php",
						type: "POST",
						data:  new FormData(this),
						contentType: false,
						cache: false,
						processData:false,
						success: function(data){
							$.ajax({
								url: 'action.php',
								method: 'POST',
								data: {them_sp_moi: 1,
										ma_sp:masp,
										ma_loai:maloai,
										ten_sp:tensp,
										dung_tich:dungtich,
										gia_ban:giaban,
										tu_khoa:tukhoa,
										link_hinhanh:link
										},
								success: function(data){
									alert(data);
									location.reload();
								}
							});
						}
					});
				}));
			});
		</script>
		
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Rượu Hùng Hoàng</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Trang chủ</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Sản Phẩm</a></li>
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
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
							<div class="panel-footer"></div>
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading" style="text-align:center">Nhập thông tin sản phẩm</div>
						<form class="form-inline" id="form_them_sp" action="upload_hinhanh.php" method="post">
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Mã sản phẩm</label>
								<input type="text" class="form-control" id="Masp" placeholder="Nhập mã sản phẩm"  name="" style="text-align: center; width: 100%;" maxlength="6" required>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Tên loại</label>
								<select name="cbTypeItem" size=1 onChange="" id="lietke_loaisp">
									
                                </select>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Tên sản phẩm</label>
								<input type="text" class="form-control" id="Tensp" placeholder="Nhập tên sản phẩm" name="" style="text-align: center; width: 100%;" required>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Ảnh</label>
								<input type="file" class="form-control" id="anh" placeholder="" name="upload_photo" style="text-align: center; width: 100%;" required>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Dung tích</label>
								<input type="text" class="form-control" id="dungtich" placeholder="nhập dung tích" name="" style="text-align: center; width: 100%;" required>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">Giá</label>
								<input type="number" class="form-control" id="gia" placeholder="nhập giá" name="" style="text-align: center; width: 100%;" required>
							</div>
							</br>
							<div class="form-group" style="margin: 10px auto; display: table; width:30%;">
								<label class="">từ khóa</label>
								<input type="text" class="form-control" id="tukhoa" placeholder="từ khóa" name="" style="text-align: center; width: 100%;" required>
							</div>
							</br>	
							<button type="submit" class="btn btn-primary" style="margin: 10px auto; display: table; width:30%;">Nhập sản phẩm</button>
						</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































