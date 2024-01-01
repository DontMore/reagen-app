@extends('layout.main')

@section('container')
<div class="container">
        <h2>Add Stock Reagen</h2>
        <form action="/add-stock-reagen" method="POST">
            @csrf
            <!-- Nomor Katalog -->
            <div class="form-group">
                <label for="nomorKatalog">Nomor Katalog</label>
                <select class="form-control" id="nomorKatalog" name="noCatalog">
                    <option value="" selected>Pilih Reagen</option>
                    @foreach($reagens as $reagen)
                        <option value="{{ $reagen->noCatalog }}">{{ $reagen->noCatalog }} - {{ $reagen->nameReagen }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Reagen -->
            <div class="form-group">
                <label for="namaReagen">Nama Reagen</label>
                <input type="text" class="form-control" id="namaReagen" readonly>
            </div>

            <!-- Merk -->
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" class="form-control" id="merk" readonly>
            </div>

             <!-- Nomor Batch -->
             <div class="form-group">
                <label for="merk">Nomor Batch</label>
                <input type="text" class="form-control" id="batch" name="batch">
            </div>

            <!-- Jumlah -->
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="quantity" class="form-control" id="jumlah">
            </div>

            <!-- Tanggal Kadaluarsa -->
            <div class="form-group">
                <label for="tanggalKadaluarsa">Tanggal Kadaluarsa</label>
                <input type="date" name="expiredDate" class="form-control" id="tanggalKadaluarsa">
            </div>

            <!-- Catatan -->
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="note" id="catatan" rows="3"></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function(){
            $('#nomorKatalog').on('change', function(){
                var noCatalogUtama = $(this).val();
                if(noCatalogUtama) {
                    $.ajax({
                        url: '/reagen/'+noCatalogUtama,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('#namaReagen').val(data.nameReagen);
                            $('#merk').val(data.merk);
                        }
                    });
                } else {
                    $('#namaReagen').val('');
                    $('#merk').val('');
                }
            });
        });
    </script>

@endsection