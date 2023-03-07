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
                                Form Perbaharui Data Saller</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                @foreach($pgw as $p)
                <form action="/admin/customer/update" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kode Saller</label>
                        <input type="text" class="form-control" name="id_customer" value="{{$p->ID_Customer}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Saller</label>
                        <input type="text" class="form-control" name="nama_customer" value="{{$p->Nama_Customer}}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required>{{$p->Alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" min="0" class="form-control" name="no_telepon" value="{{$p->No_Telepon}}"
                            required>
                    </div>
                    <a href="/admin/customer" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                @endforeach
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