<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ asset('/') }}">
    <title>Document</title>

    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href={{ asset('css/vendors.bundle.css') }}>
    <link rel="stylesheet" media="screen, print" href={{ asset('css/app.bundle.css') }}>
    <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->

    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('img/favicon/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('img/favicon/favicon-32x32.png') }}>
    <link rel="mask-icon" href={{ asset('img/favicon/safari-pinned-tab.svg') }} color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href={{ asset('css/datagrid/datatables/datatables.bundle.css') }}>
    <link rel="stylesheet" media="screen, print" href={{ asset('css/fa-solid.css') }}>

</head>
<body class="mod-bg-1">
<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">
    <div class="page-inner">
        <div class="page-content-wrapper">
            <div class="col">
                <div id="panel-5" class="panel">
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="demo">
                                <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">

                                    <a class="navbar-brand d-flex align-items-center fw-500" href="{{ route('home') }}">
                                        <img src="img/logo.png" class="d-inline-block align-top mr-2" alt="logo">
                                        SmartAdmin
                                    </a>

                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarColor02"
                                            aria-controls="navbarColor02" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>


                                    <div class="collapse navbar-collapse" id="navbarColor02">
                                        <ul class="navbar-nav mr-auto">

                                            @guest
                                            @else

                                                @if(auth()->user()->role == 'user')
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('server.create') }}">Sunucu
                                                            Talep</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('post.create') }}">Kullanici
                                                            Talep</a>
                                                    </li>

                                                @elseif(auth()->user()->role == 'admin')
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('server.index') }}">Sunucu
                                                            Talep
                                                            Liste</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('post.index') }}">Kullanici
                                                            Talep
                                                            Liste</a>
                                                    </li>
                                                @endif
                                            @endguest
                                        </ul>


                                        @guest
                                            @if (Route::has('login'))
                                                <a class="d-flex align-items-center justify-content-center ml-2"
                                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                                            @endif

                                            @if (Route::has('register'))
                                                <a class="-flex align-items-center justify-content-center ml-2"
                                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                                            @endif

                                        @else

                                            <a href="#" data-toggle="dropdown"
                                               class="header-icon d-flex align-items-center justify-content-center ml-2">


                                                <img src="img/demo/avatars/avatar-admin.png"
                                                     class="profile-image rounded-circle"
                                                     style=""
                                                     alt="Dr. Codex Lantern">

                                            </a>


                                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                                <div
                                                    class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                                    <div
                                                        class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                                                             <span class="mr-2"><img
                                                                                     src="img/demo/avatars/avatar-admin.png"
                                                                                     class="rounded-circle profile-image"
                                                                                     alt="{{ auth()->user()->name }}"></span>
                                                        <div class="info-card-text">
                                                            <div
                                                                class="fs-lg text-truncate text-truncate-lg">{{ auth()->user()->name }}
                                                                - {{ auth()->user()->role }}</div>
                                                            <span
                                                                class="text-truncate text-truncate-md opacity-80">{{ auth()->user()->email }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(auth()->user()->role == 'user')
                                                    <div class="dropdown-divider m-0"></div>

                                                    <a href="{{ route('post.create') }}" class="dropdown-item">
                                                        Kullanici Taleplerim
                                                    </a>

                                                    <div class="dropdown-divider m-0"></div>

                                                    <a href="{{ route('server.create') }}" class="dropdown-item">
                                                        Sunucu Taleplerim
                                                    </a>

                                                @endif

                                                <div class="dropdown-divider m-0"></div>

                                                <a href="#" class="dropdown-item" data-toggle="modal">
                                                    Profil Bilgileri
                                                </a>

                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cikis Yap
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}"
                                                      method="POST"
                                                      class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endguest
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<!-- base vendor bundle:
            DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
                       + pace.js (recommended)
                       + jquery.js (core)
                       + jquery-ui-cust.js (core)
                       + popper.js (core)
                       + bootstrap.js (core)
                       + slimscroll.js (extension)
                       + app.navigation.js (core)
                       + ba-throttle-debounce.js (core)
                       + waves.js (extension)
                       + smartpanels.js (extension)
                       + src/../jquery-snippets.js (core) -->
<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>
<!-- datatble responsive bundle contains:
+ jquery.dataTables.js
+ dataTables.bootstrap4.js
+ dataTables.autofill.js
+ dataTables.buttons.js
+ buttons.bootstrap4.js
+ buttons.html5.js
+ buttons.print.js
+ buttons.colVis.js
+ dataTables.colreorder.js
+ dataTables.fixedcolumns.js
+ dataTables.fixedheader.js
+ dataTables.keytable.js
+ dataTables.responsive.js
+ dataTables.rowgroup.js
+ dataTables.rowreorder.js
+ dataTables.scroller.js
+ dataTables.select.js
+ datatables.styles.app.js
+ datatables.styles.buttons.app.js -->
<script src="js/datagrid/datatables/datatables.bundle.js"></script>
<!-- datatbles buttons bundle contains:
+ "jszip.js",
+ "pdfmake.js",
+ "vfs_fonts.js"
NOTE: 	The file size is pretty big, but you can always use the
    build.json file to deselect any components you do not need under "export" -->
<script src="js/datagrid/datatables/datatables.export.js"></script>
<script>
    $(document).ready(function () {

        // initialize datatable
        $('#dt-basic-example').dataTable(
            {
                responsive: true,
                lengthChange: false,
                dom:
                /*	--- Layout Structure
                    --- Options
                    l	-	length changing input control
                    f	-	filtering input
                    t	-	The table!
                    i	-	Table information summary
                    p	-	pagination control
                    r	-	processing display element
                    B	-	buttons
                    R	-	ColReorder
                    S	-	Select

                    --- Markup
                    < and >				- div element
                    <"class" and >		- div with a class
                    <"#id" and >		- div with an ID
                    <"#id.class" and >	- div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                    "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    /*{
                        extend:    'colvis',
                        text:      'Column Visibility',
                        titleAttr: 'Col visibility',
                        className: 'mr-sm-3'
                    },*/
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        titleAttr: 'Generate PDF',
                        className: 'btn-outline-danger btn-sm mr-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        titleAttr: 'Generate Excel',
                        className: 'btn-outline-success btn-sm mr-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-primary btn-sm'
                    }
                ]
            });

    });

</script>

</body>
</html>
