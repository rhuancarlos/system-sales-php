    <!-- Jquery JS-->
    <script src="<?PHP echo base_url('assets/vendor/jquery-3.2.1.min.js')?>"></script>

    <!-- Bootstrap JS-->
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-4.1/popper.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-4.1/bootstrap.min.js')?>"></script>
    <!-- Vendor JS       -->
    <script src="<?PHP echo base_url('assets/vendor/slick/slick.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/wow/wow.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/animsition/animsition.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/counter-up/jquery.waypoints.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/counter-up/jquery.counterup.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/circle-progress/circle-progress.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/chartjs/Chart.bundle.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/select2/select2.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/vector-map/jquery.vmap.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/vector-map/jquery.vmap.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/vector-map/jquery.vmap.sampledata.js')?>"></script>
    <script src="<?PHP echo base_url('assets/vendor/vector-map/jquery.vmap.world.js')?>"></script>

    <script src="<?PHP #echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?PHP #echo base_url('assets/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?PHP echo base_url('assets/js/datatables.min.js')?>"></script>

    <!-- Main JS-->
    <script src="<?PHP echo base_url('assets/js/main.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#tablelistusers').DataTable({ 

                  "processing":true,  
                   "serverSide":true,  
                   "order":[],  
                   "ajax":{  
                        url:"<?php echo base_url() . 'usuario/getUsers'; ?>",  
                        type:"POST"  
                   },  
                   "columnDefs":[  
                        {  
                             "targets": [0, 3, 4],  
                             "orderable":false,  
                        },  
                   ]
        });
        
        //Save Users
        $('#submit').on('click', function(){
            var user_nome       =   $('#user_nome').val();
            var user_matricula  =   $('#user_matricula').val();
            var user_senha      =   $('#user_senha').val();
            $.ajax({
                type : "POST",
                url  : "<?PHP echo site_url('usuario/addUser')?>",
                dataType : "JSON",
                data : { 
                    user_nome:user_nome, 
                    user_matricula:user_matricula, 
                    user_senha:user_senha 
                },
                success: function(data)
                {
                    $('[name="user_nome"]').val("");
                    $('[name="user_matricula"]').val("");
                    $('[name="user_senha"]').val("");
                    $('#modal_addUser').modal('hide');
                }
            });
            return false;
        });

        

        //Delete User
        $('#itemDelet').click(function(){
                 
                //var user_cod    =  $('#data-users #codigo').text(); //$('#codigo').val();
                var user_cod = $(this).val();
                // console.log(user_cod);
                // $('#modalExcluir').modal('show');
                // $('[name="user_id"]').val(user_cod);
                alert(user_cod);
        });

        // $('#btnDelet').on('click', function(){
        //     var user_cod    = $('#usuario_cod').val();

        // });


    });
    </script>