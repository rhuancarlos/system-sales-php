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
            "bProcessing": true, //display 'load on screen'
            "lengthMenu": [5, 10, 15, 30, 50], //define qtd rows on datatable
            "pageLength": 5, //define qtd initial on datatable
            "ajax": {
                url: ".usuario/getUsers",
                type: "POST"
        }

        });
   }
    
    //Refresh On DataTable    
    $("#atualizar").click(function(){
       $('#tablelistusers').DataTable().ajax.reload();
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
            },
            error: function(data){
                alert("Está matricula já existe ou os dados fornecidos são inconsistentes.");
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
                $('#tablelistusers').DataTable().ajax.reload();
            }
        });
        return false;
    });

    $('#tablelistusers').on('click', '.iconEdit', function(){
        var codigo_user = $(this).val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('usuario/getDataUserForedit')?>",
            data : {
                codigo_user : codigo_user
            },
            success: function(data){
                var data = JSON.parse(data);
                $.each(data, function(i, itm){

                    $("#editedituser_cod").val(itm['ID']);
                    $("#edituser_nome").val(itm['NOME']);
                    $("#edituser_matricula").val(itm['MATRICULA']);
                    $("#edituser_status").val(itm['STATUS']);
                    $("#info").html(itm['CREATED'] + ' ' + itm['USER_CREATED']);

                });
            }
        });
        $("#modalEdit").modal('show');

    });

    //Action Delete On DataBase
    $("#confirmUpdateItem").on('click', function(){
        var codUser     = $("#editedituser_cod").val();
        var nome        = $("#edituser_nome").val();
        var matricula   = $("#edituser_matricula").val();
        var status      = $("#edituser_status").val();
        var senha       = $("#edituser_senha").val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('usuario/actionEditRecordUser')?>",
            data : {
                user_cod  : codUser,
                user_nome : nome,
                user_matricula : matricula,
                user_status : status,
                user_senha : senha
            },
            success: function(data){
                $('#modalEdit').modal('hide');
                alert(nome + ' atualizado com sucesso !');
                $('#tablelistusers').DataTable().ajax.reload();
            }
        });
        return false;
    });

    });
    </script>