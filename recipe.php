<?php
    include_once("templates/header.php");

    if (isset($_GET['id'])) {

        $recipeId = $_GET['id'];
        $currentRecipe;

        foreach ($recipes as $recipe) {
            if ($recipe['id'] == $recipeId) {
                $currentRecipe = $recipe;
            }
        }
    }
?>
    <main id="recipe-container">
        <a href=<?= $BASE_URL ?> class="go-back">Voltar</a>
        <div id="recipe-content">
            <h1><?= $currentRecipe['title'] ?></h1> 
            <div id="recipe-info">
                <div class="recipe-prep-time">
                    <i class="fa-solid fa-clock"></i>
                    <p>Tempo:</p>
                    <p id="prep-time-value"><?= $currentRecipe['preparationTime'] ?></p>
                </div>
                <?php
                    $difficulty = strtolower($currentRecipe['difficulty']);
                    $difficultyClass = ($difficulty == "fácil") ? "easy" :
                        (($difficulty == "médio") ? "middle" : "difficult");
                ?>
                <p id="difficult-label">Dificuldade:</p>
                <p class="recipe-difficulty-<?= $difficultyClass ?>"><?= $currentRecipe['difficulty'] ?></p>
            </div>
            <p id="recipe-description"><?= $currentRecipe['description'] ?></p>
            <div id="recipe-details">
                <img src="<?= $BASE_URL ?>/img/<?= $currentRecipe['image'] ?>" alt="<?= $currentRecipe['title'] ?>" />
                <div>
                    <h2>Ingredientes</h2>
                    <ul>
                        <?php foreach($currentRecipe['ingredients'] as $ingredient): ?>
                            <li><?= $ingredient ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <h2>Modo de preparo</h2>
                    <ul>
                        <?php foreach($currentRecipe['steps'] as $step): ?>
                            <li><?= $step ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>              
            </div>
            <p></p>
        </div>
    </main>
<?php
    include_once("templates/footer.php");
?>