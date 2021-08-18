<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        ?>
            <script>
                location.replace('../sign-in.php');
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../common/style.css">
    <title>HOME</title>
</head>

<body>
    <header class="header">
        <div class="header__container">
            <a href="#" class="header__logo logo">Somaiya</a>
            <h3 class="page__name text__color">
            <?php include '../php/get-current-url.php'; echo removeSpecialCharacters(); ?> 
            Page</h3>
            <div class="header__search">
                <input type="search" onfocus="clearPageRefreshInterval()" onchange="setPageRefreshIntervalIfSearchBarIsEmpty(event)" placeholder="Search" class="header__input">
                <i class="fas fa-search header__icon"></i>
            </div>

            <div class="header__toggle">
                <i class="fas fa-bars nav__icon" id="header-toggle"></i>

            </div>
        </div>
    </header>

    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div class="">
                <a href="#" class="nav__link nav__logo">
                    <i class="fas fa-university fa-2x text__color"></i>
                    <span class="nav__logo-name text__color">SOMAIYA</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <a href="./main.php?page=announcements" class="nav__link">
                            <i class="fas fa-bullhorn nav__icon"></i>
                            <span class="nav__name">Announcement</span>
                        </a>

                        <a href="./main.php?page=defaulters" class="nav__link">
                            <i class="fas fa-ban nav__icon"></i>
                            <span class="nav__name">Defaulters</span>
                        </a>

                        <a href="./main.php?page=notices" class="nav__link">
                            <i class="far fa-paper-plane nav__icon"></i>
                            <span class="nav__name">Notice</span>
                        </a>

                        <a href="./main.php?page=test_marks" class="nav__link">
                            <i class="fas fa-book nav__icon"></i>
                            <span class="nav__name">Test Marks</span>
                        </a>
                        
                        <?php
                            if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
                            ?>
                                <a class="nav__link" id="messageLink">
                                    <i class="fas fa-comments nav__icon"></i>
                                    <span class="nav__name">Message</span>
                                </a>
                            <?php
                        }
                        ?>

                        <?php
                            if(isset($_SESSION['role']) && $_SESSION['role'] == 'parent') {
                            ?>
                                <a href="./main.php?page=mails" class="nav__link">
                                    <i class="fas fa-envelope-open-text nav__icon"></i>
                                    <span class="nav__name">Mails</span>
                                </a>
                            <?php 
                        }
                        ?>

                        <a href="../php/logout.php" class="nav__link">
                            <i class="fas fa-sign-out-alt nav__icon"></i>
                            <span class="nav__name">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <main class="main__body">
        <div class="card__container">
            <!-- ADDING DYNAMIC NOTICES -->
        </div>
    </main>

    <!-- POP-UP FORM -->
    <div class="modal__form hidden">
        <div class="close__heading">
            <h3>Add your notice</h3>
            <i class="fas fa-times" id="closeButton"></i>
        </div>
        <form action="#" method="POST">
            <div class="form__control">
                <label for="title">Title</label>
                <input required type="text" name="title" id="title" placeholder="Enter your title">
            </div>
            <div class="form__control">
                <label for="message">Message</label>
                <textarea required name="message" id="message" placeholder="Type your message..." name="message" id="" cols="10"
                    rows="5"></textarea>
            </div>
            <div class="form__control">
                <label for="">Notice type</label>
                <select required name="notice_type" id="noticeType">
                    <option value="announcements">Accouncement</option>
                    <option value="defaulters">Defaulters</option>
                    <option value="notices">Notice</option>
                    <option value="test_marks">Test marks</option>
                </select>
            </div>
            <div class="form__control">
                <label for="myFile">Attach your PDF file</label>
                <input type="file" name="my_file" id="myFile">
            </div>
            <button type="submit" class="post__button">POST</button>
        </form>
    </div>
    <div class="overlay hidden"></div>

    <!-- Send Email Pop-Up -->
    <div class="send__mail hidden">
        <div class="close__heading">
            <h3>Send email to recipient</h3>
            <i class="fas fa-times" id="closeSendEmailButton"></i>
        </div>
        <div class="send__mail__container">
            <div class="formBx">
                <form action="#" method="POST" id="sendEmailForm">
                    <div class="form__control">
                        <label for="title">Title</label>
                        <input required type="text" name="title" id="sendMailTitle" placeholder="Enter your title">
                    </div>
                    <div class="form__control">
                        <label for="message">Message</label>
                        <textarea required name="message" id="sendMailMessage" placeholder="Type your message..." name="message" id="" cols="10"
                            rows="5"></textarea>
                    </div>
                    <button type="submit" class="post__button" id="sendEmailButton">SEND</button>
                </form>
            </div>
            <div class="parents__name">
                <!-- Adding dynamic users -->
            </div>
        </div>
    </div>
    <div class="overlay2 hidden"></div>

    <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
            ?>
                <div class="add__icon">
                    <i class="fas fa-plus" id="addIcon"></i>
                </div>
            <?php
        }
    ?>

    <script src="../javascript/main.js"></script>
    <script src="../javascript/notices.js"></script>
    <script src="../javascript/send-mail.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
