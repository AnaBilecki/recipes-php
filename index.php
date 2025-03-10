<?php
    include_once("templates/header.php");
?>
    <main>
        <div id="title-container">
            <h1>Sabores & Receitas</h1>
            <p>Descubra novos sabores e receitas deliciosas para tornar cada momento ainda mais especial!</p>
        </div>
        <div id="posts-container">
            <?php foreach($recipes as $recipe): ?>
                <div class="post">
                    <img src="<?= $BASE_URL ?>/img/<?= $recipe['image'] ?>" alt="<?= $recipe['title'] ?>" />
                    <div class="recipe-meta">
                        <div class="recipe-prep-time">
                            <i class="fa-solid fa-clock"></i>
                            <p><?= $recipe['preparationTime'] ?></p>
                        </div>
                        <?php
                            $difficulty = strtolower($recipe['difficulty']);
                            $difficultyClass = ($difficulty == "fácil") ? "easy" :
                                (($difficulty == "médio") ? "middle" : "difficult");
                        ?>
                        <p class="recipe-difficulty-<?= $difficultyClass ?>"><?= $recipe['difficulty'] ?></p>
                    </div>
                    <h2>
                        <a href="<?= $BASE_URL ?>recipe.php?id=<?= $recipe['id'] ?>" class="post-title"><?= $recipe['title'] ?></a>
                    </h2>
                    <p class="post-description"><?= $recipe['description'] ?></p>
                    <div class="tags-container">
                        <?php foreach($recipe['tags'] as $tag): ?>
                            <p class="tag"><?= $tag ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
<?php
    include_once("templates/footer.php");
?>