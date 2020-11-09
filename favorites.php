<?php

// set the necessary information for sql access 
include "components/access.html"

?>

<?php

if (isset($_GET['category'])) {

      // escape sql chars
      $category = $_GET['category'];

      // write query for selected category      
      $sql = "SELECT id, category, title, ingredients, quantities, instructions 
        FROM   recipe
        WHERE  category = '{$category}'
        ORDER BY created_at";

      // execute query and get result
      $result = mysqli_query($conn, $sql);

      // fetch the resulting rows as an array
      $recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {

      // write query for all recipes
      $sql = "SELECT id, category, title, ingredients, quantities, instructions 
        FROM   recipe
        ORDER BY created_at";

      // execute query and get result
      $result = mysqli_query($conn, $sql);

      // fetch the resulting rows as an array
      $recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// free resilt from memory
mysqli_free_result($result);

// close the connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<!-- Header -->
<?php include "components/header.html" ?>

<div class="default">
      <div class="container">

            <?php
            if (isset($_GET['category'])) {
                  $category = $_GET['category'];
            } else {
                  $category = "";
            } ?>

            <div class="recipe">

                  <?php if ($recipes) : ?>

                        <?php if ($category) : ?>
                              <a class="return" href="favorites.php"><i class="fas fa-reply"></i></a>

                        <?php endif ?>

                        <ul>
                              <?php foreach ($recipes as $recipe) { ?>

                                    <li>

                                          <?php if ($category) : ?>
                                                <a class="cookie" href="details.php?category=<?php echo $recipe['category'] ?>&id=<?php echo $recipe['id'] ?>">
                                                      <i class="fas fa-cookie"></i>
                                                </a>
                                          <?php else : ?>
                                                <a class="cookie" href="details.php?id=<?php echo $recipe['id'] ?>">
                                                      <i class="fas fa-cookie"></i>
                                                </a>
                                          <?php endif ?>

                                          <h4 class="title"> <?php echo htmlspecialchars($recipe['title']); ?> </h4>
                                          <p class="ingredients"> <?php echo htmlspecialchars($recipe['ingredients']); ?> </p>
                                          <a href="favorites.php?category=<?php echo $recipe['category'] ?>">
                                                <?php echo htmlspecialchars($recipe['category']); ?>
                                          </a>
                                    </li>

                              <?php } ?>
                        </ul>

                  <?php else : ?>
                        <h5>Recipe not found.</h5>
                  <?php endif ?>

            </div>


      </div>
</div>

<!-- Footer -->
<?php include "components/footer.html" ?>

</html>