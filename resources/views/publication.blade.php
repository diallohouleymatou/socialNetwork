
    <div class="container">
        <div class="post-container">
            <h2>Créer une Publication</h2>
            <form action="{{route('publication')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="postText">Texte de la publication</label>
                    <textarea class="form-control" id="postText" name="texte" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="postImage">Télécharger une image (facultatif)</label>
                    <input type="file" class="form-control-file" id="postImage" name="postImage" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary post-button">Publier</button>
            </form>
        </div>
    </div>

