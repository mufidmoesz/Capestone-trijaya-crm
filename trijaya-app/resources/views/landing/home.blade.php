<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Landing Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url(//fonts.googleapis.com/css?family=Montserrat:400,700);

    .static-slider10 {
      font-family: "Montserrat", sans-serif;
      font-weight: 300;
      background-size: cover;
      background-position: center center;
      height: 100vh; /* Full screen height */
    }

    .static-slider10 .title {
      font-weight: 700;
      font-size: 48px;
      line-height: 50px;
    }

    .static-slider10 .subtitle {
      line-height: 24px;
    }

    @media (max-width: 900px) {
      .static-slider10 .title {
        font-size: 40px;
        line-height: 45px;
      }
    }

    .static-slider10 .btn-md {
      padding: 15px 45px;
      font-size: 16px;
    }

    .static-slider10 .badge {
      line-height: 21px;
    }

    .static-slider10 .badge-inverse {
      background: #3e4555;
    }

    .static-slider10 .op-8 {
      opacity: 0.8;
    }

    /* Flex utilities to center content */
    .full-screen-content {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      height: 100%; /* Ensures the content takes full height of the parent */
    }
  </style>
</head>
<body>
    
  <!-- Hero Section (Full Screen) -->
  <div class="static-slider10 text-white text-center d-flex flex-column justify-content-center align-items-center" 
       style="background-image: url('{{ asset('banner.jpg') }}');">
    <div class="container full-screen-content">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <span class="badge rounded-pill bg-secondary text-light px-3 py-2 mb-3">Trijaya Workshop</span>
          <h1 class="display-4 fw-bold text-uppercase"></h1>
          <p class="lead">Trijyaja App adalah aplikasi yang digunakan untuk melakukan booking di Benkel Trijaya.</p>
          <a href="/form" class="btn btn-outline-light btn-lg rounded-pill mt-3">Book Now</a>
        </div>
      </div>
    </div>
  </div>
  @if (session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Booking Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endif
</div>

  <!-- Bootstrap JS -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    // Show the modal if there is a success message

  </script>
</body>
</html>
