<div id="slider">                                                                                     
    @foreach ($sliders as $slider)                                                                            
        <div class="slider_item">                                                                             
            <img src="/images/slider/{{ $slider->alias }}.gif" alt="{{ $slider->title }}" />                  
            <div class="slider_content">                                                                      
                <p>{!! $slider->slider_description !!}</p>                                                    
            </div>                                                                                            
        </div>                                                                                                
    @endforeach                                                                                               
    <div class="clear"></div>                                                                                 
    <div id="bullets">                                                                                    
        <div class="active"></div>                                                                        
            @for ($i = 1; $i < count($sliders); $i++)                                                         
                <div></div>                                                                                       
            @endfor                                                                                           
        </div>                                                                                                
    </div>                                                                                                    
</div>                                                                                                    
