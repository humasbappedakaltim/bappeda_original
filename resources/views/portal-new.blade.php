<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Bappeda Provinsi Kalimantan Timur</title>
    <link rel="shortcut icon" href="{{ asset('storage/settings') }}/September2020/akBHm4gYEq4pgdfOLIHQ.png">
    <!-- <link rel="stylesheet" href="assets/css/bulma.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="{{ asset('portalasset') }}/css/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="wrap-bg">
        
        <!-- <input type="checkbox" id="switch" class="check"> -->
        <label for="switch"></label>
        <div id="bgschool">
            <div class="wrap-cloud">
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="cloud">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="sun-moon"></div>
                <div id="stars"></div>
            </div>
        </div>
    </div>

    <div id="container">
        <div id="image-modal" class="modal">
            <div id="bg-close" class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">E-Government</p>
                    </header>
                    <section class="modal-card-body">
                        <div class="columns is-multiline is-centered">
                        @foreach (App\Models\Egov::orderBy('order','asc')->get() as $e)
                            <div class="column is-3">
                            <a href="{{$e->links}}" target="_blank">
                                    <figure>
                                        <img src="{{asset('storage/'.$e->feature_image)}}" alt="{{$e->title}}">
                                    </figure>
                                </a>
                            </div>
                       @endforeach
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <!-- <button class="button is-success">Save changes</button> -->
                        <button id="btn-close" class="button">Tutup</button>
                    </footer>
                </div>
            </div>
            <button id="image-modal-close" class="modal-close"></button>
        </div>
        <div class="content">
            <p
                class="title has-text-warning is-uppercase has-text-weight-bold is-size-2-desktop is-size-4-tablet is-size-5-mobile has-text-weight-light">
                Selamat Datang Di</p>
            <h1 class="subtitle has-text-warning is-size-2-desktop is-size-3-tablet is-size-5-mobile">
                Portal Badan Perencanaan Pembangunan Daerah <br> Provinsi Kalimantan Timur
            </h1>
            <p class="buttons">
                <a href="/beranda" class="button is-medium is-dark">
                    <span>Website</span>
                    <span class="icon">
                        <i class="fa fa-globe"></i>
                    </span>
                </a>
                <button id="showModal" class="button is-medium is-dark">
                    <span>E-Gov</span>
                    <span class="icon">
                        <i class="fa fa-desktop"></i>
                    </span>
                </button>
                <a href="/ppid" class="button is-medium is-dark">
                    <span>PPID</span>
                    <span class="icon">
                        <i class="fa fa-globe"></i>
                    </span>
                </a>
            </p>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var btn = document.querySelector('#showModal');
    var modalDlg = document.querySelector('#image-modal');
    var imageModalCloseBtn = document.querySelector('#image-modal-close');
    var bgClose = document.querySelector('#bg-close');
    var btnClose = document.querySelector('#btn-close');
    btn.addEventListener('click', function () {
        modalDlg.classList.add('is-active');
    });

    imageModalCloseBtn.addEventListener('click', function () {
        modalDlg.classList.remove('is-active');
    });
    bgClose.addEventListener('click', function () {
        modalDlg.classList.remove('is-active');
    });
    btnClose.addEventListener('click', function () {
        modalDlg.classList.remove('is-active');
    });
</script>

</html>