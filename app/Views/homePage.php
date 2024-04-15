<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/homePage.css">
  <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.min.css">
  <script src="<?php echo base_url('ViewAssets/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.bundle.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --notification-background: #313e2c;
      --notification-primary: #aaec8a;
      --background: #FAF9FF;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      background-color: var(--background);
    }

    .notification {
      position: absolute;
      width: max-content;
      left: 0;
      right: 0;
      bottom: 1.5rem;
      margin-left: auto;
      margin-right: auto;
      border-radius: 0.375rem;
      background-color: var(--notification-background);
      color: var(--notification-primary);
      box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
      transform: translateY(1.875rem);
      opacity: 0;
      visibility: hidden;
      animation: fade-in 3s linear;
    }

    .notification__icon {
      height: 1.625rem;
      width: 1.625rem;
      margin-right: 0.25rem;
    }

    .notification__body {
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 1rem 0.5rem;
    }

    .notification__progress {
      position: absolute;
      left: 0.25rem;
      bottom: 0.25rem;
      width: calc(100% - 0.5rem);
      height: 0.2rem;
      transform: scaleX(0);
      transform-origin: left;
      background: linear-gradient(to right,
          var(--notification-background),
          var(--notification-primary));
      border-radius: inherit;
      animation: progress 2.5s 0.3s linear;
    }

    @keyframes fade-in {
      5% {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }

      95% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes progress {
      to {
        transform: scaleX(1);
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
</head>

<body>
  <div class="home">
    <header class="navbar navbar-expand-lg fixed-top navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img id="MDB-logo1" src="<?php echo base_url('ViewAssets/') ?>images/4.png" alt="MDB Logo" draggable="false"
            height="60" />
          <img id="MDB-logo2" src="<?php echo base_url('ViewAssets/') ?>images/3.png" alt="MDB Logo" draggable="false"
            height="60" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
              <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Ilaclar") ?>"
                style="color: #ffa500;"><i class="fa-solid fa-capsules pe-2"></i>İLAÇLAR</a>
            </li>
            <li class="nav-item">
              <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Hastalar") ?>"
                style="color: #ffa500;"><i class="fa-solid fa-person pe-2"></i>HASTALAR</a>
            </li>
            <li class="nav-item">
              <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Receteler") ?>"
                style="color: #ffa500;"><i class="fa-solid fa-notes-medical pe-2"></i>REÇETE</a>
            </li>
            <li class="nav-item">
              <a class=" btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Stok") ?>"
                style="color: #ffa500;"><i class="fas fa-box pe-2"></i>STOK</a>
            </li>
            <li class="nav-item">
              <a class=" btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Personel") ?>"
                style="color: #ffa500;"><i class="fas fa-user pe-2"></i>PERSONEL</a>
            </li>
            <li class="nav-item">
              <a class="btn  btn-rounded" href="<?php echo base_url("/Sepet") ?>" style="color: #ffa500;" </a><i
                  class="fa-solid fa-cart-shopping pe-2"></i>SEPET</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>
  </div>
  <!--KARTLAR-->
  <div class="cards ">
    <div class="container py-5">
      <h1 class="text-center" style="color: #808080;">Admin Paneli</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo5" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/5.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">PERSONEL</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo6" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/6.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080; text-align:center;">İLAÇ</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn " data-bs-toggle="modal" id="ekleBtn" data-bs-target="#staticBackdrop"
                style="color: #808080; background:#ffa500; font-weight: bold; ">EKLE</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background:#f2f2f2;">
            <img id="MDB-logo7" class="card-img-top" src="<?php echo base_url('ViewAssets/') ?>images/7.jpg"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title" style="color: #808080;text-align:center;">KATEGORİ</h5>
            </div>
            <div class="mb-5 d-flex justify-content-around">
              <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"
                style="color: #808080; background:#ffa500; font-weight: bold;">EKLE</button>
            </div>
          </div>
        </div>
      </div>

      <!--MODAL FORM İLAÇLAR-->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">İlaç Ekle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="İlaç Adı" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Fiyatı" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Firması" />
              </div>
              <select class="form-select" style="color: #808080;" aria-label="Default select example">
                <option selected>Reçete rengini seçin.</option>
                <option value="1">Kırmızı</option>
                <option value="2">Yeşil</option>
                <option value="3">Sarı</option>
              </select>
              <div style="margin-bottom: 15px;"></div>
              <select class="form-select" style="color: #808080;" aria-label="Default select example">
                <option selected>Kategori seçiniz.</option>
                <option value="1">Merhem</option>
                <option value="2">Şurup</option>
                <option value="3">Hap</option>
              </select>
              <div style="margin-bottom: 20px;"></div>
              <div class="input-group mb-3">
                <button onclick="showSnackbar()" class="btn btn-custom btn-lg w-100 fs-6"
                  style="background-color: #ffa500; color: #808080; font-weight: bold;">EKLE</button>
              </div>

              <!--SNACKBAR-->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="ilacKapatBtn" data-bs-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>


      <div id="notif">
      </div>

      <!--MODAL FORM PERSONEL-->

      <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Personel Ekle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6" placeholder="Ad" />
              </div>
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Soyad" />
              </div>
              <select class="form-select w-100" style="color: #808080;" aria-label="Default select example">
                <option selected>Cinsiyet seçin..</option>
                <option value="1">Kadın &#9792;</option>
                <option value="2">Erkek &#9794;</option>
              </select>
              <div style="margin-bottom: 15px;"></div>
              <div style="margin-bottom: 20px;"></div>
              <div class="input-group mb-3">
                <button class="btn btn-custom btn-lg w-100 fs-6"
                  style="background-color: #ffa500; color: #808080; font-weight: bold;">EKLE</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>

      <!--MODAL FORM KATEGORİ-->
      <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Kategori Ekle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <input type="text" name="" id="" class="form-control form-control-lg bg-ligth fs-6"
                  placeholder="Kategori adını girin." />
              </div>
              <div style="margin-bottom: 20px;"></div>
              <div class="input-group mb-3">
                <button class="btn btn-custom btn-lg w-100 fs-6"
                  style="background-color: #ffa500; color: #808080; font-weight: bold;">EKLE</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
          </div>
        </div>
      </div>
      
      <script>
        function showSnackbar() {
          document.getElementById("ilacKapatBtn").click();
          var notifDiv = document.getElementById("notif");
          var notificationContent = `
            <div class="notification">
              <div class="notification__body">
                <img src="<?php echo base_url('ViewAssets/') ?>images/check-circle.svg" alt="Success" class="notification__icon">
                Your account has been created! &#128640;
              </div>
              <div class="notification__progress"></div>
            </div>
          `;
          notifDiv.innerHTML = notificationContent;

          //?????????
          var notification = document.getElementById("notification");
          notification.style.display = "block";
          setTimeout(function () {
            notification.style.display = "none";
          }, 3000); // Snackbar will disappear after 3 seconds
          //?????????
        }
      </script>
</body>

</html>