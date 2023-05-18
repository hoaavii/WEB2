var nameProduct, maProduct; // Tên sản phẩm trong trang này, 
// // là biến toàn cục để có thể dùng ở bát cứ đâu trong trang
// // không cần tính toán lấy tên từ url nhiều lần

window.onload = function() {
    khoiTao();

    // thêm tags (từ khóa) vào khung tìm kiếm
    var tags = ["Potato", "Mango", "Fruit"];
    for (var t of tags) addTags(t, "index.php?search=" + t, true);

    phanTichURL_Web2();
}

// ======================= Web 2 =======================
function phanTichURL_Web2() {
    maProduct = window.location.href.split('?')[1]; // lấy tên
    if (!maProduct) return; // nếu không tìm thấy tên thì thoát hàm

    $.ajax({
        type: "POST",
        url: "php/xulysanpham.php",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            request: "getbyid",
            id: maProduct
        },
        success: function(data, status, xhr) {
            // console.log(data);
            addChiTietToWeb(data);
            nameProduct = data.TenSP;
        },
        error: function(e) {
            Swal.fire({
                type: "error",
                title: "Lỗi lấy sản phẩm (chitietSanpham.js > phanTichURL_Web2)",
                html: e.responseText
            });
        }
    })
}

function addChiTietToWeb(p) {
    var divChiTiet = document.getElementsByClassName('chitietSanpham')[0];

    // Đổi title
    document.title = p.TenSP + ' - Vegan Food';

    // Cập nhật tên h1
    var h1 = divChiTiet.getElementsByTagName('h1')[0];
    h1.innerHTML += p.TenSP;

    // Cập nhật sao
    var rating = "";
    if (p.SoSao > 0) {
        rating = getRateStar(p.SoSao);
        rating += `<span> ` + p.SoDanhGia + ` đánh giá </span>`;
    }
    divChiTiet.getElementsByClassName('rating')[0].innerHTML += rating;

    // Cập nhật giá + label khuyến mãi
    var area_price = divChiTiet.getElementsByClassName('area_price')[0];
    // Chuyển giá tiền sang dạng tag html
    var giaTri = parseInt(p.DonGia);
    var giaTrikhuyenMai = parseInt(p.KM.GiaTriKM);
    var giaTriSauKM = giaTri - giaTrikhuyenMai;

    var pricediv, khuyenmaidiv;

    if (p.KM.LoaiKM == "GiaReOnline") {

        area_price.innerHTML = `<strong>` + giaTriSauKM.toLocaleString() + `&#8363;</strong>
                <span>` + giaTri.toLocaleString() + `&#8363;</span>`;

        area_price.innerHTML += promoToWeb(p.KM.LoaiKM, giaTriSauKM);
    } else {
        document.getElementsByClassName('ship')[0].style.display = ''; // hiển thị 'giao hàng trong 1 giờ'
        
        khuyenmaidiv = promoToWeb(p.KM.LoaiKM, giaTrikhuyenMai);
        area_price.innerHTML = `<strong>` + giaTri.toLocaleString() + `&#8363;</strong>` + khuyenmaidiv;
    }

    // Cập nhật chi tiết khuyến mãi
    document.getElementById('detailPromo').innerHTML = getDetailPromo(p);

    // Cập nhật thông số
    var info = document.getElementsByClassName('info')[0];
    var s = "";
    var s = addThongSo('Mô tả', p.MoTa);
    s += addThongSo('Trọng lượng', p.TrongLuong);
    info.innerHTML = s;

    // Cập nhật hình
    var hinh = divChiTiet.getElementsByClassName('picture')[0];
    hinh = hinh.getElementsByTagName('img')[0];
    hinh.src = p.HinhAnh;

    // Test bình luận
    refreshBinhLuan();
}

function checkGuiBinhLuan() {
    getCurrentUser((user) => {
        if(user == null) {
            Swal.fire({
                title: 'Hi!',
                text: 'You need to be logged in to comment',
                type: 'error',
                width : '250px',
                confirmButtonText: 'Login',
                cancelButtonText: 'Return',
                confirmButtonColor : '#feb142',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    showTaiKhoan(true);
                }
            })
        } else {
            guiBinhLuan(user);
        }

    }, (error) => {
        Swal.fire({
            title: 'Error!',
            text: 'There was an error posting the review',
            type: 'error',
            width : '250px'
            
        })
    })
}

function guiBinhLuan(nguoidung) {
    var soSao = $("input[name='star']:checked").val();
    var binhLuan = $("#inpBinhLuan").val();

    if(!soSao) {
        Swal.fire({
            text: 'Can you please rate the stars?',
            type: 'warning',
            width : '250px'
        })
        return;
    }

    if(!binhLuan) {
        Swal.fire({
            text: 'Please leave a comment',
            type: 'warning',
            width : '250px'
        })
        $("#inpBinhLuan")[0].focus();
        return;
    }


    $.ajax({
        type: "POST",
        url: "php/xulydanhgia.php",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            request: "thembinhluan",
            masp: maProduct,
            mand: nguoidung.MaND,
            sosao: soSao,
            binhluan: binhLuan,
            thoigian: new Date().toMysqlFormat()
        },
        success: function(data, status, xhr) {
            $("#inpBinhLuan").val("");
            refreshBinhLuan();
        },
        error: function(e) {
            console.log(e);
        }
    })
}

function refreshBinhLuan() {
    $.ajax({
        type: "POST",
        url: "php/xulydanhgia.php",
        dataType: "json",
        timeout: 1500, // sau 1.5 giây mà không phản hồi thì dừng => hiện lỗi
        data: {
            request: "getbinhluan",
            masp: maProduct
        },
        success: function(data, status, xhr) {
            var div = document.getElementsByClassName("comment-content")[0];
            div.innerHTML = "";
            for(var b of data) {
                div.innerHTML += createComment(b.ND.TaiKhoan, b.BinhLuan, getRateStar(b.SoSao), b.NgayLap);
            }
        },
        error: function(e) {
            console.log(e);
        }
    })
}

// =====================================================

function getRateStar(num) {
    var result = "";
    for (var i = 1; i <= 5; i++) {
        if (i <= num) {
            result += `<i class="fa fa-star"></i>`
        } else {
            result += `<i class="fa fa-star-o"></i>`
        }
    }
    return result;
}

// Chi tiết khuyến mãi
function getDetailPromo(sp) {
    switch (sp.KM.LoaiKM) {
        case 'tragop':
            var span = `<span style="font-weight: bold"> săn sale ` + sp.KM.GiaTriKM + `% </span>`;
            return `Sản phẩm được hỗ trợ giá giảm ` + span ;

        case 'giamgia':
            var span = `<span style="font-weight: bold">` + Number(sp.KM.GiaTriKM).toLocaleString() + `</span>`;
            return `Khách hàng sẽ được giảm ` + span + `₫ khi tới mua trực tiếp tại cửa hàng`;

        case 'moinhap':
            return `Những loại trái cây rau củ được nhập về để phục vụ khách hàng`;

        case 'giareonline':
            var del = Number(p.DonGia) - Number(p.KM.GiaTriKM);
            var span = `<span style="font-weight: bold">` + numToString(del) + `</span>`;
            return `Sản phẩm sẽ được giảm ` + span + `₫ khi mua hàng online`;

        default:
            var span = `<span style="font-weight: bold">Free shipping</span>`;
            return `Đơn hàng sẽ được ` + span + ` khi mua trong hôm nay`;
    }
}

function addThongSo(ten, giatri) {
    return `<li>
                <p>` + ten + `</p>
                <div>` + giatri + `</div>
            </li>`;
}

function createComment(name, value, star, time) {
    return `<div class="comment">
                <i class="fa fa-user-circle"> </i>
                <h4>` + name + `<span> `+ star +`</span></h4>
                <p>` + value + `</p>
                <span class="time">` + time + `</span>
            </div>`;
}

/*// add hình
function addSmallImg(img) {
    var newDiv = `<div class='item'>
                        <a>
                            <img src=` + img + ` onclick="changepic(this.src)">
                        </a>
                    </div>`;
    var banner = document.getElementsByClassName('owl-carousel')[0];
    banner.innerHTML += newDiv;
}

// đóng mở xem hình
function opencertain() {
    document.getElementById("overlaycertainimg").style.transform = "scale(1)";
}

function closecertain() {
    document.getElementById("overlaycertainimg").style.transform = "scale(0)";
}

// đổi hình trong chế độ xem hình
function changepic(src) {
    document.getElementById("bigimg").src = src;
}*/
