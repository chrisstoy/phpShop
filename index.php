<!DOCTYPE html>
<html>
    <head>
        <title>Cars!</title>
        <style>
            .error {
                color: red;
                font-size: smaller;
            }
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body>
        <?php

            $cars = array(
                "VW",
                "BMW",
                "Audi",
                "Mazda",
                "Buick"
            );

            $yournameError = "";
            $favcarError = "";
            $yourname = null;
            $favcar = null;
            $goodToGo = true;

            // Cleans input data of bad characters and strips extraneous whitespace
            function formValue($key) {
                if ( empty($_POST[$key])) {
                    return null;
                }
                else {
                    $data = trim($_POST[$key]);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            }

            if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                $yourname = formValue('fullname');
                $favcar = formValue('car');

                if ( $yourname == "" ) {
                    $goodToGo = false;
                    $yournameError = "You must enter your name";
                }
                if ( $favcar == "" ) {
                    $goodToGo = false;
                    $favcarError = "You must select a favorite car";
                }
            }
        ?>

        <h1>Car Select Test</h1>
        <hr>
        <h3>Select your favorite car below, then press SUBMIT</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="FullName">Your Full Name: </label><input type="input" name="fullname" id="FullName">
            <span class="<?php $yournameError!=''? print('error'): print('hidden'); ?>">* <?php echo $yournameError;?></span>
            <br>
            <br>
            <label>Select Car Model:</label>
            <span class="<?php $favcarError!=''? print('error'): print('hidden'); ?>">* <?php echo $favcarError;?></span>
            <br>
            <?php
                foreach( $cars as $carmake) {
                    echo "<input type='radio' name='car' value='$carmake'>$carmake</br>";
                }
            ?>
            <br>
            <input type="submit" value="Submit">
        </form>
        <br>
        <hr>

        <?php
            if ( $yourname !== null && $favcar !== null ) {

               // go fetch an image for the selected car
                $response = file_get_contents('http://api.pixplorer.co.uk/image?word='.$favcar);
                $response = json_decode($response);
                $images = $response->images;
                $image = $images[0];
                $img_url = $image->imageurl;

                echo "<p>".$yourname.", you selected <strong>".$favcar."</strong> as your favorite car.";
                echo "<br><img src='".$img_url."'></p>";
            }
        ?>
        <p>
            <a href="/">Try Again</a>
        </p>


    </body>
</html>



