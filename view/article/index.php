<h1><?= $articles['titre'] ?></h1>
<div>
    <?= $articles['description'] ?>
</div>
<div>
    <?php foreach ($articles['lesArticles'] as $article) {
        //var_dump($article);
        echo '<a href="' . WEBROOT . 'article/detail/' . $article->id . '">' . $article->titre . '</a><br/>';
    }
    ?>
</div>