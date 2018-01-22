<?php
/**
 * Created by PhpStorm.
 * User: asirik
 */

?>

<div class="footer">
    <div class="pull-right">

    </div>
    <div>
        <strong>Copyright</strong>  &copy; 2016-<?php echo date('Y');?>
    </div>
</div>

</div>

</div>
</div>

<div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                <a href="" id="deleteA" class="btn btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>




<script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<script src="<?php echo base_url() ?>assets/js/inspinia.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>




<script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>


<script>
    $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        endDate: "+1d",
        format: "dd-mm-yyyy",
    });

    

    

</script>
 

  

<script>

    function viewApplication(instagram){

        $('#myModal5').modal({
            show: true
        });


       
        if(instagram==0){
            $('#instacheck').addClass('btn-default');
            $('#instacheck').removeClass('btn-success')
        }else{
            $('#instacheck').addClass('btn-success');
            $('#instacheck').removeClass('btn-default')
        }

        
        $('#delete_a').attr("href", dlink);

    }

    function deleteAcc(dlink, dcontent) {


        $('#myModal6').modal({

            show: true
        });

        if(dlink == "" || dlink == null ){

            $( "#deleteA").hide();
        }

        if(dcontent == "" || dcontent == null ){

            $( "#modal-body").empty();
            $( "#modal-body").append( "<p><strong>Do you want to</strong> Permenetly Delete this from the Account</p>" );
        }else{

            $( "#modal-body").empty();
            $( "#modal-body").append( "<p>"+dcontent    +"</p>" );


                var timer = document.getElementById('deleteA');
                timer.setAttribute("disabled", "disabled");
                timer.innerHTML = 5;

                var countdown = window.setInterval(function() {
                    var seconds = timer.innerHTML;
                    seconds = seconds - 1;
                    timer.innerHTML = " "+seconds+" ";

                    if (seconds == 0) {
                        timer.innerHTML = "Delete User";
                        timer.removeAttribute("disabled");
                        clearInterval(countdown);
                    }
                }, 1000);



        }

        $('#deleteA').attr("href", dlink);
    }

 

</script>

</body>
</html>
