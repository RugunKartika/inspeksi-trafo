<!DOCTYPE html>
<html>
<head>

    <title>Login Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card-login {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header-login {
            background: #0d6efd;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .card-body-login {
            padding: 30px;
            background: white;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-pln {
            width: 180px;
            max-width: 100%;
            display: inline-block;
        }
    </style>

</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow card-login">

                <div class="card-header card-header-login">
                    <h3 class="mb-0">LOGIN PETUGAS</h3>
                </div>

                <div class="card-body card-body-login">

                    <div class="logo-area">
                        <img src="{{ asset('images/logo-pln_es.png') }}" class="logo-pln" alt="Logo PLN ES">
                    </div>

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="/login-petugas" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>NIP</label>
                            <input type="text"
                                   name="nip"
                                   class="form-control"
                                   required>
                        </div>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>