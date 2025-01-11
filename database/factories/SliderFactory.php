<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number=-1;
        $array=[['title' => 'PHP', 'slider_description' => 'PHP junior. ООП. локальный сервер apache, php, MySQL. Программирую на PHP более 10 лет. Частные заказы: скрипты, обработчики прайсов, парсеры, торговые боты (через web интерфейс и через api) и т.д. и т.п.'],
                ['title' => 'CSS', 'slider_description' => 'CSS сейчас углубленно изучаю на платном курсе. Параллельно полностью переписываю этот сайт, применяя новые знания. Сайт стал намного лучше и этот процес не остановить!!!'],
                ['title' => 'MySQL', 'slider_description' => 'Много заказов сделано с использованием этой БД. И создание текущего сайта без MySQL не обошлось)))'],
                ['title' => 'Laravel', 'slider_description' => 'Изучил на платном курсе. Имеется сертификат. Очень все понравилось. Коммерческого опыта пока нет, но я работаю в этом направлении))). Этот сайт сделан с испоьзованием Laravel'],
                ['title' => 'JavaScript', 'slider_description' => 'JavaScript изучен минимально, ровно настолько, сколько требуется при выполнении заказов по php. Но скоро буду изучать js рлотно и всерьёз!'],
                ['title' => 'Git', 'slider_description' => 'Git <a href="https://github.com/Plotnikov-AP">https://github.com/Plotnikov-AP </a>изучен на полноценном курсе с практикой. Сейчас использую для моно работы с виртуальным сервером. Опыта многопользовательской разработки пока нет.'],
                ['title' => 'CSharp', 'slider_description' => 'C# изучал на платных курсах. Практики в этом направлении нет, поэтому пока не юзаю.'],
        ];
        return [
               'product_id' => ++$number,                                                   
               'title' => $array[$number]['title'],                               
               'alias' => mb_strtolower($array[$number]['title']),                       
               'slider_description' => $array[$number]['slider_description']
        ];
    }
}
