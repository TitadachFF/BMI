<?php
class BMI_Calculator {
    private $weight;
    private $height;

    public function __construct($weight, $height) {
        $this->weight = $weight;
        $this->height = $height / 100; // Convert height from cm to meters
    }

    public function calculateBMI() {
        $bmi = $this->weight / ($this->height * $this->height);
        return $bmi;
    }

    public function interpretBMI() {
        $bmi = $this->calculateBMI();
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi < 25) {
            return "Normal weight";
        } elseif ($bmi < 30) {
            return "Overweight";
        } else {
            return "Obese";
        }
    }
}

// Main program
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $weight = floatval($_POST["weight"]);
    $height = floatval($_POST["height"]);

    $calculator = new BMI_Calculator($weight, $height);
    $bmiValue = $calculator->calculateBMI();
    $bmiInterpretation = $calculator->interpretBMI();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        body {
                font-family: Arial, sans-serif;
    background-color: #313131;
    padding: 20px;
        }

        .h1 {
            text-align: center;
            font-size: 60px;
    color: #fff;
    
    -webkit-animation: glow 1s ease-in-out infinite alternate;
    -moz-animation: glow 1s ease-in-out infinite alternate;
    animation: glow 1s ease-in-out infinite alternate;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 300px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 120px;
             margin-left:95px;
             font-size: 20px;
             
        }

        input[type="number"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
             margin-left:50px;
        }

        button[type="submit"] {
            padding: 10px 20px;
           background-color: #818b91;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
           margin-left:100px;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ccc;
            text-align: center;
            width: 300px;
           margin-left:530px;
        }
        @-webkit-keyframes glow {
    from {
      text-shadow: 0 0 10px #fff;
    }
    to {
      text-shadow: 0 0 20px #fff;}}
      .in{
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 400px;
    margin-left: 485px;
  background-color: red;
  animation-name: example;
  animation-duration: 4s;

  }

  @keyframes example {
  0%   {background-color: red;}
  25%  {background-color: rgb(3, 255, 37);}
  50%  {background-color: blue;}
  100% {background-color: green;}
}
    </style>
</head>
<body>
    <h1 class ="h1">BMI Calculator</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" required>
        </div>
        <div class="form-group">
            <label for="height">Height (cm):</label>
            <input type="number" name="height" required>
        </div>
        <button type="submit">Calculate</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="result">
            <p>BMI Value: <?php echo number_format($bmiValue, 2); ?></p>
            <p>BMI Interpretation (English): <?php echo $bmiInterpretation; ?></p>
            <?php
                $bmiInterpretationThai = "";
                switch ($bmiInterpretation) {
                    case "Underweight":
                        $bmiInterpretationThai = "น้ำหนักน้อย";
                        break;
                    case "Normal weight":
                        $bmiInterpretationThai = "น้ำหนักปกติ";
                        break;
                    case "Overweight":
                        $bmiInterpretationThai = "น้ำหนักเกิน";
                        break;
                    case "Obese":
                        $bmiInterpretationThai = "โรคอ้วน";
                        break;
                }
            ?>
  
            <p>BMI Interpretation (Thai): <?php echo $bmiInterpretationThai; ?></p>
        </div>
    <?php endif; ?>
              <br> 
<img class="in" src="img/123.jpg" alt="" srcset="">
</body>
</html>
