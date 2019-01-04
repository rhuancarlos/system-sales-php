<!-- modal static -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
 data-backdrop="static">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticModalLabel">Excluir Usuário</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					Deseja excluir <b>código "<span id="coddisplay"></span>"</b>
				</p>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="user_name" name="user_id" class="form-control">
				<input type="hidden" id="user_id" name="user_id" class="form-control">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger" id="confirmDeleteItem" >Excluir</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal static -->