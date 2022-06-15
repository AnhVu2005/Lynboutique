<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sản phẩm</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./img/logo.jpg">
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/header.php'; ?>

  	<!-- shop content section start -->
	<div class="pages products-page section-padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="right-products">
						<div class="row">
							<div class="grid-content">
								<?php
									// lấy từ khóa tìm kiếm
									if(isset($_GET['tu_khoa'])) {
										$tu_khoa = $_GET['tu_khoa'];
									} else {
										$tu_khoa = '';
									}

									// Lấy danh sách sản phẩm và phân trang
									// BƯỚC 2: TÌM TỔNG SỐ RECORDS
									$result = mysqli_query($ket_noi, "select count(id_sp) as total from tbl_san_pham WHERE ten_sp LIKE '%$tu_khoa%'");
									$row = mysqli_fetch_assoc($result);
									$total_records = $row['total'];
									
									// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
									$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
									$limit = 12;
									
									// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
									// tổng số trang
									$total_page = ceil($total_records / $limit);
									
									// Giới hạn current_page trong khoảng 1 đến total_page
									if ($current_page > $total_page){
										$current_page = $total_page;
									} else if ($current_page < 1){
										$current_page = 1;
									}
									
									// Tìm Start
									$start = ($current_page - 1) * $limit;
									
									// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH SẢN PHẨM
									// Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
									$sp_query = mysqli_query($ket_noi, "SELECT * FROM tbl_san_pham WHERE ten_sp LIKE '%$tu_khoa%' LIMIT $start, $limit");
									// PHẦN HIỂN THỊ SẢN PHẨM
									// BƯỚC 6: HIỂN THỊ DANH SÁCH SẢN PHẨM
									if ( $sp_query) {
									
									while ($row = mysqli_fetch_assoc($sp_query)){
								?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="single-product">
											<div class="product-img">
												<div class="pro-type">
													<span>new</span>
												</div>
												<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>">
													<img src="/DoAnTotNghiep/img/<?php echo $row["anh"]; ?>"/>
												</a>
												<div class="actions-btn">
													<a href="?them_gio_hang=<?php echo $row["id_sp"]; ?>&size-pick=m&so_luong_sp=1"><i class="mdi mdi-cart"></i></a>
													<a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><i class="mdi mdi-eye"></i></a>
												</div>
											</div>
											<div class="product-dsc">
												<p><a href="/DoAnTotNghiep/chi_tiet_sp.php?id_sp=<?php echo $row["id_sp"]; ?>"><?php echo $row["ten_sp"];?></a></p>
												<span><?php echo $row["gia_giam"];?> vnđ <del><?php echo $row["gia_ban"];?></del></span>
											</div>
										</div>
									</div>
								<?php
									}}else{
										echo 'Không có sản phẩm nào trùng khớp.';
									}
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="pagnation-ul">
									<ul class="clearfix">
										<?php
											// PHẦN HIỂN THỊ PHÂN TRANG
											// BƯỚC 7: HIỂN THỊ PHÂN TRANG
											
											// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
											if ($current_page > 1 && $total_page > 1){
												echo '<li><a href="/DoAnTotNghiep/san_pham.php?page='.($current_page-1).'"><i class="mdi mdi-menu-left"></i></a></li>';
											}
											
											// Lặp khoảng giữa
											for ($i = 1; $i <= $total_page; $i++){
												// nếu có từ khóa tìm kiếm thì thêm vào link
												if(isset($_GET['tu_khoa'])) {
													$tu_khoa=$_GET['tu_khoa'];
													echo '<li><a href="/DoAnTotNghiep/san_pham.php?page='.$i.'&&ty_khoa='.$tu_khoa.'">'.$i.'</a></li>';
												} else {
													echo '<li><a href="/DoAnTotNghiep/san_pham.php?page='.$i.'">'.$i.'</a></li>';
												}
											}
											
											// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
											if ($current_page < $total_page && $total_page > 1){
												echo '<li><a href="/DoAnTotNghiep/san_pham.php?page='.($current_page+1).'"><i class="mdi mdi-menu-right"></i></a></li>';
											}

										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop content section end -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>