<?php
session_start();

// Thêm topnav vào trang
function addTopNav()
{
    echo '
	<div class="top-nav group">
        <section>
            <div class="social-top-nav">
                <a class="fa fa-facebook"></a>
                <a class="fa fa-twitter"></a>
                <a class="fa fa-google"></a>
                <a class="fa fa-youtube"></a>
            </div> <!-- End Social Topnav -->

            <ul class="top-nav-quicklink flexContain">
                <li><a href="index.php">HOME</a></li>
                <li><a href="">SHOP</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">CONTACT</a></li>
            </ul> <!-- End Quick link -->
        </section><!-- End Section -->
    </div><!-- End Top Nav  -->';
}

// Thêm header
function addHeader()
{
    echo '        
	<div class="header group">
        <div class="smallmenu" id="openmenu" onclick="smallmenu(1)">≡</div>
        <div style="display: none;" class="smallmenu" id="closemenu" onclick="smallmenu(0)">×</div>
        <div class="logo">
            <a href="index.php">
                <img src="img/logoVeget.png" alt="Trang chủ" title="Trang chủ">
            </a>
        </div> <!-- End Logo -->

        <div class="content">
            <div class="search-header">
                <form class="input-search" method="get" action="index.php">
                    <div class="autocomplete">
                        <input id="search-box" name="search" autocomplete="off" type="text" placeholder="What do you need?">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                            Tìm kiếm
                        </button>
                    </div>
                </form> <!-- End Form search -->
                <div class="tags">
                    <strong>Từ khóa: </strong>
                </div>
            </div> <!-- End Search header -->

            <div class="tools-member">
                <div class="member">
                    <a onclick="checkTaiKhoan()" id="btnTaiKhoan">
                        <i class="fa fa-user"></i>
                        Tài khoản
                    </a>
                    <div class="menuMember hide">
                        <a href="nguoidung.php">User Page</a>
                        <a onclick="checkDangXuat();">Logout</a>
                    </div>
                </div> <!-- End Member -->

                <div class="cart">
                    <a href="giohang.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Cart</span>
                        <span class="cart-number"></span>
                    </a>
                </div> <!-- End Cart -->

                <!-- <div class="check-order">
                    <a>
                        <i class="fa fa-truck"></i>
                        <span>Order</span>
                    </a>
                </div>  -->
            </div><!-- End Tools Member -->
        </div> <!-- End Content -->
    </div> <!-- End Header -->';
}

function addGrid()
{
    echo '
    <div class="grid_section" style=" text-align:center;">
    <div class=" section_inner1">
        <div class="section_inner_margin1">
            <div class="vc_column_container1">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="image_with_text">
                            <img itemprop="image" src="https://bridge245.qodeinteractive.com/wp-content/uploads/2018/06/about-us-icon-1.png" alt="Vitamins">
                            <h3>Vitamins</h3>
                            <span style="margin: 6px 0px;" class="separator transparent">
                            </span>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div> 
                        <div class="vc_empty_space" style="height: 40px">
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_column_container1">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="image_with_text">
                            <img itemprop="image" src="https://bridge245.qodeinteractive.com/wp-content/uploads/2018/06/about-us-icon-2.png" alt="Minerals">
                            <h3>Minerals</h3>
                            <span style="margin: 6px 0px;" class="separator transparent"></span>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div> 
                        <div class="vc_empty_space" style="height: 40px">
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_column_container1">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="image_with_text">
                            <img itemprop="image" src="https://bridge245.qodeinteractive.com/wp-content/uploads/2018/06/about-us-icon-3.png" alt="Antioxidants">
                            <h3>Antioxidants</h3>
                            <span style="margin: 6px 0px;" class="separator transparent"></span>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div> 
                        <div class="vc_empty_space" style="height: 40px">
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_column_container1">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="image_with_text">
                            <img itemprop="image" src="https://bridge245.qodeinteractive.com/wp-content/uploads/2018/06/about-us-icon-4.png" alt="High-Fiber">
                            <h3>High-Fiber</h3>
                            <span style="margin: 6px 0px;" class="separator transparent"></span>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        </div> 
                        <div class="vc_empty_space" style="height: 40px">
                            <span class="vc_empty_space_inner">
                                <span class="empty_space_image"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
}
function addSection()
{
    echo'
    <div class="section_custom" style=" text-align:center;">
        <div class=" section_inner">
            <div class="section_inner_margin">
                <div class="vc_column_container">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="q_elements_holder">
                                <div class="q_elements_item" style="text-align:center;">
                                    <div class="q_elements_item_inner">
                                        <div class="q_elements_item_content "style="padding:0 14% 65px">
                                            <div class="wpb_single_image">
                                                <div class="wpb_wrapper">
                                                    <div class="vc_single_image-wrapper">
                                                        <img width="43" height="77" src="img/leave.png" class="vc_single_image-img" alt="a" decoding="async" loading="lazy" title="home-graphic-1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc_empty_space" style="height: 25px">
                                                <span class="vc_empty_space_inner">
                                                    <span class="empty_space_image"></span>
                                                </span>
                                            </div>
                                            <div class="wpb_text_column">
                                                <div class="wpb_wrapper">
                                                    <h1>Our Story</h1>
                                                </div>
                                            </div> 
                                            <div class="vc_empty_space" style="height: 10px">
                                                <span class="vc_empty_space_inner">
                                                    <span class="empty_space_image"></span>
                                                    
                                                </span>
                                            </div>
                                            <div class="wpb_text_column">
                                                <div class="wpb_wrapper">
                                                    <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</h4>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_custom" style=" text-align:left;">
                                <div class=" full_section_inner">
                                    <div class="vc_column_container vc_col-sm-12 vc_col-md-6 vc_col-has-fill">
                                        <div class="vc_custom_1">
                                            <div class="wpb_wrapper">
                                                <div class="q_elements_holder">
                                                    <div class="q_elements_item " style="background-image: url();background-position: center;background-size: cover;text-align:center;">
                                                        <div class="q_elements_item_inner">
                                                            <div class="q_elements_item_content" style="padding:75px 11%">
                                                                <div class="wpb_single_image">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="vc_single_image-wrapper">
                                                                            <img width="31" height="56" src="img/leave.png" class="vc_single_image-img" alt="a" decoding="async" loading="lazy" title="home-graphic-1-small" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_empty_space" style="height: 25px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                                <div class="wpb_text_column">
                                                                    <div class="wpb_wrapper">
                                                                        <h3 style="text-transform: uppercase;">Organic Farming</h3>
                                                                    </div>
                                                                </div> 
                                                                <div class="vc_empty_space" style="height: 10px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                                <div class="wpb_text_column">
                                                                    <div class="wpb_wrapper">
                                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>
                                                                    </div>
                                                                </div> 
                                                                <div class="vc_empty_space" style="height: 30px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_column_container vc_col-sm-12 vc_col-md-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="qode_video_box">
                                                    <a itemprop="image" class="qode_video_image" href="https://vimeo.com/53919100">
                                                        <img src="img/video1.jpg" />
                                                        <span class="qode_video_box_button_holder">
                                                            <span class="qode_video_box_button">
                                                                <span class="fa solid fa-play"></span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row" style=" text-align:left;">
                                <div class=" full_section_inner">
                                    <div class="vc_column_container vc_col-sm-12 vc_col-md-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="qode_video_box">
                                                    <a itemprop="image" class="qode_video_image" href="https://vimeo.com/17352483">
                                                        <img src="img/video2.jpg" />
                                                        <span class="qode_video_box_button_holder">
                                                            <span class="qode_video_box_button">
                                                                <span class="fa solid fa-play"></span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vc_column_container vc_col-sm-12 vc_col-md-6 vc_col-has-fill">
                                        <div class="vc_custom_2">
                                            <div class="wpb_wrapper">
                                                <div class="q_elements_holder">
                                                    <div class="q_elements_item " style="background-image: url();background-position: center;text-align:center;">
                                                        <div class="q_elements_item_inner">
                                                            <div class="q_elements_item_content" style="padding:75px 11%">
                                                                <div class="wpb_single_image">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="vc_single_image-wrapper">
                                                                            <img width="31" height="56" src="img/leave.png" class="vc_single_image-img" alt="a" decoding="async" loading="lazy" title="home-graphic-1-small" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vc_empty_space" style="height: 25px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                                <div class="wpb_text_column">
                                                                    <div class="wpb_wrapper">
                                                                        <h3 style="text-transform: uppercase;">FRESH PRODUCTS</h3>
                                                                    </div>
                                                                </div> 
                                                                <div class="vc_empty_space" style="height: 10px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                                <div class="wpb_text_column">
                                                                    <div class="wpb_wrapper">
                                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>
                                                                    </div>
                                                                </div> 
                                                                <div class="vc_empty_space" style="height: 30px">
                                                                    <span class="vc_empty_space_inner">
                                                                        <span class="empty_space_image"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}
// thêm home
function addHome()
{
    echo '
    <div class="banner">
        <div class="owl-carousel owl-theme"></div>
    </div> <!-- End Banner -->
    
    <div class="smallbanner" style="width: 100%;"></div>

    <div class="companysFilter">
        <button class="companysButton" onclick="setCompanysMenu()">
            <p>Category</p>
            <div id="iconOpenMenu">▷</div>
            <div id="iconCloseMenu" style="display: none;">▽</div>
        </button>
    </div>
    <div class= "container-welcome" style="display:block;text-align:center;padding:40px 90px" ;>

    <h2>
    WELCOME TO VEGAN ORGANIC FOOD
    </h2>
    <img src="img/logoWelcome.png" alt="" width="200" height="200">
    <p style="color:grey ">We provide a variety of vegetables and fruits that are grown and processed with special care to bring you fresh, nutritious products. You can be assured of the quality of our products, as we are committed to providing you with the best shopping experience and attentive service from our staff. Thank you for visiting our store!</p>

    </div>
    <div class="companyMenu group flexContain"></div>

    <div class="timNangCao">
        <div class="flexContain">
            <div class="pricesRangeFilter dropdown">
                <button class="dropbtn">Giá tiền</button>
                <div class="dropdown-content"></div>
            </div>

            <div class="promosFilter dropdown">
                <button class="dropbtn">Khuyến mãi</button>
                <div class="dropdown-content"></div>
            </div>

            <div class="starFilter dropdown">
                <button class="dropbtn">Số lượng sao</button>
                <div class="dropdown-content"></div>
            </div>

            <div class="sortFilter dropdown">
                <button class="dropbtn">Sắp xếp</button>
                <div class="dropdown-content"></div>
            </div>            
        </div>
        
        <div>
            <input type="text" class="js-range-slider" id="demoSlider">
        </div>

    </div> <!-- End khung chọn bộ lọc -->

    <div class="choosedFilter flexContain"></div> <!-- Những bộ lọc đã chọn -->
    <hr>

    <!-- Mặc định mới vào trang sẽ ẩn đi, nế có filter thì mới hiện lên -->
    <div class="contain-products" style="display:none">
    <div class="filterName">
        <div id="divSoLuongSanPham"></div>
        <input type="text" placeholder="Lọc trong trang theo tên..." onkeyup="filterProductsName(this)">
        <div class="loader" style="display: none"></div>
    </div> <!-- End FilterName -->

    <ul id="products" class="homeproduct group flexContain">
        <div id="khongCoSanPham">
            <i class="fa fa-times-circle"></i>
            Không có sản phẩm nào
        </div> <!-- End Khong co san pham -->
    </ul><!-- End products -->

    <div class="pagination"></div>
    </div>

    <!-- Div hiển thị khung sp hot, khuyến mãi, mới ra mắt ... -->
    <div class="contain-khungSanPham"></div>';
}

// Thêm chi tiết sản phẩm
function addChiTietSanPham()
{
    echo '
    <div class="chitietSanpham" style="min-height: 85vh">
    
        <div class="rowdetail group">
            <div class="picture">
                <img src="">
            </div>
            <div class="price_sale">
                <h1></h1>
                <div class="area_price"> </div>
                <div class="ship" style="display: none;">
                    <i class="fa fa-clock-o"></i>
                    <div>Delivery in 1 hour</div>
                </div>

                <div class = "detail-area">

                </div>
                
                <div class="area_order">    
                    <!-- nameProduct là biến toàn cục được khởi tạo giá trị trong phanTich_URL_chiTietSanPham -->
                    <a class="buy_now" onclick="themVaoGioHang(maProduct, nameProduct);">
                        <h3><i class="fa fa-plus"></i> ADD TO CART</h3>
                    </a>
                </div>
            </div>

        </div>
        <hr>
        <div class="comment-area">
            <div class="guiBinhLuan">
                <div class="stars">
                    <form action="">
                        <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5" title="Tuyệt vời"></label>

                        <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4" title="Tốt"></label>

                        <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3" title="Tạm"></label>

                        <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2" title="Khá"></label>

                        <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1" title="Tệ"></label>
                    </form>
                </div>
                <textarea maxlength="250" id="inpBinhLuan" placeholder="Leave your comment..."></textarea>
                <input id="btnBinhLuan" type="button" onclick="checkGuiBinhLuan()" value="SEND">
            </div>
            <!-- <h2>Bình luận</h2> -->
            <div class="container-comment">
                <div class="rating"></div>
                <div class="comment-content">
                </div>
            </div>
        </div>
    </div>';
}

// Thêm footer
function addFooter()
{
    echo '
    <!-- ============== Alert Box ============= -->
    <div id="alert">
        <span id="closebtn">&otimes;</span>
    </div>

    <!-- ============== Footer ============= -->
    <div class="copy-right">
        <p>
            All rights reserved © 2023-' . date("Y") . ' - Designed by
            <span style="color: #eee; font-weight: bold">Vegan-group</span>
        </p>
    </div>';
}

// Thêm contain Taikhoan
function addContainTaiKhoan()
{
    echo '
	<div class="containTaikhoan">
    <span class="close" onclick="showTaiKhoan(false);">&times;</span> 
        <div class=" taikhoan">
            
            <div class="tab-content">
                <div id="login">
                    <h1>Login</h1>
                    <!-- <form onsubmit="return logIn(this);"> -->
                    <form action="" method="post" name="formDangNhap" onsubmit="return checkDangNhap();">
                        <div class="field-wrap">
                            <label>
                                Username<span class="req">*</span>
                            </label>
                            <input name="username" type="text" id="username" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input name="pass" type="password" id="pass" required autocomplete="off" />
                        </div> <!-- pass -->
                        <p class="forgot"><a href="#">Forgot password?</a></p>
                        <button type="submit" class="button button-block" />Login</button>
                        <ul class="tab-group">
                        <li class="tab"><h3>Don\'t have an account?<h3><a href="#signup">Sign up</a></li>
                    </ul> <!-- /tab group -->
                        </form> <!-- /form -->
                </div> <!-- /log in -->
                <div id="signup">
                    <h1>Free Signup</h1>
                    <!-- <form onsubmit="return signUp(this);"> -->
                    <form action="" method="post" name="formDangKy" onsubmit="return checkDangKy();">
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    LastName<span class="req">*</span>
                                </label>
                                <input name="ho" type="text" id="ho" required autocomplete="off" />
                            </div>
                            <div class="field-wrap">
                                <label>
                                    FirstName<span class="req">*</span>
                                </label>
                                <input name="ten" id="ten" type="text" required autocomplete="off" />
                            </div>
                        </div> <!-- / ho ten -->
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    PhoneNumber<span class="req">*</span>
                                </label>
                                <input name="sdt" id="sdt" type="text" pattern="\d*" minlength="10" maxlength="12" required autocomplete="off" />
                            </div> <!-- /sdt -->
                            <div class="field-wrap">
                                <label>
                                    Email<span class="req">*</span>
                                </label>
                                <input name="email" id="email" type="email" required autocomplete="off" />
                            </div> <!-- /email -->
                        </div>
                        <div class="field-wrap">
                            <label>
                                Address<span class="req">*</span>
                            </label>
                            <input name="diachi" id="diachi" type="text" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Username<span class="req">*</span>
                            </label>
                            <input name="newUser" id="newUser" type="text" required autocomplete="off" />
                        </div> <!-- /user name -->
                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input name="newPass" id="newPass" type="password" required autocomplete="off" />
                        </div> <!-- /pass -->
                        <button type="submit" class="button button-block" />Create</button>
                        <ul class="tab-group">
                
                        <li class="tab active"><h3>Have an account?<h3><a href="#login">Login</a></li>
                    </ul> 
                        </form>
                    
                    <!-- /form -->
                </div> <!-- /sign up -->
            </div><!-- tab-content -->
           
        </div> <!-- /taikhoan -->
    </div>
';
}
function addContact()
{
    echo '
    <div id="section2">
        <div id="subcribe">
            <div class="text">
                <div>
                    <h2>GET IN TOUCH!</h2>
                </div>
                <div>Send a message that you have questions about</div> 
                <div>or Sign up for our newsletter to receive notifications of new products, restocks, and sales!</div>
                <div class="Newsletter_Inner">
                    <input type="hidden" name="contact[tags]" value="newsletter">
                    <input id="email" type="email" name="contact[email]" class="Form_Input"
                        aria-label="Enter your email" placeholder="Enter your email" required=""></br>
                    <input id="message" type="text" name="contact[message]" class="Form_Input"
                        aria-label="Enter your message" placeholder="Enter your message" required=""></br>
                    <button type="submit" class="button" onclick=Subscribe_redirect()>SEND YOUR MESSAGE</button>
                </div>
            </div>
        </div>
    </div>
    ';
}
// Thêm plc (phần giới thiệu trước footer)
function addPlc()
{
    echo '
    <div class="plc">
        <section>
            <ul class="flexContain">
                <li>Express delivery in 1 hour</li>
                <li>Flexible payment: cash, visa / master</li>
                <li>Product experience at home</li>
                <li>
                    Hotline:
                    <a href="tel:12345678" style="color: #288ad6;">1234.5678</a>
                </li>
            </ul>
        </section>
    </div>';
}
