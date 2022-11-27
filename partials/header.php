<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/logo/logo.png">
    
    <!-- Tailwind -->
    <link rel="stylesheet" href="./dist/output.css">

    <!-- Jquery -->
    <script src="./framework/jquery/dist/jquery.min.js"></script>

    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <title>
        <?php
        $fileName = basename($_SERVER['REQUEST_URI'], '.php');
        $fileNameNoExtension = preg_replace("/\.[^.]+$/", "", $fileName);
        echo ucwords($fileNameNoExtension);
        ?>
    </title>
</head>
