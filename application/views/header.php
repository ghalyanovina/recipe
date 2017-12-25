<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ghalya">
   
    <title><?= !isset($title) ? "Food Recipe" : $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()."fiture/vendor/bootstrap/css/bootstrap.min.css";?>" 

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url()."fiture/css/clean-blog.css"?> ">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."fiture/js/summernote.css";?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."fiture/css/jquery.dataTables.min.css";?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."fiture/css/dataTables.bootstrap.min.css";?>">


    <!-- Custom Fonts -->
    <link rel="stylesheet" href="<?php echo base_url()."fiture/vendor/font-awesome/css/font-awesome.min.css"?>" type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url();?>fiture/vendor/jquery/jquery.min.js"> </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Food Recipe</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li class="dopdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
                       <ul class="dropdown-menu">
                        <li><a href="/kategori">Semua Kategori</a></li>
                        <?php 
                            $this->load->database();
                            $this->load->model('tbl_kategori');
                            $kategori = $this->tbl_kategori->loadKategori();
                            foreach ($kategori as $kat) {
                                echo "<li><a href='/kategori/".$kat->id_kategori."'>".$kat->kategori."</a></li>";
                            }
                         ?>
                       </ul>
                    </li>
                    <?php  
                        if (!$this->session->has_userdata('nama')) {
                     ?>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/daftar">Daftar</a>
                    </li>
                    <?php } else { ?>
                    <!-- =====================================LOGIN========================= -->
                    
                    <li class="dopdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama') ?><b class="caret"></b></a>
                       <ul class="dropdown-menu">
                        <li><a href="/<?= $this->session->userdata('username') ?>/tambah">Tambah Artikel</a></li>
                        <li class="divider"></li>
                        <li><a href="/<?php echo $this->session->userdata('username') ?>">Profil</a></li>
                        <li><a href="/logout">Logout</a></li>
                       </ul>
                    </li>
                    <!-- ==================================================================== -->
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    
