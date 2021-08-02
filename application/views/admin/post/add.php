<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/layouts/head')?>
</head>
<body class="sb-nav-fixed">
	<?php $this->load->view('admin/layouts/navbar')?>
	<div id="layoutSidenav">
		<?php $this->load->view('admin/layouts/sidebar')?>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Dashboard</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Admin/Post/List</li>
					</ol>
					<div class="row">
						<div class="col-lg-10 mx-auto">
							<form action="<?= site_url()?>admin/post/save" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="">Judul</label>
									<input type="text" class="form-control" name="title">
								</div>
								<div class="form-group">
									<label for="">Gambar</label>
									<input type="file" class="form-control" name="image">
								</div>
								<div class="form-group">
									<label for="">Isi</label>
									<textarea class="form-control" name="subject" id="" cols="30" rows="10"></textarea>
								</div>
								<div class="form-group">
									<label for="">Category</label>
									<select name="category" class="form-control">
										<?php foreach($categories as $category):?>
											<option value="<?= $category->category?>"><?= $category->category?></option>
										<?php endforeach?>
									</select>
								</div>
								
								<button type="submit" class="form-control btn btn-primary">Kirim</button>
								
							</form>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2021</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<?php $this->load->view('admin/layouts/script')?>

</body>
</html>
