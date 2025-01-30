<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

// Handle record deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Require connection
    require_once('../assets/required/connection.php');

    // Delete the record from the database
    $delete_query = "DELETE FROM maoni WHERE id = $delete_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Rekodi imefutwa kwa mafanikio.'); window.location.href='view_data.php';</script>";
    } else {
        echo "<script>alert('Kuna hitilafu katika kufuta rekodi.'); window.location.href='view_data.php';</script>";
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- == Metadata == -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- == Font Awesome Online CDN == -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <!-- == Font Awesome Offline CDN == -->
    <link rel="stylesheet" href="../assets/vendors/fontawesome-free-5.15.2-web/css/all.css">
    <!-- == Favicon == -->
    <link rel="shortcut icon" href="../assets/img/ifm_logo_2.png" type="image/x-icon">
    <!-- == CSS == -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/view_data.css">
    <!-- == Title == -->
    <title>Maoni</title>
</head>

<body>
    <!-- == Navigation == -->
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
        <!-- === Small Screen Display === -->
        <ul class="navbar-nav">
            <li class="nav-item flex-space-between">
                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </li>
            <li class="nav-item"><a href="change_password.php" class="nav-link"><i class="fas fa-lock"></i> Change password</li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
        </ul>
        <!-- === Big Screen Display === -->
        <div class="nav-right-content">
            <div class="flex-space-between">
                <p>Welcome, <?php echo $_SESSION['username']; ?></p>
            </div>
            <a href="change_password.php"><i class="fas fa-lock"></i> Change password</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Signout</a>
        </div>
    </nav>

    <!-- == Main == -->
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
                        <?php
                        // Require connection
                        require_once('../assets/required/connection.php');

                        // Set display to 10 records per page
                        $pagerows = 10;

                        // Get total number of pages
                        if (isset($_GET['p']) && is_numeric($_GET['p'])) {
                            $pages = $_GET['p'];
                        } else {
                            //First, check for the total number of records
                            $q = "SELECT COUNT(id) FROM maoni";
                            $result = @mysqli_query($conn, $q);
                            $row = @mysqli_fetch_array($result, MYSQLI_NUM);
                            $records = $row[0];
                            //Now calculate the number of pages
                            if ($records > $pagerows) {
                                $pages = ceil($records / $pagerows);
                            } else {
                                $pages = 1;
                            }
                        }

                        //Declare which record to start with 
                        if (isset($_GET['s']) && is_numeric($_GET['s'])) {
                            $start = $_GET['s'];
                        } else {
                            $start = 0;
                        }

                        $q = "SELECT firstname, lastname, email, phone, attachment, comments, DATE_FORMAT(saved_date, '%M %D, %Y')
    AS saved_date, id FROM maoni ORDER BY id ASC LIMIT $start, $pagerows";
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
                                <th id="th-8"><i class="far fa-file-alt"></i> Kiambatisho</th>
                                <th id="th-9"><i class="far fa-comment-dots"></i> Maoni</th>
                                <th id="th-10"><i class="far fa-calendar-check"></i> Tarehe ya taarifa</th>
                                <th id="th-11"><i class="fas fa-trash-alt"></i> Futa</th>
                            </tr>';
                            // Fetch and print all the records 
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { // The code loops through the users table’s data until all the data has been displayed.
                                echo '<tr> 
                             <td>' . $row['id'] . '</td> 
                             <td>' . $row['firstname'] . '</td> 
                             <td>' . $row['lastname'] . '</td>
                             <td>' . $row['email'] . '</td>
                             <td>' . $row['phone'] . '</td>
                             <td>';
                                if (!empty($row['attachment'])) {
                                    echo '<a href="../uploads/' . htmlspecialchars($row['attachment'], ENT_QUOTES, 'UTF-8') . '" download="' . htmlspecialchars($row['attachment'], ENT_QUOTES, 'UTF-8') . '">Download PDF</a>';
                                } else {
                                    echo 'No attachment';
                                }
                                echo '</td>
                             <td>' . $row['comments'] . '</td>
                            <td>' . $row['saved_date'] . '</td>
                            <td>
                                <a href="view_data.php?delete_id=' . $row['id'] . '" class="delete-btn" onclick="return confirmDelete()"><i class="fas fa-trash-alt"></i> Futa</a>
                            </td>
                            </tr>    
                             ';
                            }
                            echo '</table>';
                            mysqli_free_result($result);
                        } else {
                            echo '<p class="error">The current data could not be retrieved. We apologize 
                            for any inconvenience.</p>';
                            // Debugging message
                            echo '<p style="text-align:center;">' . mysqli_error($conn) . '<br><br />Query: ' . $q . '</p>';
                        }

                        //Now display the figure for the total number of records
                        $q = "SELECT COUNT(id) FROM maoni";
                        $result = @mysqli_query($conn, $q);
                        $row = @mysqli_fetch_array($result, MYSQLI_NUM);
                        $records = $row[0];
                        mysqli_close($conn);
                        echo "<p class='records-total'>Jumla ya maoni na taarifa: $records</p>";
                        if ($pages > 1) {
                            echo '<div class="prev-next-btns">';
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

    <!-- === Scripts === -->
    <!-- == jQuery == -->
    <script src="../assets/vendors/jquery/jquery.min.js"></script>
    <!-- == Main JS == -->
    <script src="../assets/js/main.js"></script>
    <!-- == View JS == -->
    <script src="../assets/js/view_data.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Je, una uhakika unataka kufuta rekodi hii?");
        }
    </script>
</body>

</html>