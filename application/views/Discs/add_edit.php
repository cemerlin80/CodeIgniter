<h1><?= $submitValue ?></h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?= form_open_multipart(site_url($url)); ?>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" placeholder="Entrez titre" name="disc_title" value="<?php if (isset($disc->disc_title)) {echo $disc->disc_title;} ?>">
                </div>
                <div class="form-group">
                    <label for="year">Année</label>
                    <input type="number" class="form-control" id="year" placeholder="Entrez année" name="disc_year" value="<?php if (isset($disc->disc_year)) {echo $disc->disc_year;}?>">
                </div>
                <div class="form-group">
                    <label for="label">Label</label>
                    <input type="text" class="form-control" id="label" placeholder="" name="disc_label" value="<?php if (isset($disc->disc_label)) {echo $disc->disc_label;}?>">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" placeholder="" name="disc_genre" value="<?php if (isset($disc->disc_genre)) {echo $disc->disc_genre;}?>">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="number" class="form-control" id="price" placeholder="" name="disc_price" value="<?php if (isset($disc->disc_price)) {echo $disc->disc_price;}?>">
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
                    <input type="file" class="form-control" id="picture" placeholder="" name="disc_picture">
                </div>
                <input type="submit" value="<?= $submitValue ?>" class="btn btn-success">
                
                <a href="<?= site_url("discs/liste/") ?>" class="btn btn-primary">Retour</a>

            </form>
        </div>
    </div>
</div>