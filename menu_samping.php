<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
           
            <div class="scroll-sidebar ps-container ps-theme-default ps-active-y" data-ps-id="b74e6591-ea79-7174-618c-f151e35dc5c4">
                
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item"> <!-- Menu Home -->
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="?page=beranda" aria-expanded="false"><i class="mdi mr-2 mdi-home"></i><span
                                    class="hide-menu">Beranda</span></a>
                        </li>
                        
                        <li class="sidebar-item "><!-- Menu Alternatif -->
                            <a  class="<?php if ($_GET['page']=='alternatif') {echo "active ";}?>sidebar-link waves-effect waves-dark sidebar-link" href="?page=alternatif" aria-expanded="false"><i class="mdi mr-2 mdi-human-male-female"></i><span class="hide-menu">Data Calon</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a class="<?php if ($_GET['page']=="kriteria"||$_GET['page']=='subkriteria') {echo "active ";}?>sidebar-link waves-effect waves-dark sidebar-link" href="?page=kriteria" aria-expanded="false"><i class="fas mr-2 fa-balance-scale"></i><span class="hide-menu">Kriteria Dan Bobot</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item"> <a class="<?php if ($_GET["page"]=="penilaian"||$_GET["page"]=="Penilaian" ) {echo "active ";}?>sidebar-link waves-effect waves-dark sidebar-link"
                                href="?page=penilaian" aria-expanded="false"><i class="mdi mr-2 mdi-thumbs-up-down"></i><span
                                    class="hide-menu">Proses Penilaian</span></a></li>

                        <li class="sidebar-item"> <a class="<?php if ($_GET["page"]=="penentuan"||$_GET["page"]=="Penentuan" ) {echo "active ";}?>sidebar-link waves-effect waves-dark sidebar-link"
                                href="?page=penentuan" aria-expanded="false"><i class="mdi mr-2 mdi-human-handsup"></i><span
                                    class="hide-menu">Penentuan</span></a></li>                        
                        
                       
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                                class="ti-settings"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                                class="mdi mdi-gmail"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="page/user/logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                                class="mdi mdi-power"></i></a>
                    </div>
                </div>
            </div>
        </aside>