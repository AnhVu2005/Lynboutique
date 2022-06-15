<?php 
	session_start();
	if(!$_SESSION['email']) {
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn không có quyền truy cập!');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = '/DoAnTotNghiep/admin/dang_nhap.php'
			</script>
		";
	}
;?>
<!DOCTYPE html>
<html>
<head>
  <?php include('../includes/head.php') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
	<?php include('../includes/header.php') ?>

	<?php include('../includes/sidebar.php') ?>

	<?php include('../includes/ket_noi.php') ?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
			    <div class="row">
			        <div class="col-12">
			            <!-- Main content -->
			            <div class="invoice p-3 mb-3">
			                <!-- title row -->
			                <div class="row">
			                    <div class="col-12">
			                        <h4>

			                    <i class="fas fa-globe"></i> Chi tiết đơn hàng

			                  </h4>
			                    </div>
			                    <!-- /.col -->
			                </div>
			                <!-- info row -->
			                <tbody>
							<?php
								$id_hdb = $_GET['id'];
								// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
								$sql = "SELECT * FROM tbl_hdb WHERE id_hdb=$id_hdb"; 

								// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
								$query_hdb = mysqli_query($ket_noi, $sql);

								// 4. Hiển thị dữ liệu mong muốn
								$hdb = mysqli_fetch_array($query_hdb);
							?>
			                <div class="row invoice-info">
			                    
			                    <!-- /.col -->
			                    <div class="col-sm-4 invoice-col">
			                      
			                    <address>
			                    	<br>
			                    <b>Tên khách hàng:</b> <?php echo $hdb["ten_kh"];?> <br>

			                    <b>Địa chỉ:</b> <?php echo $hdb["dia_chi"];?><br>

			                    <b>Email:</b> <?php echo $hdb["email"];?><br>
 
			                    <b>SDT:</b> <?php echo $hdb["sdt"];?>
			                  </address>
			                    </div>
			                    <!-- /.col -->
			                    <div class="col-sm-4 invoice-col"> 
			                        <br>
			                        <br>
			                        <b>Order ID:</b> <?php echo $hdb["id_hdb"];?> 
			                        <br>
			                        <b>Ngày đặt hàng:</b> <?php echo $hdb["ngay_dat_hang"];?>
			                        <br>
			                        <b>Account:</b> <?php echo $hdb["id_khach_hang"];?>
			                    </div>
								<div class="col-sm-4 invoice-col">
									<form action="./sua_thuc_hien.php" method="POST">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Trạng thái đơn hàng</label>
											<select class="form-control" name ="trangThai" id="exampleFormControlSelect1">
											<option <?php echo $hdb['trang_thai']  == "Chờ xác nhận" ? 'selected': ''  ?> value="Chờ xác nhận">Chờ xác nhận</option>
											<option <?php echo $hdb['trang_thai']  == "Đặt hàng" ? 'selected': ''  ?> value="Đặt hàng">Đặt hàng</option>
											<option <?php echo $hdb['trang_thai']  == "Hủy đơn" ? 'selected': ''  ?> value="Hủy đơn">Hủy đơn</option>
											<option <?php echo $hdb['trang_thai']  == "Đã nhận hàng" ? 'selected': ''  ?> value="Đã nhận hàng">Đã nhận hàng</option>
											</select>
										</div>
										<input type="hidden" name="id_hdb" value="<?php echo $hdb["id_hdb"];?>">
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
			                    <!-- /.col -->
			                </div>
			                <!-- /.row -->

			                <!-- Table row -->
			                <div class="row">
			                    <div class="col-12 table-responsive">
			                        <table class="table table-striped">
			                            <thead>
			                                <tr>
			                                    <th>STT</th>
			                                    <th>Hình ảnh</th>
			                                    <th>Tên sản phẩm </th>
												<th>Size </th>
			                                    <th>Giá bán</th>
			                                    <th>Số lượng</th>
			                                    <th>Thành tiền</th>
			                                </tr>
			                            </thead>
			                            <tbody>
										<?php 
											// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
											$sql = "SELECT tbl_chi_tiet_hdb.size , tbl_chi_tiet_hdb.gia_ban, tbl_chi_tiet_hdb.so_luong, tbl_chi_tiet_hdb.tong_tien, tbl_san_pham.ten_sp, tbl_san_pham.anh FROM tbl_chi_tiet_hdb
												INNER JOIN tbl_san_pham ON tbl_chi_tiet_hdb.id_sp = tbl_san_pham.id_sp
												WHERE tbl_chi_tiet_hdb.id_hdb = $id_hdb
											"; 

											// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
											$query_chi_tiet = mysqli_query($ket_noi, $sql);

											// 4. Hiển thị dữ liệu mong muốn
											$i=0;
											while ($sp = mysqli_fetch_array($query_chi_tiet)) {
												$i++;
										?>
			                                <tr>
			                                    <td><?php echo $i; ?></td>
												<td>
													<img src="/DoAnTotNghiep/img/<?php 
														if ($sp["anh"]<>"") {
															echo $sp["anh"];
														} else {
															echo "diep4.png";
														}
													;?>" width="100px" height="auto">
												</td>
			                                    <td><?php echo $sp['ten_sp']; ?></td>
												<td style="text-transform: uppercase;" ><?php echo $sp['size']; ?></td>
			                                    <td><?php echo $sp['gia_ban']; ?></td>
			                                    <td><?php echo $sp['so_luong']; ?></td>
			                                    <td><?php echo $sp['tong_tien']; ?></td>
											</tr>
										<?php
											}
										?>
			                            </tbody>
			                        </table>
			                    </div>
			                    <!-- /.col -->
			                </div>
			                <!-- /.row -->

			                <div class="row">
			                    <!-- accepted payments column -->
			                    <div class="col-6">
			                    </div>
			                    <!-- /.col -->
			                    <div class="col-6">
			                        <div class="table-responsive">
			                            <table class="table">
			                                <tbody>
			                                    <tr>
			                                        <th>Tổng:</th>
			                                        <td><?php echo $hdb["tong_tien"];?> vnđ</td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
			                    </div>
			                    <!-- /.col -->
			                </div>
			                <!-- /.row -->
							</tbody>
			            </div>
			            <!-- /.invoice -->
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
			</div>
		</section>
		<!-- /.content -->
		</div>
	</div>
	<!-- ./wrapper -->

	<?php include('../includes/footer.php') ?>
</body>
</html>
