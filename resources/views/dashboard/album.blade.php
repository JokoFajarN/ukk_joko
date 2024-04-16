<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Album</title>
    <link rel="stylesheet" href="{{ asset('assets/css/album.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1 class="title_album">Tambah Album</h1>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('album.post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="namaAlbum" class="form-label">Nama Album</label>
                        <input class="form-control" type="text" id="namaAlbum" name="namaAlbum" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input class="form-control" type="text" id="deskripsi" name="deskripsi" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
