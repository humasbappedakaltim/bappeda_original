<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (isset($title))
            {{ $title }}
        @else
            {{ setting('site.title') }}
        @endif
    </title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ setting('site.description') }}">
    <meta name="keywords" content="{{ setting('site.keyword') }}">
    <meta name="author" content="{{ setting('site.title') }}">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
        rel="stylesheet">
    <link href="{{ asset('css4/') }}/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* width: 100%;
            height: 100%; */
            /* background: url('https://simo.bappedakaltim.com/storage/background_display/20210213_11_22_bapeda.JPG') no-repeat center center fixed; */
            background-size: cover;
        }

        .header-navbar {
            box-shadow: 0 2px 4px rgb(0 0 0 / 8%);
            /* background-color: rgba(0, 0, 0, 0.50) !important; */
            background: #2c3e50;
            transition: 300ms ease all;
            font-family: "Muli", Georgia, "Times New Roman", Times, serif;
            color: #ffffff;
        }

        .title-bappeda {
            font-weight: 800;
        }

        .carousel-item img {
            height: 300px;
            object-fit: initial;
        }
    </style>
</head>

<body>
    <header>
        <nav class="header-navbar navbar navbar-light">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <img src="{{ asset('storage/settings/September2020/akBHm4gYEq4pgdfOLIHQ.png') }}" height="40"
                        class="d-inline-block align-top" alt="">
                </div>
                <div class="p-2 h6 title-bappeda">
                    BAPPEDA<br>PROVINSI KALIMANTAN TIMUR
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <div class="p-2 h5 title-bappeda">
                    {{ $title }}
                </div>
            </div>
        </nav>
        {{-- <nav class="bidang-navbar navbar navbar-light">
            <div class="d-flex flex-row">
                <div class="p-2 h4">
                    {{ $title }}
                </div>
            </div>
        </nav> --}}
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-light" width="100%">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Agenda</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Pelaksana</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5"><b>{{ Myhelpers::tglind(date('Y-m-d')) }}</b></td>
                                </tr>
                                @foreach ($agenda as $valueagenda)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $valueagenda->caption }}
                                        </td>
                                        <td class="text-center">{{ $valueagenda->times }}</td>
                                        <td class="text-center">{{ $valueagenda->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="fixed-bottom p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 p-0 bg-dark">
                    <div class="text-white align-self-center justify-content-center">
                        <div class="font-medium-6 text-center" style="line-height: normal">{{ Myhelpers::tglind(date('Y-m-d')) }}</div>
                        <div class="text-center text-bold-700 font-medium-6" id="clock" onload="currentTime()"
                            style="line-height: normal"></div>
                    </div>
                </div>
                <div class="col-10 p-0 bg-info">
                    <div class="text-white text-center mt-2">
                        <marquee>Berhasil Membuat Perencanaan Berarti Merencanakan Keberhasilan | Bersikap Ramah, Sopan dan Santun dalam Memberikan Pelayanan | Memberikan Layanan dengan Cepat dan Akurat | Merespon dengan Cepat Terhadap Permintaan Pengguna Sesuai dengan Informasi yang Tersedia | Memberikan Kemudahan dalam Mendapatkan Data dan Informasi yang diperlukan</marquee>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Jquery Library-->
    <script src="{{ asset('') }}js4/jquery361.min.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="{{ asset('') }}js4/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel({
            interval: 10
        })

        function currentTime() {
            let date = new Date();
            let hh = date.getHours();
            let mm = date.getMinutes();
            let ss = date.getSeconds();
            let session = "AM";

            if (hh === 0) {
                hh = 12;
            }
            if (hh > 12) {
                hh = hh - 12;
                session = "PM";
            }

            hh = (hh < 10) ? "0" + hh : hh;
            mm = (mm < 10) ? "0" + mm : mm;
            ss = (ss < 10) ? "0" + ss : ss;

            let time = hh + ":" + mm + ":" + ss + " " + session;

            document.getElementById("clock").innerText = time;
            let t = setTimeout(function() {
                currentTime()
            }, 1000);
        }

        currentTime();
    </script>

</body>

</html>
