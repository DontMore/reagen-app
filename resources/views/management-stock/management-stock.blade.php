@extends('layout.main')

@section('container')

      <!-- Judul halaman  -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Management Stock</h1>
      </div>

      <!-- Tombol add reagen dan search -->
      <div class="row">
        <!-- tombol add reagan -->
        <div class="col-md-2">
          <a href="/add-reagen"><button type="button" class="btn btn-success">Tambahkan</button></a>
        </div>

        <!-- search -->
        <div class="mb-3 col-md-10">
          <!-- Form input Search -->
          <form action="{{ route('management-stock') }}" method="GET">
                <input type="text" name="keyword" class="form-control" placeholder="Cari...">
                <button type="submit">Cari</button>
            </form>
        </div>
      </div>
          
      <div class="row mb-3">
        <div class="col">
          Catalog Number
        </div>

        <div class="col">
          Reagen Name
        </div>

        <div class="col">
          Merk
        </div>

        <div class="col">
          Amount
        </div>

        <div class="col">
        </div>
      </div>
      <!-- perulangan -->
          @foreach($reagens as $item)
      <div class="row mb-3">
            <div class="col">
              {{ $item->noCatalog }}
            </div>

            <div class="col">
            {{ $item->nameReagen }}
            </div>

            <div class="col">
            {{ $item->merk }}
            </div>

            <div class="col">
            {{ $item->totalStock }}
            </div>

            <div class="col">
              <div class="row">
                  <a href="{{ route('data.view', ['noCatalog' => $item->noCatalog]) }}">view</a> |
                  <a href="/add-stock-reagen">add</a> |
                  <a href="{{ route('data.edit', ['noCatalog' => $item->noCatalog]) }}">edit</a>
                  <form action="{{ route('data.delete', ['noCatalog' => $item->noCatalog]) }}" method="POST">
                        @csrf
                        <button type="submit">Delete</button>
                  </form>
              </div>
            </div>
      </div>
          @endforeach

@endsection
