<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWL - Books</title>

    <link rel="stylesheet" href="../CSS/style.css">



</head>

<body>
    <!-- Navigation Bar -->
<nav>
    <div class="header">
        <a href="HSindex.php" class="logo"> JW Library</a>

        <div class="navbar">
            <a href="HSdisplaybook.php">Books</a>
            <a href="#">About Us</a>
            <a href="HSlogin.php">Login</a>
        </div>
        <div>
            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>
    <nav class="mobile">
        <a href="HSdisplaybook.php">Books</a>
        <a href="#">About Us</a>
        <a href="HSlogin.php">Login</a>
    </nav>
    <div class="container">
        <h1>John Wolmer Library</h1>

        <!-- Display data from HSbookdata.txt and show images from upload file -->
        <div class="content">
            <h2>Books</h2>
            <p>View the library's collection of books.</p>
            <a href="HSaddbook.php" class="to_login"><button>Add Another Book</button></a> 
            
            <br><br>

            <?php  
    // Function to display book image
    function displayBookCover($fileName) {
        $imageExtensions = array("jpg", "jpeg", "png");
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if (in_array(strtolower($fileExtension), $imageExtensions)) {
            return "<img src='uploads/$fileName' alt='Book Cover' width='100' height='100'>";
        } else {
            return "No Image Available";
        }
    }

    // Read data from HSbookdata.txt
    $file = fopen("HSbookdata.txt", "r");
    if ($file) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<th>Author</th>";
        echo "<th>Year Published</th>";
        echo "<th>Book Cover</th>";
        echo "<th>ISBN</th>";
        echo "<th>Call Number</th>";
        echo "<th>Subject Area</th>";
        echo "<th>Copies</th>";
        echo "</tr>";

        while (!feof($file)) {
            $row = fgets($file);
            $cells = explode(",", $row);
            echo "<tr>";
            foreach ($cells as $index => $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
                if ($index === 3) { 
                    echo "<td>" . displayBookCover(trim($cell)) . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($file);
    } else {
        echo "Error: Unable to open file.";
    }
?>


        </div>      <!-- End of content -->
    </div>

<!-- Footer -->

<div class="footer">
        <br>
        <hr> 

            <small>
                Created by Nathalea Evans [2101707] and Kevon Simpson [2000206]. 
                <br>
                © All images are copyrighted by their respective owners
                <br><br>
                John Wolmer Library was created using HTML, CSS, JavaScript, and PHP
                <br><br>
                <a class="adm-lnk" href="">Admin</a>
                <br>
                --ˋˏ ༻❁༺ ˎˊ--
            </small>
    </div>

    <script type="text/javascript" src="../script/script.js"></script>
</body>
</html>