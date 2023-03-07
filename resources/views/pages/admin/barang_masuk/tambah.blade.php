@extends('layout.admin')

@section('content')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>
                                Form Tambah Data Barang Masuk</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <form action="/admin/barang_masuk/store" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama - Varian - Stok Barang</label>
                        <select class="form-control" required name="id_barang">
                            <option value="">Pilih Data</option>
                            @foreach ($kode as $position)
                            <option value="{{ $position->ID_Barang }}">
                                {{ $position->Nama }} - {{ $position->Varian }} - {{ $position->Stok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang Masuk</label>
                        <input type="number" min="1" class="form-control" name="jumlah_barang_masuk" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Barang Masuk</label>
                        <input type="date" class="form-control" name="tanggal_barang_masuk" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Copyright © <script>
            document.write(new Date().getFullYear())
            </script>
        </div>
    </div>
</div>
@endsection