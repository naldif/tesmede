<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Annex</a>
                    <!-- <a href="index.html" class="logo"><img src="<?= base_url('themes') ?>/assetsimages/logo.png" height="24" alt="logo"></a> -->
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li class="<?= ($active_menu == 'komoditas') ? 'has-submenu' : ''  ?>">
                            <a href="<?= site_url('komoditas') ?>" class="waves-effect">
                                <i class="mdi mdi-airplay"></i>
                                <span> Komoditas</span>
                            </a>
                        </li>
                        <li class="<?= ($active_menu == 'produksi') ? 'has-submenu' : ''  ?>">
                            <a href="<?= site_url('produksi') ?>" class="waves-effect">
                                <i class="mdi mdi-altimeter"></i>
                                <span>Produksi</span>
                            </a>
                        </li>
                        <li class="<?= ($active_menu == 'laporan') ? 'has-submenu' : ''  ?>">
                            <a href="<?= site_url('laporan') ?>" class="waves-effect">
                                <i class="mdi mdi-arrange-bring-forward"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

        
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->