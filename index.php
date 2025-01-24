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
    <link rel="stylesheet" href="assets/vendors/fontawesome-free-5.15.2-web/css/all.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/ifm_logo_2.png" type="image/x-icon">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Index CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- Title -->
    <title>Form</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="#" class="nav-brand">
            <div class="nav-brand-logo">
                <img src="assets/img/ifm_logo_2.png" alt="" class="nav-logo"><span>IFM MAONI</span>
            </div>
        </a>
        <label for="check" id="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <input type="checkbox" name="check" id="check">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="" class="nav-link active"><i class="fas fa-home"></i> Nyumbani</a></li>
            <li class="nav-item"><a href="pages/login.php" class="nav-link"><i class="far fa-comment-dots"></i> Maoni</a></li>
        </ul>
    </nav>
    <!-- End nav -->
    <main>

        <section id="form">
            <div class="container commento">
                <div class="row commenter">
                    <h1 class="lead">Tuambie, tueleze, maoni na ushauri wako ni wathamani sana kwa maendeleo yetu na taifa
                    </h1>
                    <img src="assets/img/comments.svg" alt="">
                </div>
            </div>
            <div class="container form-wrapper">
                <div class="row">
                </div>
                <div class="row">
                    <!-- Form Wrapper -->
                    <div class="wrapper">
                        <header>
                            Sanduku la maoni
                        </header>
                        <p class="message"></p>
                        <form method="POST">
                            <div class="joint-fields">
                                <div class="field name-1">
                                    <div class="input-area">
                                        <input type="text" name="fname" id="fname" placeholder="Jina la Kwanza">
                                        <i class="icon fas fa-user-alt"></i>
                                        <i class="error error-icon fas fa-exclamation-circle"></i>
                                        <i class="success success-icon fas fa-check-circle"></i>
                                    </div>
                                    <div class="error error-txt">Jina la kwanza linahitajika</div>
                                </div>
                                <div class="field name-2">
                                    <div class="input-area">
                                        <input type="text" name="lname" id="lname" placeholder="Jina la Mwisho">
                                        <i class="icon fas fa-user-alt"></i>
                                        <i class="error error-icon fas fa-exclamation-circle"></i>
                                        <i class="success success-icon fas fa-check-circle"></i>
                                    </div>
                                    <div class="error error-txt">Jina la Mwisho linahitajika</div>
                                </div>
                            </div>
                            <div class="joint-fields">
                                <div class="field email">
                                    <div class="input-area">
                                        <input type="text" name="email" id="email" placeholder="Barua pepe">
                                        <i class="icon fas fa-envelope"></i>
                                        <i class="error error-icon fas fa-exclamation-circle"></i>
                                        <i class="success success-icon fas fa-check-circle"></i>
                                    </div>
                                    <div class="error error-txt">Barua pepe inahitajika</div>
                                </div>
                                <div class="field phone">
                                    <div class="input-area">
                                        <input type="text" name="phone" id="phone" placeholder="Namba ya simu">
                                        <i class="icon fas fa-phone-alt"></i>
                                        <i class="error error-icon fas fa-exclamation-circle"></i>
                                        <i class="success success-icon fas fa-check-circle"></i>
                                    </div>
                                    <div class="error error-txt">Namba ya simu inahitajika</div>
                                </div>
                            </div>
                            <div class="joint-fields">
                                <div class="field region">
                                    <div class="regions">
                                        <div class="input-area">
                                            <select name="region" id="region">
                                                <option>Chagua Mkoa</option>
                                                <option value="Arusha">Arusha</option>
                                                <option value="Dar es salaam">Dar es salaam</option>
                                                <option value="Dodoma">Dodoma</option>
                                                <option value="Geita">Geita</option>
                                                <option value="Iringa">Iringa</option>
                                                <option value="Kagera">Kagera</option>
                                                <option value="Katavi">Katavi</option>
                                                <option value="Kigoma">Kigoma</option>
                                                <option value="Kilimanjaro">Kilimanjaro</option>
                                                <option value="Lindi">Lindi</option>
                                                <option value="Manyara">Manyara</option>
                                                <option value="Mara">Mara</option>
                                                <option value="Mbeya">Mbeya</option>
                                                <option value="Morogoro">Morogoro</option>
                                                <option value="Mtwara">Mtwara</option>
                                                <option value="Mwanza">Mwanza</option>
                                                <option value="Njombe">Njombe</option>
                                                <option value="Pwani">Pwani</option>
                                                <option value="Rukwa">Rukwa</option>
                                                <option value="Ruvuma">Ruvuma</option>
                                                <option value="Shinyanga">Shinyanga</option>
                                                <option value="Simiyu">Simiyu</option>
                                                <option value="Singida">Singida</option>
                                                <option value="Songwe">Songwe</option>
                                                <option value="Tabora">Tabora</option>
                                                <option value="Tanga">Tanga</option>
                                            </select>
                                            <i class="icon fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="field district" id="response">
                                    <div class="districts">
                                        <div class="input-area">
                                            <select name="district" id="district">
                                                <option>Chagua Wilaya</option>
                                            </select>
                                            <i class="icon fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field calendar">
                                <h4 class="calendar-text">Tarehe ya kuzaliwa:</h4>
                                <div class="input-area">
                                    <input type="date" name="birthdate" id="birthdate">
                                    <i class="icon fas fa-calendar-check"></i>
                                    <i class="error error-icon fas fa-exclamation-circle"></i>
                                    <i class="success icon-success fas fa-calendar-check"></i>
                                </div>
                                <div class="error error-txt">Tarehe ya kuzaliwa inahitajika</div>
                            </div>
                            <div class="field comments">
                                <div class="input-area">
                                    <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Maoni"></textarea>
                                    <i class="icon fas fa-comment-dots"></i>
                                    <i class="error error-icon fas fa-exclamation-circle"></i>
                                    <i class="success success-icon fas fa-check-circle"></i>
                                </div>
                                <div class="error error-txt">Maoni yanahitajika</div>
                            </div>
                            <div class="field gender">
                                <div class="input-area">
                                    <h4 class="gender-text">Jinsia:</h4>
                                    <div class="radio">
                                        <input type="radio" name="sex" class="gender" value="male" checked>
                                        <label for="sex" class="male">Mwanamume</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="sex" class="gender" value="female">
                                        <label for="sex" class="female">Mwanamke</label>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Tuma maoni">
                            </>
                    </div>
                    <!-- End Form Wrapper -->
                </div>
                <div class="row">
                    <div class="text">
                        <p class="para">&copy; <span id="year"></span> The Institute of Finance Management (IFM)</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- === Scripts === -->
    <!-- jQuery -->
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <!-- Online jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Index JS -->
    <script src="assets/js/index.js"></script>
    <script>
        /* ===================== # Address Dropdown List ======================*/
        $(document).ready(function() {
            $("select#region").change(function() {
                let selected_Region = $("#region option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "pages/process_address_request.php",
                    // url: "pages/save_to_db.php",
                    data: {
                        region: selected_Region
                    }
                }).done(function(data) {
                    $("#response").html(data);
                });
            });
        });
    </script>
</body>

</html>