<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Online CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <!-- Font Awesome Offline CDN -->
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free-5.15.2-web/css/all.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/ifm_logo_2.png" type="image/x-icon">
    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- View CSS -->
    <link rel="stylesheet" href="../assets/css/view_data.css">
    <!-- Title -->
    <title>Form</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="#" class="nav-brand">
            <div class="nav-brand-logo">
                <img src="../assets/img/ifm_logo_2.png" alt="" class="nav-logo"><span>IFM MAONI</span>
            </div>
        </a>
        <label for="check" id="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <input type="checkbox" name="check" id="check">
        <ul class="navbar-nav">
            <li class="nav-item flex-space-between"><p>Welcome <?php echo $_SESSION['username']; ?></p> <i class="far fa-smile"></i></li>
            <li class="nav-item"><a href="change_password.php" class="nav-link"><i class="fas fa-lock"></i> Change password</li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Signout</a ></li>
        </ul>
        <div class="nav-right-content">
            <div class="flex-space-between">
            <p>Welcome, <?php echo $_SESSION['username']; ?></p><i class="far fa-smile"></i>
            </div>
            <a href="change_password.php"><i class="fas fa-lock"></i> Change password</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Signout</a>
        </div>
    </nav>
    <!-- End nav -->

    <!-- Main -->
    <main>
        <section id="view">
            <div class="container">
                <h1 class="lead">
                    Taarifa muhimu na Maoni
                </h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="table-container">

                        <!-- Require connection -->
                        <?php

                        require_once('../assets/required/connection.php');

                        // Set display to 10 records per page

                        $pagerows = 10;

                        // Get total number of pages
                        // Has the total number of pages already been calculated?
                        if (isset($_GET['p']) && is_numeric($_GET['p'])) { //already been calculated
                            $pages = $_GET['p'];
                        } else { //use the next block of code to calculate the number of pages 
                            //First, check for the total number of records
                            $q = "SELECT COUNT(id) FROM student";
                            $result = @mysqli_query($conn, $q);
                            $row = @mysqli_fetch_array($result, MYSQLI_NUM);
                            $records = $row[0];
                            //Now calculate the number of pages
                            /*
        If the number of pages has not already been calculated by the code, the code calculates it now by counting the
        number of ids in the student table. Then it checks to see if the number of records is greater than the number of
        records displayed per page.
        */
                            if ($records > $pagerows) { //if the number of records will fill more than one page
                                //Calculate the number of pages and round the result up to the nearest integer
                                $pages = ceil($records / $pagerows);
                                /*
        If the number of records is greater than the number of records displayed per page, round up the number of pages
        to a whole number. The PHP function ceil() rounds up the number of pages. In the database, we have 10 records,
        resulting in two and a half pages (14 divided by 4). This is rounded up to three pages. The third page will display only 
        two records. If the number of records is not greater than the number of rows per display, there will be only one page.
        The function ceil() means set the ceiling or set to an integer above the actual count; in this case, 3.5 becomes 4.
        */
                            } else {
                                $pages = 1;
                            }
                        } //page check finished

                        //Declare which record to start with 
                        if (isset($_GET['s']) && is_numeric($_GET['s'])) { //already been calculated
                            $start = $_GET['s'];
                        } else {
                            $start = 0;
                        } // This ensures that the variable [‘s’] is an integer. Then the start point for the display is set to zero

                        // Make the query: 
                        /*
    The query selects the columns to be displayed and sets the number of rows to be displayed per page, starting with
    the record number zero. (The variable $start was set to zero.)
    */
                        $q = "SELECT firstname, lastname, email, phone, region, district, gender, birthdate, comments, DATE_FORMAT(saved_date, '%M %D, %Y')
    AS saved_date, id FROM student ORDER BY id ASC LIMIT $start, $pagerows";
                        $result = @mysqli_query($conn, $q); // Run the query
                        $records = mysqli_num_rows($result);
                        if ($result) { // If it ran without a problem, display the records
                            // Table headings
                            echo '<table>
                            <tr>
                                <th id="th"><i class="fas fa-sort-numeric-down"></i> S/N</th>
                                <th id="th-2"><i class="far fa-user"></i> Jina la Kwanza</th>
                                <th id="th-3"><i class="far fa-user"></i> Jina la Mwisho</th>
                                <th id="th-4"><i class="far fa-envelope"></i> Barua pepe</th>
                                <th id="th-5"><i class="fas fa-phone-alt"></i> Namba ya simu</th>
                                <th id="th-6"><i class="fas fa-map-marker-alt"></i> Mkoa</th>
                                <th id="th-6"><i class="fas fa-map-marker-alt"></i> Wilaya</th>
                                <th id="th-7"><i class="fas fa-transgender"></i> Jinsia</th>
                                <th id="th-8"><i class="far fa-calendar-check"></i> Tarehe ya kuzaliwa</th>
                                <th id="th-9"><i class="far fa-comment-dots"></i> Maoni</th>
                                <th id="th-10"><i class="far fa-calendar-check"></i> Tarehe ya taarifa</th>
                            </tr>';
                            // Fetch and print all the records 
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { // The code loops through the users table’s data until all the data has been displayed.
                                echo '<tr> 
                             <td>' . $row['id'] . '</td> 
                             <td>' . $row['firstname'] . '</td> 
                             <td>' . $row['lastname'] . '</td>
                             <td>' . $row['email'] . '</td>
                             <td>' . $row['phone'] . '</td>
                             <td>' . $row['region'] . '</td>
                             <td>' . $row['district'] . '</td>
                             <td>' . $row['gender'] . '</td>
                             <td>' . $row['birthdate'] . '</td>
                             <td>' . $row['comments'] . '</td>
                            <td>' . $row['saved_date'] . '</td>
                            </tr>    
                             ';
                            }
                            echo '</table>'; // Close the table 
                            mysqli_free_result($result); // Free up the resources
                        } else { // If it failed to run
                            // Error message
                            echo '<p class="error">The current data could not be retrieved. We apologize 
                            for any inconvenience.</p>';
                            // Debugging message
                            echo '<p style="text-align:center;">' . mysqli_error($conn) . '<br><br />Query: ' . $q . '</p>';
                        } // End of if ($result)
                        //Now display the figure for the total number of records
                        $q = "SELECT COUNT(id) FROM student";
                        $result = @mysqli_query($conn, $q);
                        $row = @mysqli_fetch_array($result, MYSQLI_NUM);
                        $records = $row[0]; // This code counts the total number of rows in the table and assigns the total to the variable $records.
                        mysqli_close($conn); // Close the database connection
                        // The database is closed, and the total number of records is displayed on the screen
                        echo "<p class='records-total'>Jumla ya maoni na taarifa: $records</p>";
                        if ($pages > 1) {
                            echo '<div class="prev-next-btns">';
                            //What number is the current page?
                            $current_page = ($start / $pagerows) + 1;
                            //If the page is not the first page then create a Previous link
                            if ($current_page != 1) {
                                echo '<a href="view_data.php?s=' . ($start - $pagerows) .
                                    '&p=' . $pages . '" class="btn btn-prev"><i class="fas fa-arrow-circle-left"></i> Iliyopita</a>
                                ';
                            }
                            //Create a Next link 
                            if ($current_page != $pages) {
                                echo '<a href="view_data.php?s=' . ($start + $pagerows) .
                                    '&p=' . $pages . '" class="btn btn-next">Inayofuata <i class="fas fa-arrow-circle-right"></i></a>';
                            }
                            echo '</div>';
                        }

                        ?>
                    </div>
                </div>
                <div class="text">
                    <p class="para">&copy; <span id="year"></span> The Institute of Finance Management (IFM)</p>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main -->

    <!-- === Scripts === -->
    <!-- jQuery -->
    <script src="../assets/vendors/jquery/jquery.min.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <!-- View JS -->
    <script src="../assets/js/view_data.js"></script>
</body>

</html>