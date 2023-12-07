@extends('layout.main')

@section('container')

<style>
    .custom-control-image {
        cursor: pointer; /* Menjadikan kursor berubah saat diarahkan ke gambar */
    }

    .checked-background {
        background-color: blue; /* Warna latar belakang saat checkbox dicentang */
    }
</style>


          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Reagen</h1>
          </div>

        <form>
            <!-- nomor katalog -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Catalog Number</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <!-- nama reagen -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Reagen Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- merk -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Merk</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Pack Size -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Pack Size</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Hazard Symbol -->
            <div class="custom-control custom-checkbox mb-3" id="checkboxContainer">
                <label for="exampleInputPassword1" class="form-label">Hazard Symbol</label><br>

                <!-- Toxic Symbol -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">
                        <input type="hidden" id="customCheck1Hidden" name="customCheck1" class="form-control" value="0">
                        <img src="{{ asset('images/toxic.png') }}" alt="Gambar" width="100" height="100" class="customCheck1Image custom-control-image">
                    </label>
                </div>

                <!-- Corrosive Symbol -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">
                        <input type="hidden" id="customCheck2Hidden" name="customCheck2" class="form-control" value="0">
                        <img src="{{ asset('images/corrosive.png') }}" alt="Gambar" width="100" height="100" class="customCheck2Image custom-control-image">
                    </label>
                </div>

                <!-- Explosive Symbol -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">
                        <input type="hidden" id="customCheck3Hidden" name="customCheck3" class="form-control" value="0">
                        <img src="{{ asset('images/explosive.png') }}" alt="Gambar" width="100" height="100" class="customCheck3Image custom-control-image">
                    </label>
                </div>
            </div>

            <!-- MSDS -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">MSDS</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- Price -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          

<script>
    $(document).ready(function () {
        // Gunakan kelas bersama untuk mengidentifikasi semua checkbox
        $('.custom-checkbox-input').on('change', function () {
            // Mendapatkan ID dan elemen gambar terkait
            var checkboxId = $(this).attr('id');
            var imageElement = $('#' + checkboxId.replace('customCheck', 'customCheck') + 'Image');

            // Mengubah warna hanya pada checkbox yang dicentang
            if ($(this).prop('checked')) {
                // Tambahkan kelas untuk warna latar belakang saat checkbox dicentang
                imageElement.addClass('checked-background');
            } else {
                // Hapus kelas untuk mengembalikan warna latar belakang ke kondisi awal
                imageElement.removeClass('checked-background');
            }
        });
    });
</script>

@endsection
