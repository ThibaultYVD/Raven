<div>
    <table>
        <?php

        foreach ($articles['lesArticles'] as $article) {
            //var_dump($article);
        ?>
            <tr>
                <td>
                    <input type="hidden" value="<?= $article->id ?>" id="i_ArticleId_<?= $article->id ?>"><a href="<?= WEBROOT . 'article/detail/' . $article->id ?>"><img src="data:image/png;base64, <?php echo base64_encode($article->image) ?>" width="40px" /> </a>
                </td>
                <td>
                    <audio controls src="<?= WEBROOT . 'asset/media/sons/' . $article->lien ?>">
                        Your browser does not support the <code>audio</code> element.
                    </audio>
                </td>
                <td> <?= $article->titre ?></td>
                <td> - <?= $article->format ?></td>
                <td> - <?= $article->description ?></td>
                <td> - <i class="fas fa-shopping-cart panier" id="panier_<?= $article->id ?>"></i></td>
                <script>
                    document.querySelector("#panier_<?= $article->id ?>").addEventListener('click', function() {
                        fonctionpanier("<?= WEBROOT . 'panier/mettreaupanier/' ?>" + document.querySelector("#i_ArticleId_<?= $article->id ?>").value);
                    }, true);
                </script>

            </tr>
        <?php
        }
        ?>
    </table>


</div>