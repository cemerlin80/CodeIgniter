  <?php
  include("header.php");
  ?>
 
<div class="container">
  <div class="row">
    <div class="col-12">
    <h1>Detail du disque</h1>  
     <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="disc_title" value="<?= $detail->disc_title?>" disabled>
  </div>
  <div class="form-group">
    <label for="year">Year</label>
    <input type="number" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Enter year" name="disc_year" value="<?= $detail->disc_year?>" readonly>
  </div>
  <div class="form-group">
    <label for="label">Label</label>
    <input type="text" class="form-control" id="label" aria-describedby="emailHelp" placeholder="" name="disc_label" value="<?= $detail->disc_label?>" readonly>
  </div>
  <div class="form-group">
    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" aria-describedby="emailHelp" placeholder="" name="disc_genre" value="<?= $detail->disc_genre?>" readonly>
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="number" class="form-control" id="price" aria-describedby="emailHelp" placeholder="" name="disc_price" value="<?= $detail->disc_price?>" readonly>
  </div>
    <div class="form-group">
    <label for="artiste">Artiste</label>
    <input type="text" class="form-control" id="artiste" aria-describedby="emailHelp" placeholder="" name="artist_id" value="<?= $detail->artist_name?>" readonly>
  </div>  
  <div class="form-group">
    <label for="Photo">Photo</label>
    <input type="text" class="form-control" id="picture" aria-describedby="emailHelp" placeholder="" name="disc_picture" value="<?= $detail->disc_picture?>" readonly>
  </div>
   
 <a href="<?= site_url("discs/liste/") ?>" class="btn btn-success">Retour</a>
 <a href="<?= site_url("discs/modifier/". $detail->disc_id) ?>" class="btn btn-success">Modifier</a>
 <a href="<?= site_url("discs/supprimer/". $detail->disc_id) ?>" class="btn btn-danger">Supprimer</a>

</div>
</div>
</div>
  
</form>  









