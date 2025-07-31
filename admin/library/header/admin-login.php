<?php
$file_path = _DIR_('library/license.php');

if (file_exists($file_path)) {
    require_once $file_path;
} else {
    header('Location: /license-error.php?error=file_not_found');
    exit();
}
?>
<!doctype html>
<html lang="id">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?= isset($_CONFIG['title_add']) ? $_CONFIG['title'].' :: '.$_CONFIG['title_add'] : $_CONFIG['title'] ?></title>
        
        <meta name="description" content="<?= $_CONFIG['description'] ?>">
        <meta name="keywords" content="<?= $_CONFIG['keyword'] ?>">
        <meta name="author" content="Afdhalul Ichsan Yourdan, Rifqi Galih Nur Ikhsan">
        
        <meta name="robots" content="<?= $_META['robots'] ?>">
        <meta name="revisit-after" content="<?= $_META['revisit'] ?>">
        <meta name="msvalidate.01" content="<?= $_META['bing_site'] ?>">
        <meta name="google-site-verification" content="<?= $_META['google_site'] ?>">
        
        <meta name="Geo.Placename" content="<?= $_META['geo_placename'] ?>">
        <meta name="Geo.Country" content="<?= $_META['geo_country'] ?>">
        
        <meta property="og:title" content="<?= $_CONFIG['title'] ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?= base_url() ?>">
        <meta property="og:image" content="<?= $_CONFIG['banner'] ?>">
        <meta property="og:image:type" content="image/png">
        <meta property="og:description" content="<?= $_CONFIG['description'] ?>">
        <meta property="og:site_name" content="<?= $_CONFIG['title'] ?>">
        <meta property="og:locale" content="id_ID">
        <meta property="fb:pages" content="291448691554058">
        <meta property="fb:admins" content="100022982940138">
        <meta property="twitter:card" content="Summary">
        <meta property="twitter:url" content="<?= base_url() ?>">
        <meta property="twitter:title" content="<?= $_CONFIG['title'] ?>">
        <meta property="twitter:image" content="<?= $_CONFIG['banner'] ?>">
        <meta property="twitter:creator" content="@RGsann">
        
        <!-- Custom Meta -->
        <meta name="DeviceType" content="<?= $device ?>">
        <meta name="UserAgent" content="<?= $user_agent ?>">
        <meta name="IpAddress" content="<?= client_ip() ?>">
        <meta name="Rating" content="General">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= assets('mobile/').$_CONFIG['icon'] ?>" type="image/png">
        <!-- CSS Files -->
        <link rel="stylesheet" href="<?= assets('css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= assets('css/typography.css') ?>">
        <link rel="stylesheet" href="<?= assets('css/style.css') ?>">
        <link rel="stylesheet" href="<?= assets('css/responsive.css') ?>">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <!-- JS Files -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $_META['google_tagmanager'] ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?= $_META['google_tagmanager'] ?>');
        </script>
  
        <!-- Start Script Morris Chart -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    </head>
    <body class="sidebar-main-active right-column-fixed">
      <!-- Wrapper Start -->
      <div class="wrapper">
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">