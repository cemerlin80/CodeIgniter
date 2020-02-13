<!-- application/views/liste.php -->

<link rel="stylesheet" href="<?= base_url("/ci/assets/css/style.css"); ?>">


<h1>liste</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <?php foreach ($liste as $disc) : ?>
                <tr>
                    <td>
                        <?= $disc->disc_title ?> <br>
                        <?= $disc->disc_year ?> <br>
                        <?= $disc->disc_label ?> <br>
                        <?= $disc->disc_genre ?> <br>
                        <a href="<?= site_url("discs/detail/") . $disc->disc_id ?>" class="btn btn-primary">Détail</a>

                    </td>
                    <td>
                        <img src="/ci/upload/<?= $disc->disc_picture ?>" style="width: 150px;">
                    </td>

                </tr>

            <?php endforeach; ?>
        </table>

        <a href="<?= site_url("discs/add/") ?>" class="btn btn-primary">Ajouter</a>


        <!-- 
<?php foreach ($liste as $artist) : ?>

    <div>
        <?= $artist->artist_name ?>
        <a href="<?= site_url("discs/detail/") . $artist->artist_id ?>">
            Detail
        </a>
        <a href="<?= site_url("discs/modif/") . $artist->artist_id ?>">
            modif
        </a>
    </div>

<?php endforeach; ?> -->
        <?php


        // echo base_url(); 
        ?>


        </body>

        </html>