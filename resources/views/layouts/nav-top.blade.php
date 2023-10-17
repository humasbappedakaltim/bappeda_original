<div class="city_top_navigation">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="navigation">
                    <ul>
                        {{menu('homepage','layouts.nav-item')}}
                    </ul>									
                </div>
                <!--DL Menu Start-->
                <div id="kode-responsive-navigation" class="dl-menuwrapper">
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                        {{menu('homepage','layouts.nav-item2')}}
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="city_top_form">
                    <div class="city_top_search">
                        <input type="text" placeholder="Pencarian">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                    <a class="top_user" href="#"><i class="fa fa-user"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>