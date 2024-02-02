<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/plugins/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.bootstrap4.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.partials.header')

        @include('layouts.partials.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')

        </div>
  
        @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

    <script>
        
        $(document).ready(function() {




         var titulo = "Reportes";
            var titulo = 'Reporte'
            flatpickr(".date", {
                "locale": "es",
                dateFormat: "d/m/Y",
            });

            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                
                columnDefs: [{
                orderable: false,
                searchable: false,
                targets: -1,
                defaultContent: '',
                responsivePriority: 1
                }],
                dom: 'lBfrtip<"actions">',
                "buttons": [{
                        extend: 'copy',
                        title: 'Reporte',
                        text: 'Copiar',
                        exportOptions: {
                   columns: ':not(:last-child)'
               }
                    },
                    {
                        extend: 'csv',
                        title: 'Reporte',
                        text: 'CSV',
                        exportOptions: {
                   columns: ':not(:last-child)'
               }
                    },
                    {
                        extend: 'excel',
                        title: 'Reporte',
                        text: 'Excel',
                        exportOptions: {
                   columns: ':not(:last-child)'
               }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: titulo,
                        orientation: 'landscape',
                        exportOptions: {
                   columns: ':not(:last-child)'
               }
                    },
                    {
                        extend: 'colvis',
                        text: 'Visibilidad de Columnas',
                    },
                ]
            })

            $('.select2').select2();
        })
           // Obtener la URL de la página actual
var url = window.location.href;

// Obtener todos los enlaces del menu
var links = document.querySelectorAll(".menu-link");

// Recorrer los enlaces y compararlos con la URL
for (var i = 0; i < links.length; i++) {
  // Si el enlace coincide con la URL, agregar la clase active
  if (links[i].href == url) {
    links[i].classList.add("active");
  }
  // Si no, quitar la clase active
  else {
    links[i].classList.remove("active");
  }
}


            var cleave = new Cleave('#phone', {
      blocks: [4, 4],
      delimiter: '-'
    });
    </script>

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>