@extends('layout.main')

@section('container')

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Reagen</h1>
          </div>

            <!-- nomor katalog -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Catalog Number</label>
                <input type="text" class="form-control" name="noCatalog" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->noCatalog }}" readonly>
            </div>
            <!-- nama reagen -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Reagen Name</label>
                <input type="text" class="form-control" name="nameReagen" id="exampleInputPassword1" value="{{ $data->nameReagen }}" readonly>
            </div>
            <!-- merk -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Merk</label>
                <input type="text" class="form-control" name="merk" id="exampleInputPassword1" value="{{ $data->merk }}" readonly>
            </div>
            <!-- Pack Size -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Pack Size</label>
                <input type="text" class="form-control" name="packSize" id="exampleInputPassword1" value="{{ $data->packSize }}" readonly>
            </div>

            <!-- Hazard Symbol -->
            <div class="custom-control custom-checkbox mb-3 row" id="checkboxContainer">
                <label for="exampleInputPassword1" class="form-label">Hazard Symbol</label><br>

                <!-- Toxic Symbol -->
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck1" name="hazardOptions[]" value="Toxic" {{ in_array('Toxic', $hazardOptions) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck1">
                        <img src="{{ asset('images/toxic.png') }}" alt="Gambar" width="100" height="100" class="customCheck1Image custom-control-image">
                    </label>
                </div>

                <!-- Corrosive Symbol -->
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck2" name="hazardOptions[]" value="Corrosive" {{ in_array('Corrosive', $hazardOptions) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck2">
                        <img src="{{ asset('images/corrosive.png') }}" alt="Gambar" width="100" height="100" class="customCheck2Image custom-control-image">
                    </label>
                </div>

                <!-- Explosive Symbol -->
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="custom-control-input custom-checkbox-input" id="customCheck3" name="hazardOptions[]" value="Explosive" {{ in_array('Explosive', $hazardOptions) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck3">
                        <img src="{{ asset('images/explosive.png') }}" alt="Gambar" width="100" height="100" class="customCheck3Image custom-control-image">
                    </label>
                </div>
            </div>


            <!-- MSDS -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">MSDS</label>
                <input type="text" class="form-control" name="msds" id="exampleInputPassword1" value="{{ $data->msds }}" readonly>
            </div>
            <!-- Price -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="exampleInputPassword1" value="{{ $data->price }}" readonly>
            </div>
            
            <!-- button untuk edit -->
            <a href="{{ route('data.edit', ['noCatalog' => $data->noCatalog]) }}">
                <button class="btn btn-primary">Edit</button>
            </a>

@endsection
