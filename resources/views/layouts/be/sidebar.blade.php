{{-- <div class="main_content" id="main-content">
    <div class="left_sidebar">
        <nav class="sidebar">
            <div class="user-info">
                <div class="image"><a href="javascript:void(0);"><img src="../assets/images/user.png" alt="User"></a></div>
                <div class="detail mt-3">
                    <h5 class="mb-0">Mike Thomas</h5>
                    <small>Admin</small>
                </div>
                <div class="social">
                    <a href="javascript:void(0);" title="facebook"><i class="ti-twitter-alt"></i></a>
                    <a href="javascript:void(0);" title="twitter"><i class="ti-linkedin"></i></a>
                    <a href="javascript:void(0);" title="instagram"><i class="ti-facebook"></i></a>
                </div>
            </div>
            <ul id="main-menu" class="metismenu">
                <li class="g_heading">Main</li>
                <li><a href="index.html"><i class="ti-pencil-alt"></i><span>PRODUCTS</span></a></li>
                <li><a href="ui-elements.html"><i class="ti-vector"></i><span>LINK MARKET PLACE</span></a></li>
                
                <li class="g_heading">Contact, Profile, About</li>
                <li><a href="app-contact.html"><i class="ti-id-badge"></i><span>OUR PROFILE</span></a></li>
                
                <li class="g_heading">Extra</li>
                <li><a href="docs/introduction.html"><i class="ti-file"></i><span>Documentation</span></a></li>
            </ul>
        </nav>
    </div>

    <div class="right_sidebar">
        <div class="setting_div">
            <a href="javascript:void(0);" class="rightbar_btn"><i class="fa fa-cog fa-spin"></i></a>
        </div>
       
        <hr>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                <div class="sidebar-scroll">
                    <div class="sidebar-widget px-3">
                        <h5>Theme Setting</h5>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="black">
                                <div class="black"></div>
                            </li>
                            <li data-theme="azure">
                                <div class="azure"></div>
                            </li>
                            <li data-theme="indigo" class="active">
                                <div class="indigo"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                        </ul>
                        <ul class="setting-list list-unstyled mt-3">
                            <li>
                                <label class="custom-switch">
                                    <span class="custom-switch-description">Dark Sidebar</span>
                                    <label class="toggle-switch switch-sm mb-0">
                                        <input type="checkbox" class="switch-dark">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </label>
                            </li>
                            <li>
                                <label class="custom-switch">
                                    <span class="custom-switch-description">Mini Sidebar</span>
                                    <label class="toggle-switch switch-sm mb-0">
                                        <input type="checkbox" class="switch-sidebar">
                                        <span class="toggle-switch-slider"></span>
                                    </label>
                                </label>
                            </li>
                        </ul>
                        <hr>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div> --}}
    <?php $data = App\Models\Profile::first();?>
    <div class="main_content" id="main-content">
        <div class="left_sidebar">
            <nav class="sidebar">
                <div class="user-info">
                    <div class="image"><a href="javascript:void(0);">
                        @if ($data !== null)
                        <img src="{{asset('img_thumbnail/'.$data->thumbnail_home)}}" alt="User">
                        @else
                        <img src="../assets/images/user.png" alt="User">    
                        @endif
                        </a>
                    </div>
                    <div class="detail mt-3">
                        <h5 class="mb-0">
                            @if ($data !== null)
                                {{$data->nama_web}}
                            @else
                                -
                            @endif
                        </h5>
                        <small>{{auth()->user()->name}}</small>
                    </div>
                </div>
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Main</li>
                    <li><a href="{{route('be.product')}}"><i class="ti-pencil-alt"></i><span>PRODUCTS</span></a></li>
                    <li><a href="{{route('be.slider')}}"><i class="ti-vector"></i><span>SLIDER</span></a></li>
                    <li><a href="{{route('be.kategori')}}"><i class="fa fa-book"></i><span>KATEGORI</span></a></li>
                    <li><a href="{{route('be.tag')}}"><i class="fa fa-tags"></i><span>TAGS</span></a></li>
                    
                    <li class="g_heading">Contact, Profile, About</li>
                    <li><a href="{{route('be.profile')}}"><i class="ti-id-badge"></i><span>MY PROFILE</span></a></li>
                    
                    <li class="g_heading">Extra</li>
                    <li><a href="docs/introduction.html"><i class="ti-file"></i><span>Documentation</span></a></li>
                </ul>
            </nav>
        </div>

        <div class="right_sidebar">
            <div class="setting_div">
                <a href="javascript:void(0);" class="rightbar_btn"><i class="fa fa-cog fa-spin"></i></a>
            </div>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                    <div class="sidebar-scroll">
                        <div class="sidebar-widget px-3">
                            <h5>Theme Setting</h5>
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="black">
                                    <div class="black"></div>
                                </li>
                                <li data-theme="azure">
                                    <div class="azure"></div>
                                </li>
                                <li data-theme="indigo" class="active">
                                    <div class="indigo"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li data-theme="blush">
                                    <div class="blush"></div>
                                </li>
                            </ul>
                            
                            <hr>
                        </div>
                        <div class="sidebar-widget px-3">
                            <h5>General Setting</h5>
                            <ul class="setting-list list-unstyled mt-3">
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Dark Sidebar</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-dark">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Mini Sidebar</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-sidebar">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>