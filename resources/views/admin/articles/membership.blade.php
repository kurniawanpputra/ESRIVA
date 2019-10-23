@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        .additional-margin{
            margin-top: 10px;
        }
        @media only screen and (min-width: 992px) {
            .additional-margin{
                margin-top: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">
                Daftar Berlangganan
            </div>
            <div class="box-body" style="padding: 20px;">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default panel-body" style="margin-bottom: 0;">
                                <p class="text-bold" style="margin-top: 5px;">Manfaat Berlangganan:</p>
                                <p>1. Membaca artikel lebih dari 6 kali untuk satu bulan.</p>
                                <p>2. Forum pengguna premium menjadi prioritas psikolog untuk dijawab.</p>
                                </br>

                                <!-- BATAS MANFAAT DAN CARA DAFTAR -->

                                <p class="text-bold">Cara Mendaftar:</p>
                                <p>1. Lakukan pembayaran melalui <b>Bank BCA</b> sebesar Rp50.000,00.
                                    </br>(Nomor Rekening: 123654666 - a.n. PT. ESRIVA).
                                </p>
                                <p>2. Kirim foto bukti pembayaran ke 08123654987
                                    </br>(Gambar dikirim melalui <b>WhatsApp</b>)
                                </p>
                                <p>3. Pembayaran akan dikonfirmasi oleh admin dalam waktu 1x24 jam.</p>
                                <p>4. Sesudah dikonfirmasi, akan mucul logo premium dibawah nama anda.</p>
                                <p style="margin-bottom: 5px;">5. Fitur premium sudah aktif dan anda dapat membaca
                                    </br>artikel lebih dari 6 kali untuk satu bulan kedepan.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 additional-margin">
                            <div class="panel panel-default panel-body" style="margin-bottom: 0;">
                                @if(count(auth()->user()->memberships) > 0 && auth()->user()->memberships->last()->expired > \Carbon\Carbon::now())
                                    <p class="btn btn-warning" style="margin-bottom: 10px; margin-top: 143px; width: 100px;">PREMIUM</p>
                                    <p style="margin-bottom: 143px;">Sisa fitur premium: <b>{{\Carbon\Carbon::parse(auth()->user()->memberships->last()->expired)->diffInDays(\Carbon\Carbon::now())}} hari</b></p>
                                @else
                                    <p class="btn btn-default" style="margin-bottom: 10px; margin-top: 143px; width: 100px;">REGULER</p>
                                    <p style="margin-bottom: 143px;">Sisa jumlah membaca: <b>{{6 - auth()->user()->article_read}} kali</b></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
