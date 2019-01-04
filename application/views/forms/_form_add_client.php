<div class="card">
    <div class="card-header">
        <strong>Cadastro de Clientes</strong>
    </div>
    <div class="card-body card-block">
        <form>
            <div class="form-group">
                <input type="text" id="client_nome" maxlength="40" name="client_nome" placeholder="Nome completo . . ." class="form-control">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" maxlength="11" id="client_cpf" name="client_cpf" placeholder="Cpf . . ." class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" maxlength="13" id="client_rg" name="client_rg" placeholder="Rg . . ." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="50" name="client_endereco" id="client_endereco" placeholder="Endereço" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="10" name="client_numero" id="client_numero" placeholder="N." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="40" name="client_uf" id="client_uf" placeholder="UF" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="40" name="client_cidade" id="client_cidade" placeholder="Cidade ..." class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <input type="text"  maxlength="11" name="client_contato" id="client_contato" placeholder="Telefone ..." class="form-control">
                </div>
                <div class="col-6">
                    <input type="text" name="client_renda" id="client_renda" placeholder="Renda ..." class="form-control">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" id="submit_client" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cadastrar
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Limpar Formulário
        </button>
    </div>
</div>