@extends('admin.layouts')

@section('css')
    <style>
        .info-box{
            margin-top: 15px;
            opacity: 0.9;
        }
    </style>
@stop

@section('title')
	<h1>
		Dasbor
		<small>Menampilkan data statistik pengguna</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box">
            <div class="box-header with-border">
                @if(auth()->user()->roles == 3)
                    Statistik Keseluruhan
                @else
                    Statistik {{auth()->user()->name}}
                @endif
                <!-- <span class="pull-right">
                    {{\Carbon\Carbon::now()->format('d-m-Y')}}
                    <span id="txt"></span>
                </span> -->
            </div>

            <div class="box-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if(auth()->user()->roles == 3)
                    <div class="col-md-6">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Artikel</span>
                                <span class="info-box-number">Artikel Terproses: {{$article_total - $unapproved_article}}</span>
                                <span class="progress-description">
                                    {{$unapproved_article}} artikel baru
                                </span>
                            </div>
                        </div>
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-stack-exchange"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Forum</span>
                                <span class="info-box-number">Forum Dibuka: {{$forum_total - $closed_forum}}</span>
                                <span class="progress-description">
                                    {{$closed_forum}} forum ditutup
                                </span>
                            </div>
                        </div>
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-sticky-note"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Umpan Balik</span>
                                <span class="info-box-number">Umpan Balik: {{$feedback_total}}</span>
                                <span class="progress-description">
                                    {{$bug_feedback}} diantaranya keluhan
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Pengguna</span>
                                <span class="info-box-number">Pengguna Aktif: {{$user_total - $blocked_user}}</span>
                                <span class="progress-description">
                                    {{$blocked_user}} lainnya diblokir
                                </span>
                            </div>
                        </div>
                        <div class="info-box bg-light-blue">
                            <span class="info-box-icon"><i class="fa fa-history"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Laporan</span>
                                <span class="info-box-number">Jumlah Laporan: {{$log_total}}</span>
                                <span class="progress-description">
                                    {{$closed_comment}} komentar ditutup
                                </span>
                            </div>
                        </div>
                        <div class="info-box bg-purple">
                            <span class="info-box-icon"><i class="fa fa-money"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 7.5px;">Langganan</span>
                                <span class="info-box-number">Jumlah Pengguna: {{$user_total}}</span>
                                <span class="progress-description">
                                    {{$sub}} pengguna berlangganan
                                </span>
                            </div>
                        </div>
                    </div>
                @elseif(auth()->user()->roles == 2)
                    <div class="col-md-4">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 17.5px;">Artikel</span>
                                <span class="info-box-number">Artikel Dibuat: {{App\Article::where('user_id', auth()->user()->id)->get()->count()}}</span>
                                <!-- <span class="progress-description">
                                    {{App\Article::where('user_id', auth()->user()->id)->where('status', 'Approved')->get()->count()}} artikel disetujui
                                </span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-comments"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 17.5px;">Jawaban</span>
                                <span class="info-box-number">Jawaban Dibuat: {{App\ForumComments::where('user_id', auth()->user()->id)->get()->count()}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><i class="fa fa-puzzle-piece"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 17.5px;">Total Poin</span>
                                <span class="info-box-number">Poin Aktivitas: {{auth()->user()->points}}</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><i class="fa fa-stack-exchange"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 17.5px;">Forum</span>
                                <span class="info-box-number">Forum Dibuat: {{App\Forum::where('user_id', auth()->user()->id)->get()->count()}}</span>
                                
                                <!-- <span class="progress-description">
                                    {{App\Article::where('user_id', auth()->user()->id)->where('status', 'Approved')->get()->count()}} artikel disetujui
                                </span> -->
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><i class="fa fa-comments"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="margin-top: 17.5px;">Komentar</span>
                                <span class="info-box-number">Komentar Dibuat: {{App\ForumComments::where('user_id', auth()->user()->id)->get()->count()}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if(count(auth()->user()->memberships) > 0 && auth()->user()->memberships->last()->expired > \Carbon\Carbon::now())
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="margin-top: 17.5px;">Status Akun</span>
                                    <span class="info-box-number">
                                        PREMIUM
                                    </span>
                                </div>
                            </div>
                        @else
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="margin-top: 17.5px;">Status Akun</span>
                                    <span class="info-box-number">
                                        REGULER
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        @if(auth()->user()->roles == 3)
            <div class="box" id="loginChart">
                <div class="box-header with-border">
                    Login Bulan {{\Carbon\Carbon::now()->format('F')}}
                </div>
                <div class="box-body" style="padding: 10px 20px;">
                    <h4 id="nan" class="text-center"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Memuat...</h4>
                    <canvas id="myChart" style="display: none;"></canvas>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script>
        var url = "{{route('loginApi')}}";
        var Label = new Array();
        var Logins = new Array();
        var ctx = document.getElementById("myChart").getContext('2d');

        $(document).ready(function(){
            $.get(url, function(response){
                if(!$.trim(response)) {
                    $('#nan').show();
                }
                
                $('#nan').hide();
                $('#myChart').show();

                Object.values(response[0].label).forEach(function(day) {
                    Label.push(day);
                });

                Object.values(response[0].logins).forEach(function(log) {
                    Logins.push(log);
                });

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Label,
                        datasets: 
                        [{
                            label: "Jumlah Login",
                            data: Logins,
                            backgroundColor: [
                            'rgba(26,188,156,0.5)',
                            ],
                            borderColor: [
                            'rgba(26,188,156)',
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        scaleShowValues: true,
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    autoSkip: false,
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 5,
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            display: true,
                        }
                    }
                });
            });
        });
	</script>
@stop
