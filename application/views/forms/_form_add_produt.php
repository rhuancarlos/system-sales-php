<div class="card">
    <div class="card-header">
        <strong>Cadastro de Produtos</strong>
    </div>
    <div class="card-body card-block">
        <form>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                <input type="text" id="produts_descricao_c" maxlength="60" name="produts_descricao_c" placeholder="Descrição Completa" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">

                        <input type="text" maxlength="45" id="produts_descricao_p" name="produts_descricao_p" placeholder="Descrição Curta" class="form-control">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="produts_prc_avista" id="produts_prc_avista" placeholder="Valor Avista (Ex. R$ 1.90) " class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="produts_prc_aprazo" id="produts_prc_aprazo" placeholder="Valor a Prazo (Ex. R$ 2.90) " class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text"  maxlength="40" name="produts_cod_barras" id="produts_cod_barras" placeholder="Código de Barras" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" maxlength="11" id="produts_qtd" name="produts_qtd" placeholder="Quantidade" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" id="submit_produt" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Cadastrar
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Limpar Formulário
        </button>
    </div>
</div>