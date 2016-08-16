<!-- Modal Login -->
<div id="ModalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Connectez-Vous</h4>
      </div>
        <form method="post" action="">
        <div class="modal-body">
            <div class="alert alert-success" role="alert">
                <p><strong>Informations de connexion provisoires : </strong></p>
                <p>Email : test@gmail.com<br/>Mot de passe : 1234</p>
            </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
              <div class="form-group">
                <label for="pwd">Mot de passe :</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="login_auto"> Se souvenir de moi !</label>
                <input type="hidden" value="1" name="login" />
              </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
        <button type="submit" class="btn btn-primary">Connexion</button>
      </div>
        </form>
    </div>

  </div>
</div>