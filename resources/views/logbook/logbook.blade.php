@extends('layout.main')

@section('container')

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Logbook</h1>

            <!-- Form input Search -->
            <form action="{{ route('logbook.index') }}" method="GET">
                <input type="text" name="keyword" placeholder="Cari...">
                <button type="submit">Cari</button>
            </form>

          </div>

          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nomor Katalog</th>
                      <th scope="col">Nama Reagen</th>
                      <th scope="col">Merk</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($reagens as $index => $reagen)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $reagen->noCatalog }}</td>
                      <td>{{ $reagen->nameReagen }}</td>
                      <td>{{ $reagen->merk }}</td>
                      <td>{{ $reagen->totalStock }}</td>
                      <td>
                          <a href="#" class="btn btn-primary btn-sm">Take</a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>

@endsection
