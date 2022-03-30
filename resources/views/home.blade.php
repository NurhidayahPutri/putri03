@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <article>
                        <h1>BIODATA DIRI</h1>
                    <form>
                        <fieldset>
                            <p> Nama                : Nurhidayah Putri</p>
                            <p> Nim                 : 190402070</p>
                            <p> Tempat/Tgl Lahir    : Pasir Pengaraian/ 03 November 2000</p>
                            <P> Alamat              : Pasie Putih Barat</P>
                            <P> Institut            : Universitas Muhammadiyah Riau
                            <p> Fakultas            : Ilmu Komputer</p>
                            <p> Program Studi       : Sistem Informasi</p>
                            </P>
                        </fieldset>
                    </form>
                    </article>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
