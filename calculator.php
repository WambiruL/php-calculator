<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculator.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
        <input type="number" name="num01" placeholder="First Number">
            <select name="operator"> 
                <option value="add">+</option>
                <option value="minus">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
                <option value="modulus">%</option>
            </select>
            <input type="number" name="num02" placeholder="Second Number">
            <button class="btn-btn">Calculate</button>
        </div>
        
           

        </form>

        <?php 
            //Get form data
            if ($_SERVER["REQUEST_METHOD"]=="POST"){
                $num01=filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
                $num02=filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
                $operator=htmlspecialchars($_POST["operator"]);

                //error handlers
                $error=false;
                if(empty($num01) || empty($num02) || empty($operator)){
                    echo "<p class= 'calc-error'>Fill In all the fileds!!</p>";
                    $error=true;

                    if(!is_numeric($num01) || !is_numeric($num02)){
                        echo "<p class= 'calc-error'>Write only numbers!!</p>";
                        $error=true;

                    }
                }else{
                    //Calculate if there are no errors
                    $value=0;
                    switch ($operator){     
                        case 'add':
                            $value= $num01 + $num02;
                            break;

                        case 'minus':
                            $value= $num01 - $num02;
                            break;

                        case 'multiply':
                            $value= $num01 * $num02;
                            break;
                
                        case 'divide':
                            $value= $num01 / $num02;
                            break;
                
                        case 'modulus':
                            $value= $num01 % $num02;
                            break;
                
                        default:
                            echo  "<p class= 'calc-error'>Something went So wrong!</p>";
                    } 
                    echo "<p class='calc-result'><span>Result</span> = " . $value . "</p>";
                }
            }

        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>