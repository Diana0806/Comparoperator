<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Ajouter un Opérateur</h2>
            <form action="./utils/insertOperateur.php" method="post">
                <input type="hidden" name="id">
                <div class="mb-3">
                    <label for="name" class="form-label">Identifiant</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Le lien vers l'opérateur</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>