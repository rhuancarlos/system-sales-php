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
    //Call ListUser
    listarUser();

    //List User
    function listarUser(){ 
        $('#tablelistusers').DataTable({
            "language":{ //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "bProcessing": true,
            "ajax": {
                url: ".usuario/getUsers",
                type: "POST"
        }

        });
   }
    
    //Refresh On DataTable    
    $("atualizar").click(function(){

        tablelistusers.ajax.reaload();

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
                $('[name="nome"]').val("");
                $('[name="matricula"]').val("");
                $('[name="senha"]').val("");
                $('#modal_addUser').modal('hide');
                alert('Usuário cadastrado com succeso!');
                $('#tablelistusers').DataTable().ajax.reload();
            }
        });
        return false;
    });

        //Delete User
        $('#tablelistusers').on('click', '.iconDelete', function(){
            var codUser = $(this).val();
            $('#modalExcluir').modal('show');
            $('[name="user_id"]').val(codUser);
            $("#coddisplay").html(codUser);
        });


        //Action Delete On DataBase
        $("#confirmDeleteItem").on('click', function(){
            var codUser = $("#user_id").val();

            $.ajax({
                type : "POST",
                url  : "<?PHP echo site_url('usuario/deleteUser')?>",
                data : {
                    user_cod:codUser
                },
                success: function(data){
                    $('[name="user_id"').val("");
                    $('#modalExcluir').modal('hide');
                    alert('Usuário Excluido com Sucesso!');
                    listarUser();
                }
            });
            return false;
        });

        $('#tablelistusers').on('click', '.iconEdit', function(){
            var usernome     =   $(this).val();

            $("#modalEdit").modal('show');
            $('[name="edituser_nome"]').val(usernome);
            console.log(usernome);


        });

    });
    </script>