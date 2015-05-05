<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name=viewport content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <title>Cambridge Pediatric Dental <?php if(isset($title)) { echo ' | ' . $title; } ?></title>
  <link rel="stylesheet" type="text/css" href="stylesheets/reset.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/text.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/unsemantic.css" />
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/start/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="stylesheets/slick.css"/>
  <link rel="stylesheet" type="text/css" href="stylesheets/jquery.fancybox.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="stylesheets/application.css" />
</head>
<body id="<?php echo $pageId; ?>">
<div class="grid-container" id="wrapper">
  <div class="grid-100">
    <header>
      <h1>Cambridge Pediatric Dental</h1>
    </header>
  </div>
  <div class="grid-100 header-information">
    <address>123 Fake Street, Suite 100, Cambridge, MA 02138</address>
    <span class="phone">Phone: 617-888-9999 - Fax: 617-999-8888</span>
  </div>
<?php include 'includes/navigation.php' ?>