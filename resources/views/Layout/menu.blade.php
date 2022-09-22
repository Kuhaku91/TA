<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-0">
                @if(Auth()->user()->role=='admin')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Admin')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminAkun')}}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Akun</span></a></li> -->
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Akun</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('AdminAkun')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Admin </span></a></li>
                        <li class="sidebar-item"><a href="{{route('AdminAkunBk')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Guru Bk </span></a></li>
                        <li class="sidebar-item"><a href="{{route('AdminAkunGuru')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Guru </span></a></li>
                        <li class="sidebar-item"><a href="{{route('AdminAkunSiswa')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Siswa </span></a></li>
                        <li class="sidebar-item"><a href="{{route('AdminAkunWali')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Wali </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminPoint')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Point</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminKelas')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Kelas</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminGambar')}}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Gambar</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('AdminBatas')}}" aria-expanded="false"><i class=" fas fa-clipboard-list"></i><span class="hide-menu">Batas Point</span></a></li>
                
                @elseif(Auth()->user()->role=='bk')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Bk')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('BkKonseling')}}" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Konseling</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('BkPoint')}}" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Lapor</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('BkSP')}}" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Surat Peringatan</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('RekapSiswa')}}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Rekap Siswa</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('DataSiswa')}}" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Data Siswa</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('BkBatas')}}" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span class="hide-menu">Batas Point</span></a></li>

                @elseif(Auth()->user()->role=='guru')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Guru')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Lapor</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('GuruPointSiswa')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Siswa </span></a></li>
                        <li class="sidebar-item"><a href="{{route('GuruPointGuru')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Guru </span></a></li>
                        <li class="sidebar-item"><a href="{{route('GuruPointLapor')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Laporan </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('DataGuruPoint')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">PointKu</span></a></li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('GuruSP')}}" aria-expanded="false">
                        <i class="mdi mdi-relative-scale"></i>
                        <span class="hide-menu">
                            Surat Peringatan
                        </span>
                    </a>
                </li>
                @if(Auth()->user()->sp(Auth()->user()->id)=='ono')
                @endif

                @elseif(Auth()->user()->role=='siswa')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Siswa')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Lapor</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('SiswaPointSiswa')}}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Siswa </span></a></li>
                        <li class="sidebar-item"><a href="{{route('SiswaPointGuru')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Guru </span></a></li>
                        <li class="sidebar-item"><a href="{{route('SiswaPointLapor')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Laporan </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('DataSiswaPoint')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">PointKu</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('SiswaKonseling')}}" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Konseling</span></a></li>
                

                @elseif(Auth()->user()->role=='wali')
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('Wali')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('DataWaliPoint')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">PointKu</span></a></li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('WaliSP')}}" aria-expanded="false">
                        <i class="mdi mdi-relative-scale"></i>
                        <span class="hide-menu">
                            Surat Peringatan
                        </span>
                    </a>
                </li>
                @if(Auth()->user()->spwali(Auth()->user()->id)=='ono')
                @endif
                @endif
<!-- 
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Full Width</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                        <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-buttons.html" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                        <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                        <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                        <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                        <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                        <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                        <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                        <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                        <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>