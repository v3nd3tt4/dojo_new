<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo_uin.png"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootStrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTable/css/dataTables.bootstrap.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/responsiveslides.css"/>
<style>
#ck_slide{
			
			width: 97%; 
			height: 300px; 
			box-shadow: 0px 20px 25px -20px #000;
			
}
#ck_slide > div { 
			position: absolute; 			
}
#ck_slide img{
			width: 97%;
			height: 300px;
			border:none;
}

.list ul{
	margin-left:0px; 
	padding-left:0px; 
	list-style:none;
}

.list ul li{
	margin-bottom:10px;
}
.hoper:hover{
	background-image :url(<?php echo base_url(); ?>assets/images/concrete_seamless.png); 
	background-image : repeat; border-radius:5px;
	cursor:pointer;
}

.rslides {
  position: relative;
  list-style: none;
  overflow: hidden;
  width: 100%;
  padding: 0;
  margin: 0;
  }

.rslides li {
  -webkit-backface-visibility: hidden;
  position: absolute;
  display: none;
  width: 100%;
  left: 0;
  top: 0;
  }

.rslides li:first-child {
  position: relative;
  display: block;
  float: left;
  }

.rslides img {
  display: block;
  height: auto;
  float: left;
  width: 100%;
  height: 350px;
  border: 0;
  }

</style>




</head>

<nav class="navbar navbar-inverse navbar-fixed-top " style="border:none; border-radius:0px; background:#1D1B1B; ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li <?php if($title=='Home'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>" >Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" >Profil
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?php if($title=='Sejarah'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>sejarah">Sejarah</a></li>
            <li <?php if($title=='Visi dan Misi'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>visi_misi">Visi Dan Misi</a></li>
            <li <?php if($title=='Struktur Organisasi'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>struktur_organisasi">Struktur Organisasi</a></li>
             
        <li <?php if($title=='Dosen'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>dosen" >Dosen</a></li> 
            <li <?php if($title=='Kurikulum'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>kurikulum" >Kurikulum</a></li>
          </ul>
        </li>
          
        <li <?php if($title=='Activity'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>activity" >Aktivitas</a></li> 
        <li <?php if($title=='Gallery'){?>class="active"<?php }?>><a href="<?php echo base_url(); ?>gallery" >Galeri</a></li>
        <li <?php if($title=='Jurnal'){?>class="active"<?php }?>><a href="http://ejournal.radenintan.ac.id/index.php/konseli/about/contact" >Jurnal</a></li> 
        <li <?php if($title=='klinik'){?>class="active"<?php }?>><a href="<?=base_url()?>detail/index/35/Klinik-Bimbingan-Konseling" >Klinik</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="form-group" role="form"><input type="text" id="katakunci" class="form-control input-sm" placeholder="Search.." style="margin-top:10px; min-width:250px;"/></li>
        <li><a href="#" class="btn btn-md">
    <span class="glyphicon glyphicon-search" id="searching"></span>  
  </a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" style="
background-image :url(<?php echo base_url(); ?>assets/images/restaurant.png); 
background-image : repeat;
margin-top:50px; 
min-height:180px;
">
	<div class="container">
        <div class="col-md-2">
<br/>
   <img src="<?php echo base_url(); ?>assets/logo_uin.png" class="img-responsive" width="110"/>
</div>
    	<div class="col-md-10">
        	<br/><p> </p>
    	   <h3>Prodi Bimbingan Konseling</h3> 
           <p>Fakultas Tarbiyah dan Keguruan UIN Raden Intan Lampung</p>
    	</div>
     </div>
</div>

<div class="container" style="margin-top:50px; min-height:500px;">
<div class="row">
    	<div class="col-md-8" style="margin-bottom:30px;" >
        
        
        
        



        