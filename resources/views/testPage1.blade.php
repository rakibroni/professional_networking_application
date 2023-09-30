<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>

  <style>
    .row {
      --bs-gutter-x: 0 !important;
      --bs-gutter-y: 0 !important;
      margin: auto !important;
      max-width: 1158px !important;
    }

    .cura-col-7 {
      width: 57% !important;
    }

    .cura-col-2 {
      width: 18% !important;
    }

    @media (max-width: 992px) {
      .cura-col-7 {
        width: 100% !important;
      }
    }

    @media (min-width: 992px) and (max-width: 1200px) {
      .cura-col-7 {
        width: calc(100vw - 330px) !important;
      }
    }

    .cura-col-3 {
      width: 25% !important
    }

  </style>
</head>

<body>
  <div class="row">
    <div class="cura-col-2 pe-2 d-xl-block d-none">
      <div>

        COL-2
      </div>
    </div>
    <div class="cura-col-7">
      COL-7
    </div>
    <div class="cura-col-3">
      COL-3
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
