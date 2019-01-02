<div class="card">
    <div class="card-header">
        <strong>Cadastro de Usário</strong>
    </div>
    <div class="card-body card-block">
        <form>
            <div class="form-group">
                <input type="text" id="editedituser_cod" readonly class="form-control col-md-1">
            </div>
            <div class="form-group">
                <input type="text" id="edituser_nome" name="nome" placeholder="Nome completo . . ." class="form-control">
            </div>
            <div class="form-group">
                <input type="text" id="edituser_matricula" name="matricula" placeholder="Cpf . . ." class="form-control">
            </div>
            <div class="form-group">
                <input type="password" id="edituser_senha" name="senha" placeholder="Senha . . ." class="form-control">
            </div>
            <div class="form-group">
                <select name="edituser_status" id="edituser_status" class="form-control">
                    <option value="0">Desativado</option>
                    <option value="1">Ativado</option>
                </select>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" id="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Enviar
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Cancelar
        </button>
    </div>
</div>