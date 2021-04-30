<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Menu</div>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#post" aria-expanded="false" aria-controls="post">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Post
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="post" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="layout-static.html">List Post</a>
						<a class="nav-link" href="layout-sidenav-light.html">Add Post</a>
					</nav>
				</div>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					User
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="user" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="layout-static.html">List User</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as:</div>
			<?php echo $this->session->userdata('username');?>
		</div>
	</nav>
</div>
