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
										
										<h6 class="m-0 font-weight-bold text-primary float-left my-auto">Kelola Data Petugas</h6>
										<div class="dropdown float-right">
											<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Category
											</button>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="<?= site_url(); ?>admin/post/list">all</a>
												<?php foreach($categories as $category):?>
													<a class="dropdown-item" href="<?= site_url()?>admin/post/category/<?= $category->category ?>"><?= $category->category ?></a>
												<?php endforeach ?>
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
													</tr>
												</thead>
												<tbody>
													<?php foreach($posts as $post ):?>
													<tr>
														<td><?= $post->post_id ?></td>
														<td><?= $post->title ?></td>
														<td><?= $post->image ?></td>
														<td><?= $post->created_at ?></td>
														<td><?= $post->updated_at ?></td>
														<td><?= $post->category ?></td>
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

    </body>
</html>
