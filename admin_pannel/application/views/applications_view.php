<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->load->view('head'); ?>
        <link href="<?php $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Data Tables -->
        <link href="<?php $base_url; ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body>

        <div id="wrapper">

            <?php $this->load->view('menu'); ?>

            <div id="page-wrapper" class="gray-bg">
                <?php $this->load->view('header'); ?>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <form role="form" id="form_search" method="post">
                                    <div class="ibox-title">
                                        <h5>Application Details</h5>                        
                                    </div>

                                    <div class="ibox-content col-md-12">
                                        <div class="form-group col-md-4">                                    
                                            <input  type="text" placeholder="From Date" onfocus="(this.type = 'date')"  value="<?php echo $f_date; ?>" name="f_date" id="f_date" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">                                    
                                            <input onchange="" type="text" placeholder="To Date" onfocus="(this.type = 'date')"  value="<?php echo $t_date; ?>" name="t_date" id="t_date" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">                                    
                                            <!--<select onchange="this.form.submit()"  name="gender" class="form-control">-->
                                            <select id="gender"  name="gender" class="form-control">
                                                <option <?php if ($s_gender == '') { ?>selected<?php } ?> value="">Gender</option>
                                                <option <?php if ($s_gender == 'male') { ?>selected<?php } ?> value="male">Male</option>
                                                <option <?php if ($s_gender == 'female') { ?>selected<?php } ?> value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <!--<select onchange="this.form.submit()" name="nationality" class="form-control">-->
                                            <select id="nationality" name="nationality" class="form-control">
                                                <option value="">Nationality</option>
                                                <?php foreach ($nationality as $row) { ?>
                                                    <option <?php if ($s_nationality == $row->nationality) { ?>selected<?php } ?> value="<?php echo $row->nationality ?>"><?php echo $row->nationality ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <select class="form-control" id="status">
                                              <option value="">Status</option>
                                              <option value="1">Screening</option>
                                              <option value="2">Qualified</option>
                                              <option value="3">Selected</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-md-4">                                    
                                            <input type="hidden" value="<?php echo $s_name_phone; ?>" name="name_phone" placeholder="Name/phone" class="form-control">
                                            <input type="hidden" value="<?php echo $s_sort ?>" name="sort">
                                            <button class="btn btn-primary" name="reset" type="reset"><i class="fa fa-undo"></i></button>
                                            <button class="btn btn-primary" name="search" type="submit"><i class="fa fa-search"></i></button>
                                            <a href="" target="_blank"> <button id="btnPrint" class="btn btn-primary" name="print" type="button"><i class="fa fa-print"></i></button></a>
                                             <a href="<?php $base_url; ?>application_excel?ex=<?php echo $status; ?>" class="btn btn-primary">
                                                <i class="fa fa-file-excel-o"></i></a>
                                        </div>
                                    </div>

                                    <div class="ibox-content">
                                        <div class="table-responsive" >
                                            <table class="table dataTables-example" id="example">
                                                <thead style="background-color:#115E6E;color:#ffff;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Nationality</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>                                                        
                                                        <th>Action</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Nationality</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Action</th>                                                        
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <?php $this->load->view('footer'); ?>
            </div>

            <?php // $this->load->view('chat');   ?>
        </div>
        <?php $this->load->view('script'); ?>
        <script>
            $(document).ready(function () {
           var status=<?php echo $status; ?>;
           var table = $('#example').DataTable();
                $.ajax({type: "POST",url: "<?php $base_url ?>get_all_applications",data:{type:status}, success: function(result){
              console.log(result);
             var res=JSON.parse(result);
             table.rows.add(res).draw();
         }
     });

                $("#super_power").on("change", function () {
                    var value = $(this).val().toLowerCase();
                    $(".dataTables-example tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                $('#nationality').change( function() {
                    table.columns(3).search(this.value).draw();
                } );
                $('#gender').change( function() {
                    var val=this.value;
                    if(val!='')
                        table.columns(2).search("^" +val+ "$", true, false, true).draw();
                    else
                        table.columns(2).search(this.value).draw();
                } );
            });

$('#status').on('change',function () {
    var stst=this.value;
    var status=<?php echo $status; ?>;
    var table = $('#example').DataTable();
    table.rows().remove().draw();
    $.ajax({type: "POST",url: "<?php $base_url ?>get_all_applications",data:{type:status,sts:stst}, success: function(result){
            console.log(result);
            var res=JSON.parse(result);
            table.rows.add(res).draw();
        }
    });
});
$('#f_date').on('change',function () {
   var f_date=this.value;
    var status=<?php echo $status; ?>;
    var table = $('#example').DataTable();
    table.rows().remove().draw();
    $.ajax({type: "POST",url: "<?php $base_url ?>get_all_applications",data:{type:status,f_date:f_date}, success: function(result){
            console.log(result);
            var res=JSON.parse(result);
            table.rows.add(res).draw();
        }
    });
});
        </script>

    </body>
</html>
