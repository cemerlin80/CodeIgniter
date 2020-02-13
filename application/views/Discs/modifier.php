<h1>Modifier</h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="<?= site_url("discs/modifier/". $disc->disc_id) ?>" method="POST" enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" placeholder="Entrez titre" name="disc_title" value="<?= $disc->disc_title?>">
                </div>
                <div class="form-group">
                    <label for="year">Année</label>
                    <input type="number" class="form-control" id="year" placeholder="Entrez année" name="disc_year" value="<?= $disc->disc_year?>">
                </div>
                <div class="form-group">
                    <label for="label">Label</label>
                    <input type="text" class="form-control" id="label" placeholder="" name="disc_label" value="<?= $disc->disc_label?>">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" placeholder="" name="disc_genre" value="<?= $disc->disc_genre?>">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" id="price" placeholder="" name="disc_price" value="<?= $disc->disc_price?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Artiste</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="artist_id"> 
                        <?php foreach ($artists as $artist) : ?>
                            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Photo">Photo</label>
                    <input type="file" class="form-control" id="picture" placeholder="" name="disc_picture" value="<?= $disc->disc_picture?>">
                </div>
                
                <a href="<?= site_url("discs/liste/") ?>" class="btn btn-primary">Retour</a>

                
                <button type="submit" value="Modifier" class="btn btn-success">Modifier</button>
            
            </form>
        </div>
    </div>
</div>