<html><head><style type="text/css">span.iconify, i.iconify, iconify-icon { display: inline-block; width: 1em; }</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>MBKM Eksternal | Politeknik Negeri Banyuwangi</title>
    <!-- Favicon -->
    <link rel="icon" href="https://sit.poliwangi.ac.id/favicon.png" type="image/png">
    <!-- Icons -->
    <link rel="stylesheet" href="https://sit.poliwangi.ac.id/argon/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="https://sit.poliwangi.ac.id/argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Iconify -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <!-- Argon CSS -->
    <link rel="stylesheet" href="https://sit.poliwangi.ac.id/argon/assets/css/argon.css?v=1.2.0" type="text/css">
    <script src="https://sit.poliwangi.ac.id/js/util.js"></script>
    <!-- Custom CSS -->
    <link href="https://sit.poliwangi.ac.id/css/halamanAwal.css" rel="stylesheet">

    <!-- localStorage sidebar -->
    <script>
        localStorage.setItem('sidenav-state', 'pinned')
    </script>
</head>

<body class="bg-default g-sidenav-hidden" style="min-height: 100vh;">
    <!-- Main content -->
    <div class="main-content halaman_awal login_page">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7">
            <div class="container">
                <div class="header-body text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-2">
                            <img src="https://sit.poliwangi.ac.id/images/logo.svg" class="logo" alt="Politeknik Negeri Banyuwangi">
                            <h1>Selamat Datang!</h1>
                            <p>Merdeka Belajar Kampus Merdeka (MBKM)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-7">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7">
                    <div class="card bg-secondary mt-4 border-0 mb-0">
                        <div class="card-body">
                            <div class="text-center mb-1">
                                <p>Silahkan klik login untuk masuk ke aplikasi</p>
                            </div>
                            
                            <form method="post">
                                <div class="text-center">
                                    <a href="#" type="submit" class="btn-login btn btn-primary w-100 my-4-5 rounded-sm">Login</a>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="https://sit.poliwangi.ac.id/argon/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://sit.poliwangi.ac.id/argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://sit.poliwangi.ac.id/argon/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="https://sit.poliwangi.ac.id/argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="https://sit.poliwangi.ac.id/argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="https://sit.poliwangi.ac.id/argon/assets/js/argon.js?v=1.2.0"></script>
    <script type="text/javascript">
        var url_api = "https://sit.poliwangi.ac.id/api/v1";
        
        $(function(){
            changeBtnLogin();
        })

        $('.select-user').on('change',function (e) {
            changeBtnLogin();
        })

        function changeBtnLogin() {
            if ($('.select-user').val() == "maba") {
                $('.btn-login-maba').attr('hidden',false)
                $('.btn-login').attr('hidden',true)
            }else{
                $('.btn-login-maba').attr('hidden',true)
                $('.btn-login').attr('hidden',false)
            }
        }
        $("#form").submit(function(e) {
            e.preventDefault();
            getGlobalData(1)

            //sementara untuk demo saja
            let demo = check_demo(e.target);
            if (demo) {
                window.location.href = demo;
                return;
            }
            // console.log('keliwat');
            // return;

            $.ajax({
                url: url_api + "/login",
                type: 'post',
                dataType: 'json',
                data: new FormData(e.target),
                processData: false,
                contentType: false,
                beforeSend: function(text) {},
                success: function(res) {
                    if (res.status == "success") {
                        localStorage.setItem('pmb', res.data)
                        window.location.href = "https://sit.poliwangi.ac.id/pmbgenerateva"
                    } else {
                        console.log(res.error)
                        alert('Error: ' + res.data.message)
                    }
                }
            });
        });

        //sementara untuk demo saja
        function check_demo(e) {
            let akses = document.getElementById('nodaftar').value;
            switch (akses) {
                case 'admin':
                    return "https://sit.poliwangi.ac.id/admin/dashboard";
                    break;

                case 'akademik':
                    return "https://sit.poliwangi.ac.id/akademik/dashboard";
                    break;

                case 'dosen':
                    return "https://sit.poliwangi.ac.id/dosen/dashboard";
                    break;

                case 'keuangan':
                    return "https://sit.poliwangi.ac.id/keuangan/dashboard";
                    break;

                case 'mahasiswabaru':
                    return "https://sit.poliwangi.ac.id/mahasiswabaru/dashboard";
                    break;

                case 'mahasiswalama':
                    return "https://sit.poliwangi.ac.id/mahasiswalama/dashboard";
                    break;

                case 'mahasiswa':
                    return "https://sit.poliwangi.ac.id/mahasiswa/dashboard";
                    break;

                default:
                    return false;
                    break;
            }
        }
        async function getGlobalData(id) {
            await $.ajax({
                url: url_api + "/globaldata/" + id,
                type: 'get',
                dataType: 'json',
                data: {},
                success: function(res) {
                    if (res.status == "success") {
                        // return res['data'];
                        localStorage.removeItem('globalData');
                        localStorage.setItem('globalData', JSON.stringify(res['data']));
                    } else {
                        // alert gagal
                    };
                }
            });
        }
    </script>


</body></html>