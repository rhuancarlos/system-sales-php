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

    <script src="<?PHP echo base_url('assets/js/datatables.min.js')?>"></script>

    <!-- Main JS-->
    <script src="<?PHP echo base_url('assets/js/main.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    //Call ListUser
    listarUser();
    listarClients();
    listarProduts();

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
            },

        });
   }
    
    //Refresh On DataTable    
    $("#atualizar").click(function(){
       $('#tablelistusers').DataTable().ajax.reload();
    });

    //Save Users
    $('#submit_user').on('click', function(){
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


    /****
    * FOR CLIENTS 
    ***********************/
    function listarClients(){ 
        $('#tablelistclients').DataTable({
            "language":{ //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "bProcessing": true, //display 'load on screen'
            "lengthMenu": [5, 10, 15, 30, 50], //define qtd rows on datatable
            "pageLength": 5, //define qtd initial on datatable
            "ajax": {
                url: ".cliente/getClients",
                type: "POST"
        }

        });
   }

    //Refresh On DataTable    
    $("#atualizar-lista-clientes").click(function(){
       $('#tablelistclients').DataTable().ajax.reload();
    });

    //Save Users
    $('#submit_client').on('click', function(){
        var client_nome         =   $('#client_nome').val();
        var client_cpf          =   $('#client_cpf').val();
        var client_rg           =   $('#client_rg').val();
        var client_endereco     =   $('#client_endereco').val();
        var client_numero       =   $('#client_numero').val();
        var client_uf           =   $('#client_uf').val();
        var client_cidade       =   $('#client_cidade').val();
        var client_contato      =   $('#client_contato').val();
        var client_renda        =   $('#client_renda').val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('cliente/addClient')?>",
            dataType : "JSON",
            data : { 
                     client_nome         :   client_nome,
                     client_cpf          :   client_cpf,
                     client_rg           :   client_rg,
                     client_endereco     :   client_endereco,
                     client_numero       :   client_numero,
                     client_uf           :   client_uf,
                     client_cidade       :   client_cidade,
                     client_contato      :   client_contato,
                     client_renda        :   client_renda,
            },
            success: function(data)
            {
                $('[name="client_nome"]').val("");
                $('[name="client_cpf"]').val("");
                $('[name="client_rg"]').val("");
                $('[name="client_endereco"]').val("");
                $('[name="client_numero"]').val("");
                $('[name="client_uf"]').val("");
                $('[name="client_cidade"]').val("");
                $('[name="client_contato"]').val("");
                $('[name="client_renda"]').val("");
                $('#modal_addClient').modal('hide');
                alert('Cliente cadastrado com succeso!');
                $('#tablelistclients').DataTable().ajax.reload();
            },
            error: function(data){
                alert("Está matricula já existe ou os dados fornecidos são inconsistentes.");
            }
        });
        return false;
    });

    $('#tablelistclients').on('click', '.iconEditClient', function(){
        var codigo_cliente = $(this).val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('cliente/getDataClientForedit')?>",
            data : {
                codigo_cliente : codigo_cliente
            },
            success: function(data){
                var data = JSON.parse(data);
                $.each(data, function(i, itm){

                    $("#editclient_cod").val(itm['ID']);
                    $("#editclient_nome").val(itm['NOME']);
                    $("#editclient_cpf").val(itm['CPF']);
                    $("#editclient_rg").val(itm['RG']);
                    $("#editclient_endereco").val(itm['ENDERECO']);
                    $("#editclient_numero").val(itm['NUMERO']);
                    $("#editclient_uf").val(itm['ESTADO']);
                    $("#editclient_cidade").val(itm['CIDADE']);
                    $("#editclient_contato").val(itm['CONTATO']);
                    $("#editclient_renda").val(itm['RENDA']);
                    $("#editclientpmo_status").val(itm['STATUS']);
                    $("#info").html(itm['CREATED']);

                });
            }
        });
        $("#modalEditClient").modal('show');
    });

    //Action Upate Client On DataBase
    $("#confirmClientUpdate").on('click', function(){
        var codClient   = $("#editclient_cod").val();
        var nome        = $("#editclient_nome").val();
        var cpf         = $("#editclient_cpf").val();
        var rg          = $("#editclient_rg").val();
        var endereco    = $("#editclient_endereco").val();
        var numero      = $("#editclient_numero").val();
        var uf          = $("#editclient_uf").val();
        var cidade      = $("#editclient_cidade").val();
        var contato     = $("#editclient_contato").val();
        var renda       = $("#editclient_renda").val();
        var status      = $("#editclient_status").val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('cliente/actionEditRecordClient')?>",
            data : {

                client_cod      : codClient,
                client_nome     : nome,
                client_cpf      : cpf,
                client_rg       : rg,
                client_endereco : endereco,
                client_numero   : numero,
                client_uf       : uf,
                client_cidade   : cidade,
                client_contato  : contato,
                client_renda    : renda,
                client_status   : status
                
            },
            success: function(data){
                $('#modalEditClient').modal('hide');
                alert(nome + ' atualizado(a) com sucesso !');
                $('#tablelistclients').DataTable().ajax.reload();
            }
        });
        return false;
    });


    /****
    * FOR PRODUTS 
    ***********************/
    function listarProduts(){ 
        $('#tablelistproduts').DataTable({
            "language":{ //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "bProcessing": true, //display 'load on screen'
            "lengthMenu": [5, 10, 15, 30, 50], //define qtd rows on datatable
            "pageLength": 5, //define qtd initial on datatable
            "ajax": {
                url: ".produto/getProduts",
                type: "POST"
        }

        });
   }

    //Refresh On DataTable    
    $("#atualizar-lista-produtos").click(function(){
       $('#tablelistproduts').DataTable().ajax.reload();
    });

    //Save Users
    $('#submit_produt').on('click', function(){
        var produts_descricaoC  =   $('#produts_descricao_c').val();
        var produts_descricaoP  =   $('#produts_descricao_p').val();
        var produts_qtd         =   $('#produts_qtd').val();
        var produts_prc_avista   =   $('#produts_prc_avista').val();
        var produts_prc_aprazo  =   $('#produts_prc_aprazo').val();
        var produts_cod_barras  =   $('#produts_cod_barras').val();

        if ( (produts_descricaoC && produts_descricaoP) == ''){
            alert('Por favor preencha a Descrição');
        }
        else if(produts_qtd == ''){
            alert('Informa a Quantidade');
        }
        else if(produts_prc_avista == ''){
            alert('Informe o Preço de Avista');
        }
        else if(produts_prc_aprazo == ''){
            alert('Informe o Preço de Aprazo');
        }
        else if(produts_cod_barras == ''){
            alert('Informe o Código de Barras');
        }
        else
        {
            $.ajax({
                type : "POST",
                url  : "<?PHP echo site_url('produto/addProdut')?>",
                dataType : "JSON",
                data : { 
                         produts_descricao_c    :   produts_descricaoC,
                         produts_descricao_p    :   produts_descricaoP,
                         produts_qtd            :   produts_qtd,
                         produts_prc_avista     :   produts_prc_avista,
                         produts_prc_aprazo     :   produts_prc_aprazo,
                         produts_cod_barras     :   produts_cod_barras
                },
                success: function(data)
                {
                    $('[name="produts_descricao_c"]').val("");
                    $('[name="produts_descricao_p"]').val("");
                    $('[name="produts_qtd"]').val("");
                    $('[name="produts_prc_avista"]').val("");
                    $('[name="produts_prc_aprazo"]').val("");
                    $('[name="produts_cod_barras"]').val("");
                    $('#modal_addProdut').modal('hide');
                    alert('Produto cadastrado com succeso!');
                    $('#tablelistproduts').DataTable().ajax.reload();
                },
                error: function(data){
                    alert("Este Produto já existe ou os dados fornecidos são inconsistentes.");
                }
            });
            return false;
        }

        });



    $('#tablelistproduts').on('click', '.iconEditProdut', function(){
        var codigo_produto = $(this).val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('produto/getDataProdutForEdit')?>",
            data : {
                codigo_produto : codigo_produto
            },
            success: function(data){
                var data = JSON.parse(data);
                $.each(data, function(i, itm){

                    $("#editproduts_cod").val(itm['ID']);
                    $("#editproduts_descricao_c").val(itm['DESCRICAO_C']);
                    $("#editproduts_descricao_p").val(itm['DESCRICAO_P']);
                    $("#editproduts_qtd").val(itm['QTD']);
                    $("#editproduts_prc_avista").val(itm['PRECO_AVISTA']);
                    $("#editproduts_prc_aprazo").val(itm['PRECO_APRAZO']);
                    $("#editproduts_cod_barras").val(itm['COD_BARRAS']);
                    $("#info").html(itm['CREATED']);

                });
            }
        });
        $("#modalEditProdut").modal('show');
    });

    //Action Upate Client On DataBase
    $("#confirmProdutUpdate").on('click', function(){
        var codigo_produto  = $("#editproduts_cod").val();
        var descricao_c     = $("#editproduts_descricao_c").val();
        var descricao_p     = $("#editproduts_descricao_p").val();
        var qtd             = $("#editproduts_qtd").val();
        var prc_avista      = $("#editproduts_prc_avista").val();
        var prc_aprazo      = $("#editproduts_prc_aprazo").val();
        var cod_barras      = $("#editproduts_cod_barras").val();

        $.ajax({
            type : "POST",
            url  : "<?PHP echo site_url('produto/actionEditRecordProdut')?>",
            data : {

                produt_cod          : codigo_produto,
                produt_descricao_c  : descricao_c,
                produt_descricao_p  : descricao_p,
                produt_qtd          : qtd,
                produt_prc_avista   : prc_avista,
                produt_prc_aprazo   : prc_aprazo,
                produt_cod_barras   : cod_barras
            },
            success: function(data){
                alert('#' + codigo_produto + ' ' + descricao_c + ' atualizado com sucesso !');
                $('#modalEditProdut').modal('hide');
                $('#tablelistproduts').DataTable().ajax.reload();
            }
        });
        return false;
    });
});
</script>