<div class="header">
    <h1>Это тестовый сайт Плотникова Александра на Laravel</h1>
    <div class="languageSelect">
        @include('components.language-switch')
    </div>
    <div class="clear"></div>
    <div id="menu">
        <nav>
            <ul>
                <li>                                                                         
                    <a href="{{ route('main') }}">{{ __('menu.main') }}</a>                            
                </li>                                                         
                <li>                                                                         
                    <a href="#">{{ __('menu.pyatnashki') }}</a>                            
                </li>
                <li>                                                                         
                    <a href="#">{{ __('menu.chat') }}</a>                            
                </li>                                                                       
                <li>                                                                         
                    <a href="#">{{ __('menu.shop') }}</a>                   
                </li>                                                                        
            </ul>
        </nav>
    </div>                                                                           
</div>