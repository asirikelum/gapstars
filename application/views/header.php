<?php
/**
 * Created by PhpStorm.
 * User: asirik
 */


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Instagram Analytics Dashboard</title>

  

   <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    
    <link href="<?php echo base_url() ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

   
    <link href="<?php echo base_url() ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

  
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

   
</head>

<body>
<div id="wrapper">


    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">


                          
                          <span>
                             <img src="<?php echo base_url()."/assets/img/logo.png"?>">
                          </span>
                       


                    </div>
                    <div class="logo-element">
                        Gapstars
                    </div>
                </li>
               

    
                        <li <?php echo ($this->router->class == 'insta' && ($this->router->method == 'authenticate' || $this->router->method == 'index' || $this->router->method == 'generate_report')) ? 'class="active"' : '' ?>>
                            <a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span><span class="fa arrow"></span></a>
                            
                            <ul class="nav nav-second-level">
                            
                                <li <?php echo ($this->router->class == 'insta' && $this->router->method == 'index') ? 'class="active"' : '' ?>>
                                <a href="/insta/">Dashboard</a></li>
                                
                                <li <?php echo ($this->router->class == 'insta' && $this->router->method == 'authenticate') ? 'class="active"' : '' ?>>
                                <a href="/insta/authenticate">Settings</a>
                                </li>
                            
                            </ul>
                        </li>
         





            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                   
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span
                            class="m-r-sm text-muted welcome-message">Welcome Gapstars</span>
                    </li>
                  

                    <li>
                         
                            <a href="#">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="col-lg-6">
                            <h2 id="header-dropdowniD">
                                <i class="fa <?php echo $breadcrumb['icon'] ?>"></i>
                        <?php if (!empty($breadcrumb['head_url'])) { ?>
                                    <a href="<?php echo base_url().$breadcrumb['head_url'] ?>"/> <?php echo $breadcrumb['title'] ?> </a>
                                    <?php }else{
                                            echo $breadcrumb['title'];
                                    }
                                if (!empty($breadcrumb['sub'])) { ?>
                                <i class="fa fa-angle-double-right"></i> <?php echo $breadcrumb['sub'] ?> 

                            <?php } ?>

                               
</h2>
                        </div>
                        <?php if (!empty($breadcrumb['date'])) { ?>
                            <div class="col-lg-6">
                                <div class="pull-right">
                                    <?php

                                    $attributes = array('class' => 'form-inline', 'id' => 'myform');

                                    echo form_open('', $attributes) ?>
                                    <div class="form-group" id="data_5">
                                        <label class="font-noraml">Date Range</label>

                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" id="from" class="input-sm form-control" name="start"
                                                   value="<?php echo $showStart ?>">
                                            <span class="input-group-addon">to</span>
                                            <input type="text" id="to" class="input-sm form-control" name="end"
                                                   value="<?php echo $showEnd ?>">
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="wrapper wrapper-content">
