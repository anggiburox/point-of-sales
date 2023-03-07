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
                                Form Perbaharui Data Profile</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @foreach($profile as $p)
                <form action="/admin/profile/editprofile" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $p->ID_User}}">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{$p->Nama}}" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{$p->Username}}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" name="password" id="password" required
                                value="{{ $p->Password}}">
                            <div class="input-group-prepend">
                                <div class="input-group-text" onclick="showPassword()">Show Password
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection