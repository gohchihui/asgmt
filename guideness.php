<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="guideness.css">
    <link rel="stylesheet" href="guideness.js">
    <link rel="stylesheet" href="styles.css">

    <title>Guideness</title>
</head>

<body>
    <div class="navbar" id="myNavbar">
        <?php 
            session_start();
            include "navbar.php"; 
        ?>
    </div>

    <div class="container mt-5">
        <button id="toggleButton" class="btn btn-primary" onclick="toggleContent('content', 'content2')">Emergency
            contact</button>
        <div id="content" class="hidden mt-3">

            <img src="img/bilik-gerakan-number.png" alt="Image" class="img-fluid">
            <img src="img/emer1.png" alt="Image" class="img-fluid">
            <img src="img/emer2.png" alt="Image" class="img-fluid">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Boomba</td>
                        <td>999</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Police</td>
                        <td>994</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Check contact</td>
                        <td>113</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button id="toggleButton2" class="btn btn-primary" onclick="toggleContent('content2', 'content')">Video how to
            self-rescue</button>
        <div id="content2" class="hidden mt-3">
            <h1>2 Ways to Get Up From a Fall</h1>
            <button onclick="openLinkInNewWindow('https://www.youtube.com/watch?v=sotxItsi71A')"
                class="btn btn-secondary">Reference: Link here</button>
            <iframe src="./img/2 Ways to Get Up From a Fall.mp4" frameborder="50" sandbox allow="fullscreen"></iframe>
        </div>


        <a id="scrollButton" class="btn btn-primary" href="#" role="button">
            <img src="img/to top image.png" alt="Scroll to Top" style="width: 50px; height: 50px;">
        </a>
        <button id="toggleButton3" class="btn btn-primary" onclick="toggleContent('content3', 'content')">Commonly
            medicnes</button>
        <div id="content3" class="hidden mt-3">

            <img src="./img/Top-10-most-common-prescription-medications-in-patients-aged-85-by-sex.png" alt="Image 1">

        </div>
    </div>

    <a id="scrollButton" class="btn btn-primary" href="#" role="button">
        <img src="img/to top image.png" alt="Scroll to Top" style="width: 50px; height: 50px;">
    </a>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="guideness.js"></script>
</body>

</html>