<?php
if(!$this->session->has_userdata('admin')) {
    redirect("/admin/login");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Food Reciepe</title>

    <link rel="stylesheet" type="text/css" href="/fiture/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/fiture/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/fiture/js/summernote.css">
    <link rel="stylesheet" type="text/css" href="/fiture/css/local.css" />

    <link rel="stylesheet" type="text/css" href="/fiture/js/morris.css" />

    <script type="text/javascript" src="/fiture/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/fiture/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/fiture/js/summernote.min.js"></script>
    <script type="text/javascript" src="/fiture/js/raphael.min.js"></script>
    <script type="text/javascript" src="/fiture/js/morris.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#isi').summernote({height:150});
		});
	</script>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="/admin"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="/admin/berita"><i class="fa fa-tasks"></i> Berita</a></li>                    
                    <li><a href="/admin/kategori"><i class="fa fa-globe"></i> Kategori</a></li>
                    <!-- <li><a href="/admin/member"><i class="fa fa-list-ol"></i> Member</a></li> -->
                    <li><a href="/admin/admins"><i class="fa fa-font"></i> Admin</a></li>                                      
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <?php
                        $user = $this->db->where('USERNAME', $this->session->userdata('admin'))->get('TBL_ADMIN')->row();
                        ?>
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $user->USERNAME ?><b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li><a href="/admin/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>
            </div>
        </nav>