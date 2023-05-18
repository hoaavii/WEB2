var TotalPrice = 0;
window.onload = function() {
    khoiTao();

    // thêm tags (từ khóa) vào khung tìm kiếm
    var tags = ["Potato", "Mango", "Fruit"];
    for (var t of tags) addTags(t, "index.php?search=" + t)

    var listGioHang = getListGioHang();
    getListFromDB(listGioHang);
}

function getListFromDB(list) {
    if (!list || !list.length) {
        addProductToTable(list);
        return;
    };

    var listID = [];
    for (var p of list) {
        listID.push(p.masp);
    }

    $.ajax({
        type: "POST",
        url: "php/xulysanpham.php",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            request: "getlistbyids",
            listID: listID
        },
        success: function(data, status, xhr) {
            // addSanPhamToTable(data);
            for (var p of data) {
                for (var g of list) {
                    if (p.MaSP == g.masp) {
                    	if(p.SoLuong >= g.soLuong) { // check đủ hàng
                        	p.SoLuongTrongGio = g.soLuong;
                    	} else {
                    		p.SoLuongTrongGio = p.SoLuong;

                    		g.soLuong = Number(p.SoLuong); // thay dổi trong localstorage luôn 
                    		setListGioHang(list); // cập nhật localstorage
            				animateCartNumber();

                    		Swal.fire({
                    			title: "Không đủ sản phẩm",
                    			type: "error",
                    			text: "Số lượng sản phẩm " + p.TenSP + " trong kho không đủ(" + p.SoLuong + ")"
                    		})
                    	}
                    }
                }
            }
            addProductToTable(data);
        },
        error: function(e) {
            console.log(e.responseText);
        }
    })
}

function addProductToTable(listProduct) {
    var table = document.getElementsByClassName('listSanPham')[0];

    var s = `
		<tbody>
			<tr>
				<th>Product</th>
				<th>Cost</th>
				<th>Amount</th>
				<th>Total</th>
				<th>Detele</th>
			</tr>`;

    if (!listProduct || listProduct.length == 0) {
        s += `
			<tr>
				<td colspan="7"> 
					<h1 style="color:#feb142; background-color:white; font-weight:bold; text-align:center; padding: 15px 0;">
						Empty!!
					</h1> 
				</td>
			</tr>
		`;
        table.innerHTML = s;
        return;
    }

    var totalPrice = 0;
    for (var i = 0; i < listProduct.length; i++) {
        var p = listProduct[i];
        var masp = p.MaSP;
        var soluongSp = p.SoLuongTrongGio;
        var price = Number(p.DonGia) - Number(p.KM.GiaTriKM);
        var thanhtien = price * soluongSp;

        s += `
			<tr>
				<td class="noPadding">
					<a target="_blank" href="chitietsanpham.php?` + p.MaSP + `" title="Xem chi tiết">
						<img class="smallImg" src="` + p.HinhAnh + `">
						<br>
						` + p.TenSP + `
					</a>
				</td>
				<td class="alignRight">` + numToString(price) + ` ₫</td>
				<td class="soluong" >
					<button onclick="giamSoLuong('` + masp + `')"><i class="fa fa-minus"></i></button>
					<input size="1" onchange="capNhatSoLuongFromInput(this, '` + masp + `')" value=` + soluongSp + `>
					<button onclick="tangSoLuong('` + masp + `')"><i class="fa fa-plus"></i></button>
				</td>
				<td class="alignRight">` + numToString(thanhtien) + ` ₫</td>
				<td class="noPadding"> 
					<i class="fa fa-trash" onclick="xoaSanPhamTrongGioHang(` + masp + ",'" + p.TenSP + `')"></i> 
				</td>
			</tr>
		`;
        // Chú ý nháy cho đúng ở giamsoluong, tangsoluong
        totalPrice += thanhtien;
    }

    TotalPrice = totalPrice;

    s += `
			<tr style="font-weight:bold; text-align:center">
				<td colspan="3">TOTAL: </td>
				<td class="alignRight" style="color:red">` + numToString(totalPrice) + ` ₫</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5">
					<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="thanhToan()">
						<i class="fa fa-usd"></i> Pay
					</button> 
					<button class="btn btn-danger" onclick="xoaHet()">
						<i class="fa fa-trash-o"></i>Remove all
					</button>
				</td>
			</tr>
		</tbody>
	`;

    table.innerHTML = s;
}

function xoaSanPhamTrongGioHang(masp, tensp) {

    Swal.fire({
        type: "question",
        title: "Confirm delete",
        html: "Are you sure you want to delete the product <b style='color:red'>" + tensp + "</b> ?",
        // grow: "row",
        width:'500px',
        allowOutsideClick: true, //popup có thể được đóng bằng cách nhấp chuột bên ngoài popup.
        confirmButtonText: 'Confirm',
        showConfirmButton:true,
        confirmButtonColor: '#feb142',
        cancelButtonText: 'Cancel',
        showCancelButton: true

    }).then((result) => {
        if (result.value) {
            var listProduct = getListGioHang();

            for (var i = 0; i < listProduct.length; i++) {
                if (listProduct[i].masp == masp) {
                    listProduct.splice(i, 1);
                    break;
                }
            }

            capNhatMoiThu(listProduct);
        }
    });
}

function thanhToan() {
    var listProduct = getListGioHang();
    
    if (!listProduct.length) {
        Swal.fire({
            type: 'info',
            title: "Empty",
            with: '500px',
            text: 'There are no items to pay for.'
        });
        return;
    }

    getCurrentUser((user) => {
        if (user == null) {
            Swal.fire({
                title: 'Notification',
                text: 'You need to login to make a purchase',
                type: 'info',
                with: '500px',
                confirmButtonText: 'Login',
                cancelButtonText: 'Return',
                confirmButtonColor: '#feb142',

                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    showTaiKhoan(true);
                }
            })

        } else if (user.TrangThai == 0) {
            Swal.fire({
                title: 'Account Locked!',
                text: 'Your account is currently locked so you can\'t make purchases!',
                type: 'error',
                with: '500px',
                confirmButtonText: 'Return',
                confirmButtonColor: '#feb142',
                footer: '<a href>Contact with Admin</a>'
            });
        } else {
        	UserHienTai = user;  // biến toàn cục
        	htmlThanhToan(user);
        }

    }, (error) => {
        console.log(error.responseText);
    });
}
//noi dung form thanh toan
function htmlThanhToan(userHienTai) {
	console.log('abc')

	$("#thongtinthanhtoan").html(`
		<form>
		  	<div class="form-group">
		    <p>Total : <h2>` + TotalPrice.toLocaleString() + `đ </h2></p>
		  </div>
		  <div class="form-group">
		    <label for="inputTen">Name</label>
		    <input class="form-control input-sm" id="inputTen" required type="text" value="` + (userHienTai.Ho + " " + userHienTai.Ten) + `">
		  </div>
		   <div class="form-group">
		    <label for="inputSDT">Phone number</label>
		    <input class="form-control input-sm" id="inputSDT" required type="text" pattern="\\d*" minlength="10" maxlength="12" value="` + userHienTai.SDT + `">
		  </div>
		  <div class="form-group">
		    <label for="inputDiaChi">Address</label>
		    <input class="form-control input-sm" id="inputDiaChi" required type="text" value="` + userHienTai.DiaChi + `">
		  </div>
		  <div class="form-group">
          <label for="selectHinhThucTT">Payments</label>
		    <select class="browser-default custom-select" id="selectHinhThucTT">
			  <option value="Trực tiếp khi nhận hàng">Directly when receiving goods</option>
			  <option value="Qua thẻ ngân hàng">Via bank card</option>
			</select>
		  </div>
		</form>
	 `);
}
Date.prototype.toMysqlFormat = function () {
    var yyyy = this.getFullYear();
    var mm = this.getMonth() + 1;
    var dd = this.getDate();
    var hh = this.getHours();
    var mi = this.getMinutes();
    var ss = this.getSeconds();

    // `padStart(2, '0')` được sử dụng để đảm bảo rằng các giá trị ngày, tháng, giờ, phút và giây đều được 
    // viết dưới dạng chuỗi có 2 ký tự, và nếu chiều dài chuỗi đang nhỏ hơn 2 ký tự, thì sẽ được thêm vào đầu 
    // chuỗi các ký tự "0" để hoàn thành chiều dài 2 ký tự. 

    return yyyy + '-' + mm.toString().padStart(2, '0')
                 + '-' + dd.toString().padStart(2, '0')
                 + ' ' + hh.toString().padStart(2, '0')
                 + ':' + mi.toString().padStart(2, '0')
                 + ':' + ss.toString().padStart(2, '0');
};

// Sử dụng phương thức mới để lấy thời gian hiện tại ở định dạng MySQL

function xacNhanThanhToan() {
    var ngayLap = new Date().toMysqlFormat();

	var dulieu = {
		maNguoiDung: UserHienTai.MaND,
		tenNguoiNhan: $("#inputTen").val(),
		sdtNguoiNhan: $("#inputSDT").val(),
		diaChiNguoiNhan: $("#inputDiaChi").val(),
		phuongThucTT: $("#selectHinhThucTT").val(),
		dssp: getListGioHang(),
		tongTien: TotalPrice,
		ngayLap: ngayLap
	}

	$.ajax({
		type: "POST",
		url: "php/xulythanhtoan.php",
		dataType: "json",
		data: {
			request: "themdonhang",
			dulieu: dulieu
		},
		success: function(data) {
			capNhatMoiThu([]);
		},
		error: function(e) {
            console.log(e.responseText)
		}
        
	})

    //làm trống giỏ hàng sau khi đặt hàng
    listProduct = [];
    capNhatMoiThu(listProduct);
	return false;
}

  

function xoaHet() {
    var listProduct = getListGioHang();

    if (listProduct.length) {
        Swal.fire({
            title: 'Remove All?',
            text: 'Are you sure you want to delete all the products in the cart! This cannot be refunded.',
            type: 'warning',
            with: '600px',
            confirmButtonText: 'Sure',
            cancelButtonText: 'Cancel',
            showCancelButton: true,
            confirmButtonColor: '#feb142'

        }).then((result) => {
            if (result.value) {
                listProduct = [];
                capNhatMoiThu(listProduct);
            }
        })
    }
}

// Cập nhật số lượng lúc nhập số lượng vào input
function capNhatSoLuongFromInput(inp, masp) {
    var soLuongMoi = Number(inp.value);
    if (!soLuongMoi || soLuongMoi <= 0) soLuongMoi = 1;

    var listProduct = getListGioHang();

    for (var p of listProduct) {
        if (p.masp == masp && p.soLuong > 0) {
            p.soLuong = soLuongMoi;
        }
    }

    capNhatMoiThu(listProduct);
}

function tangSoLuong(masp) {
    var listProduct = getListGioHang();

    for (var p of listProduct) {
        if (p.masp == masp) {
            p.soLuong++;
        }
    }

    capNhatMoiThu(listProduct);
}

function giamSoLuong(masp) {
    var listProduct = getListGioHang();

    for (var p of listProduct) {
        if (p.masp == masp && p.soLuong > 1) {
            p.soLuong--;
        }
    }

    capNhatMoiThu(listProduct);
}

function capNhatMoiThu(list) { // Mọi thứ
    animateCartNumber();

    setListGioHang(list);

    // cập nhật danh sách sản phẩm ở table
    getListFromDB(list);
}
