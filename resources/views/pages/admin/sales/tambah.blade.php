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
                                Form Tambah Data Barang Sales</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                <form action="/admin/sales/store" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kode Sales</label>
                        <input type="text" class="form-control" name="id_sales" value="{{$kode}}" readonly>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>Nama Seller</label>
                            <select class="form-control" required name="id_customer">
                                <option value="">Pilih Data</option>
                                @foreach ($customer as $position)
                                <option value="{{ $position->ID_Customer }}">
                                    {{ $position->Nama_Customer }}
                                    @endforeach
                            </select>
                        </div>
                        <div class="col form-group">
                            <label>Nama - Varian - Stok - Harga Satuan Barang</label>
                            <select class="form-control" required name="id_barang" id="select-barang">
                                <option value="">Pilih Data</option>
                                @foreach ($barang as $position)
                                <option value="{{ $position->ID_Barang }}" data-harga="{{ $position->Harga }}">
                                    {{ $position->Nama }} - {{ $position->Varian }} - {{ $position->Stok }} -
                                    {{ $position->Harga }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>QTY</label>
                            <input type="number" min="1" class="form-control" name="qty" id="qty" required>
                        </div>
                        <div class="col form-group">
                            <label>Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="harga" required readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label>Metode Pembayaran</label>
                            <div class="row">
                                <div class="col custom-control custom-radio">
                                    <input type="radio" id="Tunai" name="metode" class="custom-control-input"
                                        value="Tunai" required>
                                    <label class="custom-control-label" for="Tunai">Tunai</label>
                                </div>
                                <div class="col custom-control custom-radio">
                                    <input type="radio" id="Non Tunai" name="metode" class="custom-control-input"
                                        value="Non Tunai" required>
                                    <label class="custom-control-label" for="Non Tunai">Non Tunai</label>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="tanggal_transaksi" required>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#select-barang').on('change', function() {
        var hargaString = $(this).find(':selected').data('harga');
        if (!hargaString) {
            hargaString = "Rp.0";
        }
        var harga = parseInt(hargaString.replace("Rp.", "").replace(".", ""), 10);
        $('#total_harga').val("Rp.0");

        $('#qty').on('input', function() {
            var qty = $(this).val();
            if (!qty) {
                qty = 0;
            }
            var total = harga * qty;
            $('#total_harga').val("Rp." + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                "."));
        });
    });
});
</script>

@endsection