<!DOCTYPE html>
<html>

<head>
    <meta name="referrer" content="strict-origin" />
    <title>Projek UAS IR</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
    .col-example {
        padding: 1rem;
        background-color: #33b5e5;
        border: 2px solid #fff;
        color: #fff;
        text-align: center;
    }

    .search_form input {
        padding: 25px;
        border-top-left-radius: 2em;
        border-bottom-left-radius: 2em;
        border: 1px solid #eaeaea !important;
    }

    .search_form input:focus {
        border: 0px !important;
        outline: none !important;
        box-shadow: none !important;
        border: 1px solid #eaeaea !important;
    }

    .search_form button {
        padding: 0 30px !important;
        border-bottom-right-radius: 2em;
        border-top-right-radius: 2em;
        border: 1px solid #eaeaea !important;
    }

    .action {
        font-size: 11px;
        margin-left: 25px;
        color: #b7b7b7;
    }

    .popup {
        background-color: #ffff;
        width: 450px;
        padding: 30px 40px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
        border-radius: 8px;
        display: none;
        z-index: 2;

    }

    .popup button {
        display: block;
        margin: 0 0 20px auto;
        background-color: trasparent;
        font-size: 30px;
        color: #c5c5c5;
        border: none;
        outline: none;
        cursor: ponter;
    }

    a {
        display: block;
        width: 150px;
        position: relative;
        margin: auto;
        text-align: center;
        background-color: #0f72e5;
        color: #ffffff;
        text-decoration: none;
        padding: 5px 0;
    }
</style>

<body>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center" style="height: 500px">
            <div class="col-6">
                <form method="GET" action="proses_cari.php">
                    <div class="text-center" style="margin-bottom: 50px">
                        <h1>Problem Solving Landing Gear Pesawat Cessna</h1>
                        <small>Ketikan Masalah!</small>
                    </div>
                    <div class="input-group mb-3 search_form">
                        <input type="text" class="form-control" placeholder="Masalah Yang Di Alami?" name="cari" required />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    </script>
</body>

</html>