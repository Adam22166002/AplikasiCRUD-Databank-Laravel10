<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/kelompok-9.jpg') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
.typing-text {
        font-family: Arial, sans-serif;
        white-space: nowrap;
        overflow: hidden;
        border-right: .15em solid orange;
        animation: blink-caret .75s step-end infinite;
    }

    @keyframes blink-caret {
        from, to {
            border-color: transparent;
        }
        50% {
            border-color: white;
        }
    }
    </style>
<body>

<div class="row">
    <div class="col">
        <nav class="navbar bg-secondary border-bottom border-body mb-3 justify-content-end" data-bs-theme="dark" data-aos="fade-down"
            data-aos-duration="3000">
            <div class="container-fluid">
                <h5 class="navbar-brand typing-text"> <i class="bi bi-person-plus"></i>
                    Aplikasi Data Bank - Kelompok 9 </h5>
            </div>
        </nav>
    </div>
</div>



    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.table').DataTable();

            function validateInput(inputElement, textElement) {
                if (inputElement.hasClass('is-invalid')) {
                    inputElement.on('input', function() {
                        if (inputElement.val() !== "") {
                            inputElement.removeClass('is-invalid');
                            inputElement.addClass('is-valid');
                            textElement.css('display', 'none');
                        } else {
                            inputElement.removeClass('is-valid');
                            inputElement.addClass('is-invalid');
                            textElement.css('display', 'block');
                        }
                    });
                }
            }
                validateInput($('.kode_bank'), $('.textKodeBank'));
                validateInput($('.nama_bank'), $('.textNamaBank'));
                validateInput($('.alamat'), $('.textAlamat'));
                validateInput($('.kota'), $('.textKota'));
                validateInput($('.provinsi'), $('.textProvinsi'));
                validateInput($('.kode_pos'), $('.textKodePos'));
                validateInput($('.nomor_telepon'), $('.textNomerTelepon'));
                validateInput($('.email'), $('.textEmail'));
                validateInput($('.deskripsi'), $('.textDeskripsi'));
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const element = document.querySelector('.typing-text');
        const text = " Aplikasi Data Bank - Kelompok 9 ";
        let index = 0;
        let isDeleting = false;

        function typeText() {
            element.innerHTML = '<i class="bi bi-person-plus"></i>' + text.substring(0, index);
            
            if (!isDeleting && index < text.length) {
                index++;
                setTimeout(typeText, 50);
            } else if (isDeleting && index > 0) {
                index--;
                setTimeout(typeText, 50);
            } else {
                isDeleting = !isDeleting;
                setTimeout(typeText, 50);
            }
        }

        typeText();
    });
</script>
</body>

</html>