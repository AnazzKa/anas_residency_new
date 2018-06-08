<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->load->view('head'); ?>
        <link href="<?php $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Toastr style -->
        <link href="<?php $base_url; ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
        <!-- Gritter -->
        <link href="<?php $base_url; ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('menu'); ?>
 
            <div id="page-wrapper" class="gray-bg dashbard-1">
                <?php $this->load->view('header'); ?>

                <div class="row  border-bottom white-bg dashboard-header"> 

                        
                    
                    <div class="col-md-3">
                        <div class="widget p-lg text-center" style="background-color:#e91d74;color:#fff;">
                            <div class="m-b-md">
                                <i class="fa fa-bell"></i>
                                <h1 class="m-xs"><?php echo $signup[0]->count; ?></h1>
                                <h3 class="font-bold no-margins">
                                    Sign Up
                                </h3>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget p-lg text-center" style="background-color:#fed104;color:#fff;">
                            <div class="m-b-md">
                                <i class="fa fa-bell"></i>
                                <h1 class="m-xs"><?php echo $appling[0]->count; ?></h1>
                                <h3 class="font-bold no-margins">
                                    Applying
                                </h3>
                                <!-- <small>Verification</small> -->
                            </div>
                        </div>
                    </div>
                    <a href="<?php $base_url ?>completed_applications" >
                    <div class="col-md-3">
                        <div class="widget p-lg text-center" style="background-color:#8431a7;color:#fff;">
                            <div class="m-b-md">
                                <i class="fa fa-bell"></i>
                                <h1 class="m-xs"><?php echo $complted[0]->count; ?></h1>
                                <h3 class="font-bold no-margins">
                                    Completed Applications
                                </h3>
                                <!-- <small>Verification</small> -->
                            </div>
                        </div>
                    </div>
                    </a>
                    
                    

                    <div class="col-md-12">

                    </div>

                </div>

                <?php $this->load->view('footer'); ?>
            </div>

            <?php //$this->load->view('chat');   ?>
        </div>
        <?php $this->load->view('script'); ?>
        <script>
            $(document).ready(function () {               

            });

        </script>

    </body>
</html>
