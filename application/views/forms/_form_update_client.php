<div class="card">
    <div class="card-header">
        <strong>Cadastro de Clientes</strong> <i><small> (Criado em <span id="info"></span>)</i></small>
    </div>
    <div class="card-body card-block">
        <form>
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <input type="text" id="editclient_cod" maxlength="40" name="editclient_cod" placeholder="COD" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" id="editclient_nome" maxlength="40" name="editclient_nome" placeholder="Nome completo . . ." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" maxlength="11" id="editclient_cpf" name="editclient_cpf" placeholder="Cpf . . ." class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" maxlength="13" id="editclient_rg" name="editclient_rg" placeholder="Rg . . ." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="50" name="editclient_endereco" id="editclient_endereco" placeholder="Endereço" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="10" name="editclient_numero" id="editclient_numero" placeholder="N." class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="40" name="editclient_uf" id="editclient_uf" placeholder="UF" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="40" name="editclient_cidade" id="editclient_cidade" placeholder="Cidade ..." class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <input type="text"  maxlength="11" name="editclient_contato" id="editclient_contato" placeholder="Telefone ..." class="form-control">
                </div>
                <div class="col-6">
                    <input type="text" name="editclient_renda" id="editclient_renda" placeholder="Renda ..." class="form-control">
                </div>
            </div></br>
            <div class="form-group">
                    <select name="editclient_status" id="editclient_status" class="form-control">
                        <option value="0">Inadimplente</option>
                        <option value="1">Adimplente</option>
                    </select>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" id="confirmClientUpdate" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Atualizar
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Cancelar
        </button>
    </div>
</div>