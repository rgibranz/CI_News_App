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
						<div class="col-lg-12">
							<div class="card mb-4">
								<div class="card-header">
									<?php if ($this->session->flashdata('post') == 'add'): ?>
										<div class="alert alert-success" role="alert">
											Data Berhasil Di tambahkan
										</div>
									<?php elseif ($this->session->flashdata('post') == 'update'): ?>
									<div class="alert alert-success" role="alert">
										Data Berhasil Di update
									</div>
									<?php endif ?>
									<h6 class="m-0 font-weight-bold text-primary float-left">Kelola Data Petugas</h6>
									<div class="row float-right">
										<div class="dropdown">
											<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Category
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#category-modal"> + Kategori</button>
												<a class="dropdown-item" href="<?= site_url(); ?>admin/post/list">Semua Kategori</a>
												<div class="dropdown-divider"></div>
												<?php foreach($categories as $category):?>
													<a class="dropdown-item" href="<?= site_url()?>admin/post/category/<?= $category->category ?>"><?= $category->category ?></a>
												<?php endforeach ?>
											</div>
										</div> 


									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>ID</th>
													<th>Judul</th>
													<th>Image</th>
													<th>Created At</th>
													<th>Updated At</th>
													<th>Category</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($posts as $post ):?>
													<tr>
														<td><?= $post->post_id ?></td>
														<td><?= $post->title ?></td>
														<td><img src="<?= site_url('').$post->image ?>" alt="" width="200"></td>
														<td><?= $post->created_at ?></td>
														<td><?= $post->updated_at ?></td>
														<td><?= $post->category ?></td>
														<td>
															<a href="<?= site_url()?>admin/post/delete/<?= $post->post_id ?>" class="btn btn-danger btn-sm">
															Delete
															</a>
															<a href="<?= site_url()?>admin/post/edit/<?= $post->post_id ?>" class="btn btn-info btn-sm">
															edit
															</a>
														</td>
													</tr>
												<?php endforeach?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
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


	<div class="modal fade" id="category-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="category-modalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="category-modalLabel">Data Kategori <Baru></Baru></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('admin/addcategory')?>" method="POST">
					<div class="modal-body">
						<label for="">Kategori</label>
						<input type="text" name="category" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
