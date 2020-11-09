<?php

$curl = curl_init();

curl_setopt_array($curl, [
      CURLOPT_URL => "https://rapidapi.p.rapidapi.com/recipes/extract?url=http%3A%2F%2Fwww.melskitchencafe.com%2Fthe-best-fudgy-brownies%2F",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: webknox-recipes.p.rapidapi.com",
            "x-rapidapi-key: "
      ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
      echo "cURL Error #:" . $err;
} else {
      echo $response;
}

?>

<!DOCTYPE html>
<html>

<!-- Header -->
<?php include "components/header.html" ?>

<div class="default">
      <div class="container">

            <p> Access to API </p>

      </div>
</div>

<!-- Footer -->
<?php include "components/footer.html" ?>

</html>