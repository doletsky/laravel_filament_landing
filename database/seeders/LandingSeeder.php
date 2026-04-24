<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    public function run(): void
    {
        // Hero секция
        Landing::create([
            'section_key' => 'hero',
            'content_type' => 'title',
            'title' => 'Стиль,<br>который говорит',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
            'meta_data' => ['logo' => 'ATMOSPHERE'],
        ]);

        Landing::create([
            'section_key' => 'hero',
            'content_type' => 'description',
            'title' => null,
            'description' => 'Осознанная мода для тех, кто ценит качество и индивидуальность.',
            'image_url' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'hero',
            'content_type' => 'image',
            'title' => null,
            'description' => null,
            'image_url' => 'https://images.unsplash.com/photo-1637264585485-5365c59c41fb?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'order' => 3,
            'is_active' => true,
        ]);

        // About секция
        Landing::create([
            'section_key' => 'about',
            'content_type' => 'title',
            'title' => 'ATMOSPHERE — это больше, чем одежда',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'about',
            'content_type' => 'description',
            'title' => null,
            'description' => 'Мы создаем вещи, которые становятся частью вашей истории. Каждая коллекция рождается из любви к текстурам, линиям и чувству свободы.',
            'image_url' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'about',
            'content_type' => 'description',
            'title' => null,
            'description' => 'В основе бренда лежит философия «тихой роскоши» — минимум логотипов, максимум внимания к деталям.',
            'image_url' => null,
            'order' => 3,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'about',
            'content_type' => 'image',
            'title' => null,
            'description' => null,
            'image_url' => 'https://images.unsplash.com/photo-1770012117407-02aa4bd203ec?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'order' => 0,
            'is_active' => true,
        ]);

        // Collection секция
        Landing::create([
            'section_key' => 'collection',
            'content_type' => 'title',
            'title' => 'Новая коллекция',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'collection',
            'content_type' => 'subtitle',
            'title' => 'Весна-Лето 2026',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'collection',
            'content_type' => 'card',
            'title' => 'Платье «AURA»',
            'description' => 'Лён, цвет слоновой кости',
            'image_url' => 'https://images.unsplash.com/photo-1721990336298-90832e791b5a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'collection',
            'content_type' => 'card',
            'title' => 'Жакет «VISION»',
            'description' => 'Шерсть, зеленый',
            'image_url' => 'https://plus.unsplash.com/premium_photo-1691622500876-2d32e983b132?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'order' => 3,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'collection',
            'content_type' => 'card',
            'title' => 'Брюки «FORMA»',
            'description' => 'Креп, черный',
            'image_url' => 'https://images.unsplash.com/photo-1604136172384-b2e9c43271ec?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'order' => 4,
            'is_active' => true,
        ]);

        // Products (Хиты продаж)
        Landing::create([
            'section_key' => 'products',
            'content_type' => 'title',
            'title' => 'То, что выбирают',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'products',
            'content_type' => 'subtitle',
            'title' => 'Бестселлеры',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'products',
            'content_type' => 'card',
            'title' => 'Рубашка «EASE»',
            'description' => null,
            'image_url' => 'https://images.unsplash.com/photo-1521820298019-160c4bc0dc91?q=80&w=659&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 89.00,
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'products',
            'content_type' => 'card',
            'title' => 'Свитер «SOFT»',
            'description' => null,
            'image_url' => 'https://images.unsplash.com/photo-1612636676503-77f496c96ef8?q=80&w=696&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 120.00,
            'order' => 3,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'products',
            'content_type' => 'card',
            'title' => 'Пальто «ARCH»',
            'description' => null,
            'image_url' => 'https://images.unsplash.com/photo-1664917983529-2d691180aa00?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'price' => 240.00,
            'order' => 4,
            'is_active' => true,
        ]);

        // Lookbook
        Landing::create([
            'section_key' => 'lookbook',
            'content_type' => 'title',
            'title' => 'Lookbook',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'lookbook',
            'content_type' => 'subtitle',
            'title' => 'Вдохновение',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'lookbook',
            'content_type' => 'image',
            'title' => 'City Essence',
            'description' => null,
            'image_url' => 'https://images.pexels.com/photos/972995/pexels-photo-972995.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'lookbook',
            'content_type' => 'image',
            'title' => 'Coastal Mood',
            'description' => null,
            'image_url' => 'https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            'order' => 3,
            'is_active' => true,
        ]);

        // Features
        Landing::create([
            'section_key' => 'features',
            'content_type' => 'feature',
            'title' => 'Натуральные ткани',
            'description' => 'Лён, хлопок, шерсть — только премиальные материалы',
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
            'meta_data' => ['icon' => 'fa-feather-alt'],
        ]);

        Landing::create([
            'section_key' => 'features',
            'content_type' => 'feature',
            'title' => 'Этичное производство',
            'description' => 'Локальные мастерские и справедливые условия',
            'image_url' => null,
            'order' => 2,
            'is_active' => true,
            'meta_data' => ['icon' => 'fa-cut'],
        ]);

        Landing::create([
            'section_key' => 'features',
            'content_type' => 'feature',
            'title' => 'Осознанный подход',
            'description' => 'Минимум отходов, перерабатываемая упаковка',
            'image_url' => null,
            'order' => 3,
            'is_active' => true,
            'meta_data' => ['icon' => 'fa-recycle'],
        ]);

        // Testimonials
        Landing::create([
            'section_key' => 'testimonials',
            'content_type' => 'title',
            'title' => 'Что говорят клиенты',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'testimonials',
            'content_type' => 'subtitle',
            'title' => 'Отзывы',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'testimonials',
            'content_type' => 'testimonial',
            'title' => 'Анна М.',
            'description' => 'Ощущение, будто вещь сшита специально для меня. Качество превосходит ожидания.',
            'image_url' => 'https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=600',
            'order' => 2,
            'is_active' => true,
            'meta_data' => ['username' => '@anna_style'],
        ]);

        Landing::create([
            'section_key' => 'testimonials',
            'content_type' => 'testimonial',
            'title' => 'Марк Л.',
            'description' => 'Стиль вне времени. Ношу пиджак уже третий сезон, выглядит как новый.',
            'image_url' => 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=600',
            'order' => 3,
            'is_active' => true,
            'meta_data' => ['username' => '@mark_l'],
        ]);

        Landing::create([
            'section_key' => 'testimonials',
            'content_type' => 'testimonial',
            'title' => 'Ева С.',
            'description' => 'Лучшая покупка сезона. Свитер мягкий и действительно базовый.',
            'image_url' => 'https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=600',
            'order' => 4,
            'is_active' => true,
            'meta_data' => ['username' => '@evas'],
        ]);

        // Subscribe
        Landing::create([
            'section_key' => 'subscribe',
            'content_type' => 'title',
            'title' => 'Присоединяйтесь к нашему Telegram',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'subscribe',
            'content_type' => 'subtitle',
            'title' => 'Будьте ближе',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'subscribe',
            'content_type' => 'description',
            'title' => null,
            'description' => 'Закрытые распродажи, анонсы коллекций и стиль-подборки. Никакого спама — только вдохновение.',
            'image_url' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        // Contact
        Landing::create([
            'section_key' => 'contact',
            'content_type' => 'title',
            'title' => 'Контакты',
            'description' => null,
            'image_url' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'contact',
            'content_type' => 'subtitle',
            'title' => 'Связь',
            'description' => null,
            'image_url' => null,
            'order' => 0,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'contact',
            'content_type' => 'contact_info',
            'title' => 'Мы на связи в Telegram',
            'description' => '@atmosphere_style',
            'image_url' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Landing::create([
            'section_key' => 'contact',
            'content_type' => 'image',
            'title' => null,
            'description' => null,
            'image_url' => 'https://images.pexels.com/photos/302769/pexels-photo-302769.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            'order' => 3,
            'is_active' => true,
        ]);
    }
}
