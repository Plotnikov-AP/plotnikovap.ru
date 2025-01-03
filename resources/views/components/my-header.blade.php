<div class="header">
    <h1>Это тестовый сайт Плотникова Александра на Laravel</h1>
    <div class="lang">
        <label>Выберите язык</label>
        <input type="radio" name="lang" value="1" />RU
        <input type="radio" name="lang" value="2" />EN
    </div>
    <div class="clear"></div>
    <div id="menu">
        <nav>
            <ul>
                <li>                                                                         
                    <a href="{{ route('main') }}">Главная</a>                            
                </li>                                                         
                <li>                                                                         
                    <a href="#">Пятнашки</a>                            
                </li>
                <li>                                                                         
                    <a href="#">Мини чат</a>                            
                </li>                                                                       
                <li>                                                                         
                    <a href="#">Тестовый магазин</a>                   
                </li>                                                                        
            </ul>
        </nav>
    </div>                                                                           
</div>