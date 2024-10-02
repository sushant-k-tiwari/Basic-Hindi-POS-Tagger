<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hindi POS Tagger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary poppins-semibold">
        <div class="container-fluid">
            <a class="navbar-brand " href="index.php">हिन्दी POS Tagger</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="#"></a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#"></a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Function to load the preprocessed POS data into an associative array
    function load_pos_data($filename)
    {
        $pos_data = [];
        if (($handle = fopen($filename, "r")) !== false) {
            while (($line = fgets($handle)) !== false) {
                $parts = explode(" ", trim($line));
                if (count($parts) == 2) {
                    $pos_data[$parts[0]] = $parts[1];  // Word => POS
                }
            }
            fclose($handle);
        }
        return $pos_data;
    }

    // Handle form submission and processing
    $sentence = "";
    $output = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input sentence
        $sentence = $_POST['sentence'];

        // Load POS data from the file
        $pos_data = load_pos_data('pos.txt');

        // Split the sentence into words
        $words = explode(" ", $sentence);

        // Create the output with word(POS)
        $output = "";
        foreach ($words as $word) {
            $pos = isset($pos_data[$word]) ? $pos_data[$word] : "OOV";  // Use "OOV" for out-of-vocabulary words
            $output .= $word . "(" . $pos . ") ";
        }
        $output = trim($output);  // Remove the trailing space
    }
    ?>

    <!-- Input -->
    <div class="input-group mb-3 poppins-semibold">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input style="width:800px; margin: 50px;" type="text" class="form-control" name="sentence" placeholder="Enter the Sentence" aria-label="Recipient's username" aria-describedby="button-addon2"
                value="<?php echo htmlspecialchars($sentence); ?>">
            <button style="margin-left: 860px; margin-top: -165px;" class="btn btn-outline-secondary" type="submit" id="button-addon2">Tag POS</button>
        </form>
    </div>

    <!-- Text Area for Output -->
    <div class="form-floating poppins-semibold" style="width:800px; margin-left: 50px; margin-top: 50px;">
        <textarea class="form-control poppins-medium" id="floatingTextarea2"
            style="height: 150px; padding-top: 50px;"><?php echo htmlspecialchars($output); ?></textarea>
        <label for="floatingTextarea2" style="color: black;">POS Tagging...</label>
    </div>


    </div>
</body>

</html>