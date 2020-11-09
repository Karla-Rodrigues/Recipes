<?php

// set the necessary information for sql access 
include "components/access.html"

?>

<?php include "components/access.html" ?>

<?php

// check GET request id param
if (isset($_GET['id'])) {

      // escape sql chars
      $id = mysqli_real_escape_string($conn, $_GET['id']);

      // make sql
      $sql = "SELECT id, title, ingredients, quantities, instructions 
              FROM   recipe
              WHERE id = $id";

      // get the query result
      $result = mysqli_query($conn, $sql);

      // fetch result in array format
      $recipe = mysqli_fetch_assoc($result);

      // free resilt from memory
      mysqli_free_result($result);

      // close the connection
      mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>

<!-- Header -->
<?php include "components/header.html" ?>

<div class="default">
      <div class="container mocha-box">

            <i class="fas fa-cookie-bite fa-5x"></i>

            <?php if ($recipe) : ?>

                  <h4 class="title"><?php echo $recipe['title']; ?></h4>
                  <br>

                  <div class="row">

                        <div class="col box">
                              <h5 class="details">Ingredients</h5>
                              <ul>
                                    <?php foreach (explode(';', $recipe['quantities']) as $ing) : ?>
                                          <li><?php echo htmlspecialchars($ing); ?></li>
                                    <?php endforeach; ?>
                              </ul>
                        </div>

                        <div class="col box">
                              <h5 class="details">Method</h5>
                              <ol>
                                    <?php foreach (explode(';', $recipe['instructions']) as $ing) : ?>
                                          <li><?php echo htmlspecialchars($ing); ?></li>
                                    <?php endforeach; ?>
                              </ol>
                        </div>

                  </div>

            <?php else : ?>
                  <h5>Recipe not found.</h5>
            <?php endif ?>

            <?php if (isset($_GET['category'])) : ?>
                  <a href="favorites.php?category=<?php echo ($_GET['category']) ?>"> return</a>
            <?php else : ?>
                  <a href="favorites.php"> return</a>
            <?php endif ?>





      </div>
</div>

<!-- Footer -->
<?php include "components/footer.html" ?>

</html>