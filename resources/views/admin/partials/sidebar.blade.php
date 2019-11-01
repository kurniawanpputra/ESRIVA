<aside class="main-sidebar">
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img @if(auth()->user()->avatar == NULL) src="{{asset('lte/dist/img/default.png')}}" @else src="{{asset(auth()->user()->avatar)}}" @endif 
                     class="img-circle">
            </div>
            <div class="pull-left info">
                {{-- <p style="margin-top: 12.5px;">{{auth()->user()->name}}</p> --}}
                
                <p>{{auth()->user()->name}}</p>
                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">
                NAVIGASI UTAMA

                @if(count(auth()->user()->memberships) > 0 && auth()->user()->memberships->last()->expired > \Carbon\Carbon::now())
                    <span class="btn btn-xs btn-warning pull-right" style="font-size: 7px; margin-top: 2.5px;">PREMIUM</span>
                @endif
            </li> -->
            <li @if(Request::is('home')) class="active" @endif>
                <a href="{{route('home')}}"><i class="fa fa-bar-chart"></i>
                    <span>Dasbor</span>
                </a>
            </li>

            <!-- <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Submenu 1
                            <span class="pull-right-container">
                                <small class="label pull-right btn-danger">12</small>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index2.html">
                            <i class="fa fa-circle-o"></i> Submenu 2
                            <span class="pull-right-container">
                                <small class="label pull-right btn-warning">12</small>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index2.html">
                            <i class="fa fa-circle-o"></i> Submenu 3
                            <span class="pull-right-container">
                                <small class="label pull-right btn-success">12</small>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index2.html">
                            <i class="fa fa-circle-o"></i> Submenu 4
                            <span class="pull-right-container">
                                <small class="label pull-right btn-primary">12</small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li> -->

            @if(auth()->user()->roles != 1)
                <li class="treeview @if(Request::is('articles/create','articles/list','articles/trashed','articles/categories/list')) active @endif">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Artikel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(auth()->user()->roles == 2)
                            <li>
                                <a href="{{route('articles.create')}}">
                                    <i class="fa fa-circle-o"></i> Buat Artikel
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('articles.list')}}">
                                <i class="fa fa-circle-o"></i> Daftar Artikel
                                @if(auth()->user()->roles == 3)
                                    <span class="pull-right-container">
                                        <small class="label pull-right btn-warning">
                                            {{App\Article::where('status', "Unapproved")->get()->count()}}
                                        </small>
                                    </span>
                                @endif
                            </a>
                        </li>
                        @if(auth()->user()->roles == 3)
                            <li>
                                <a href="{{route('articles.trashed')}}">
                                    <i class="fa fa-circle-o"></i> Sampah Artikel
                                    @if(auth()->user()->roles == 3)
                                    <span class="pull-right-container">
                                        <small class="label pull-right btn-danger">
                                            {{App\Article::where('deleted_at', '!=', NULL)->get()->count()}}
                                        </small>
                                    </span>
                                @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{route('categories.list')}}">
                                    <i class="fa fa-circle-o"></i> Kategori Artikel
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @else
                <li class="treeview @if(Request::is('articles/list','articles/list/my-favorite')) active @endif">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Artikel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('articles.list')}}">
                                <i class="fa fa-circle-o"></i> Daftar Artikel
                            </a>
                        </li>
                        <li>
                            <a href="{{route('articles.list-fav')}}">
                                <i class="fa fa-circle-o"></i> Artikel Favorit
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(auth()->user()->roles == 1)
                <li class="treeview @if(Request::is('forums/list','forums/create')) active @endif">
                    <a href="#">
                        <i class="fa fa-stack-exchange"></i> <span>Forum</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('forum.create')}}">
                                <i class="fa fa-circle-o"></i> Buat Forum
                            </a>
                        </li>
                        <li>
                            <a href="{{route('forum.list')}}">
                                <i class="fa fa-circle-o"></i> Daftar Forum
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li @if(Request::is('forums/list')) class="active" @endif>
                    <a href="{{route('forum.list')}}"><i class="fa fa-stack-exchange"></i>
                        <span>Daftar Forum</span>
                    </a>
                </li>
            @endif

            {{-- @php
                $data = App\Feedback::OrderBy('created_at', 'desc')->first();
                if($data != NULL) {
                    $diff = 60*30;
                    $new = 0;

                    if(strtotime(\Carbon\Carbon::now()) - strtotime($data->created_at) < $diff) {
                        $new = 1;
                    }
                }
            @endphp
            
            <li>
                <a href="{{route('feedback.list')}}"><i class="fa fa-sticky-note"></i>
                    <span>Umpan Balik</span>

                    @if($new == 1)
                        <span class="pull-right-container">
                            <small class="label pull-right btn-success">new</small>
                        </span>
                    @endif
                </a>
            </li> --}}

            @if(auth()->user()->roles == 2)
                <li @if(Request::is('activity/log')) class="active" @endif>
                    <a href="{{route('psikolog.activity')}}"><i class="fa fa-area-chart"></i>
                        <span>Riwayat Aktivitas</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->roles == 3)
                <li @if(Request::is('feedback-management/list')) class="active" @endif>
                    <a href="{{route('feedback.list')}}"><i class="fa fa-sticky-note"></i>
                        <span>Umpan Balik</span>
                    </a>
                </li>
            @else
                <li @if(Request::is('feedback/create')) class="active" @endif>
                    <a href="{{route('feedback.create')}}"><i class="fa fa-sticky-note"></i>
                        <span>Buat Umpan Balik</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->roles == 2)
                <li @if(Request::is('claim/log')) class="active" @endif>
                    <a href="{{route('psikolog.myClaim')}}"><i class="fa fa-history"></i>
                        <span>Riwayat Klaim Poin</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->roles == 3)
                <li @if(Request::is('user-management/list/psikolog')) class="active" @endif>
                    <a href="{{route('psikolog.list')}}"><i class="fa fa-user-secret"></i>
                        <span>Atur Psikolog</span>
                    </a>
                </li>
                <li @if(Request::is('user-management/list')) class="active" @endif>
                    <a href="{{route('user.list')}}"><i class="fa fa-users"></i>
                        <span>Atur Pengguna</span>
                    </a>
                </li>
                <li @if(Request::is('activity/psikolog/log')) class="active" @endif>
                    <a href="{{route('psikolog.allActivity')}}"><i class="fa fa-area-chart"></i>
                        <span>Aktivitas Psikolog</span>
                    </a>
                </li>
                <li @if(Request::is('report-log')) class="active" @endif>
                    <a href="{{route('report.index')}}"><i class="fa fa-book"></i>
                        <span>Laporan Komentar</span>
                    </a>
                </li>
                <li @if(Request::is('all-claim/log')) class="active" @endif>
                    <a href="{{route('psikolog.claimLog')}}"><i class="fa fa-history"></i>
                        <span>Riwayat Klaim Poin</span>
                    </a>
                </li>
            @endif

            @if(auth()->user()->roles == 1)
                <li @if(Request::is('articles/subscribe')) class="active" @endif>
                    <a href="{{route('articles.subscribe')}}"><i class="fa fa-money"></i>
                        <span>Daftar Berlangganan</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
</aside>
