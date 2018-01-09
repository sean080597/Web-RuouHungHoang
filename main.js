
$(document).ready(function() {
	//check rỗng
	function isEmpty(value){
	  return (value == null || value.length === 0);
	}

	//Đưa ra sản phẩm trong giỏ hàng
	lay_loai_sp();	
	lay_sp();
	hienthi_giohang();
	demgiohang();

	function lay_loai_sp(){
	  $.ajax({
		url: 'action.php',
		method: 'POST',
		data: {lay_loai_ruou:1},
		success: function(data){
		  $('#phan_loai').html(data);
		}
	  });
	}
	
	function lay_sp(){
	  $.ajax({
		url: 'action.php',
		method: 'POST',
		data: {lay_ruou:1},
		success: function(data){
		  $('#lay_sp').html(data);
		}
	  });
	}
	
	$('body').delegate('.phanloai', 'click', function(event){
		event.preventDefault(); //ngăn ko cho mở trang khác, load trang 
		var maloai = $(this).attr('maruou');
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {lay_theo_loai:1, maloaisp:maloai},
		  success: function(data){
			$('#lay_sp').html(data);
		  }
		});
	});
	
	$('body').delegate('#search_btn', 'click', function(event){
		event.preventDefault();
		var noidung_timkiem = $("#search").val();
		
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {lay_theo_tukhoa:1, noidung_timkiem:noidung_timkiem},
		  success: function(data){
			$('#lay_sp').html(data);
			//alert(data);
		  }
		});
	});
	
	$('body').delegate('.them_vao_gio', 'click', function(event){
		event.preventDefault();
		var masp = $(this).attr('maruou');
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {themvaogio:1, macuasp:masp},
		  success: function(data){
			alert(data);
			hienthi_giohang();
			demgiohang();
		  }
		});
	});
	
	function hienthi_giohang(){
	  $.ajax({
		url: 'action.php',
		method: 'POST',
		data: {hienthi_caigio:1},
		success: function(data){
		  $('#thongtin_giohang').html(data);
		}
	  });
	}
	
	$('body').delegate('#mua_hang', 'click', function(event){
		event.preventDefault();
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {yeucau_dathang:1},
		  success: function(data){
			$('#tongtien_giohang').html(data);
		  }
		});
	});
	
	$('body').delegate('#thanhtoangiohang', 'click', function(event){
		event.preventDefault();
		var tenkh = $('#nhap_tenkh').val();
		var sdtkh = $('#nhap_sdtkh').val();
		var diachikh = $('#nhap_diachikh').val();
		var emailkh = $('#nhap_emailkh').val();
		var tongtienkh = $('#tongtien').val();
		
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {thanhtoan_giohang:1, ten_kh:tenkh, sdt_kh:sdtkh, diachi_kh:diachikh, email_kh:emailkh, tongtien_kh:tongtienkh},
		  success: function(data){
			alert(data);
		  }
		});
	});
	
	function demgiohang(){
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {dem_giohang:1},
		  success: function(data){
			$("#dem_gio_hang").html(data);
		  }
		});
	}
	
	$('body').delegate('.btn_remove', 'click', function(event){
		event.preventDefault();
		var masp = $(this).attr('masp');
		
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {xoasp_giohang:1, ma_sp:masp},
		  success: function(data){
			alert(data);
			hienthi_giohang();
			demgiohang();
		  }
		});
	});
	
	$('body').delegate('#xoahetgiohang', 'click', function(event){
		event.preventDefault();
		
		$.ajax({
		  url: 'action.php',
		  method: 'POST',
		  data: {xoahet_giohang:1},
		  success: function(data){
			hienthi_giohang();
			demgiohang();
		  }
		});
	});
	
	//Phan dang nhap
	$('body').delegate('#dangnhap', 'click', function(event){
		event.preventDefault();
		var tk = $("#taikhoan").val();
		var mk = $("#matkhau").val();
		
		$.ajax({
		  url: 'login.php',
		  method: 'POST',
		  data: {yeucau_dangnhap:1, t_k:tk, m_k:mk},
		  success: function(data){
			if (data == "thanhcongdangnhap") {
				window.location.href = "profile.php";
			}
		  }
		});
	});

});