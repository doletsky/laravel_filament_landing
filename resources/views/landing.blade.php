<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATMOSPHERE — Стиль вне времени</title>
  <!-- Шрифты: элегантный Playfair Display + чистый Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
  <!-- Font Awesome для иконок -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/landing.css'])
  @else
    <style>
{!! file_get_contents(resource_path('css/landing.css')) !!}
    </style>
  @endif
</head>
<body>

<header>
  <a href="#" class="logo">{{ $landings->get('hero')?->first()?->meta_data['logo'] ?? 'ATMOSPHERE' }}</a>
  <div class="nav-links">
    <a href="#collection">Коллекция</a>
    <a href="#lookbook">Lookbook</a>
    <a href="#about">О бренде</a>
    <a href="#contact">Контакты</a>
    <a href="#subscribe" class="btn btn-outline" style="padding:0.5rem 1.5rem;">Telegram</a>
  </div>
  <div class="hamburger" id="hamburger-menu" aria-label="Открыть меню" tabindex="0">
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>

<nav class="mobile-menu" id="mobile-menu" aria-label="Мобильное меню">
  <button class="close-btn" id="close-mobile-menu" aria-label="Закрыть меню">&times;</button>
  <a href="#collection">Коллекция</a>
  <a href="#lookbook">Lookbook</a>
  <a href="#about">О бренде</a>
  <a href="#contact">Контакты</a>
  <a href="#subscribe" class="btn btn-outline" style="padding:0.5rem 1.5rem;">Telegram</a>
</nav>

<main>
  <!-- 1. HERO -->
  @php
    $heroImg = $landings->get('hero')?->first()?->image_url;
    $heroSrc = $heroImg ? (filter_var($heroImg, FILTER_VALIDATE_URL) ? $heroImg : asset('storage/' . $heroImg)) : null;
  @endphp
  <section class="hero" @if($heroSrc) style="background-image: url('{{ $heroSrc }}')" @endif>
    <div class="hero-content">
      <h1 class="fade-in visible">{{ $landings->get('hero')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Стиль,<br>который говорит' }}</h1>
      <p>{{ $landings->get('hero')?->first(fn($item) => $item->content_type === 'description')?->description ?? 'Осознанная мода для тех, кто ценит качество и индивидуальность.' }}</p>
      <a href="#collection" class="btn btn-primary">Смотреть коллекцию →</a>
    </div>
  </section>

  <!-- 2. БРЕНД-СТОРИ -->
  <section id="about">
    <div class="container">
      <div class="brand-story">
        @if($landings->get('about')?->first(fn($item) => $item->content_type === 'image')?->image_url)
            @php
                $img = $landings->get('about')->first(fn($item) => $item->content_type === 'image')->image_url;
                $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img);
            @endphp
          <img src="{{ $src }}" alt="О бренде" class="fade-up">
        @else
          <img src="https://images.unsplash.com/photo-1770012117407-02aa4bd203ec?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="О бренде" class="fade-up">
        @endif
        <div class="brand-story-text fade-up">
          <div class="section-subhead">История</div>
          <h3>{{ $landings->get('about')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'ATMOSPHERE — это больше, чем одежда' }}</h3>
          @if($aboutDesc = $landings->get('about')?->filter(fn($item) => $item->content_type === 'description'))
            @foreach($aboutDesc as $paragraph)
              <p>{{ $paragraph->description }}</p>
            @endforeach
          @else
            <p>Мы создаем вещи, которые становятся частью вашей истории. Каждая коллекция рождается из любви к текстурам, линиям и чувству свободы.</p>
            <p>В основе бренда лежит философия «тихой роскоши» — минимум логотипов, максимум внимания к деталям.</p>
          @endif
          <a href="#" class="btn btn-outline" style="margin-top:1rem;">Узнать больше</a>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. КОЛЛЕКЦИЯ (сетка) -->
  <section id="collection">
    <div class="container">
      <div class="section-header fade-up">
        <div class="section-subhead">{{ $landings->get('collection')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Весна-Лето 2026' }}</div>
        <h2>{{ $landings->get('collection')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Новая коллекция' }}</h2>
      </div>
      <div class="collection-grid">
        @forelse($landings->get('collection', collect())->filter(fn($item) => $item->content_type === 'card')->take(3) as $index => $card)
          <div class="collection-card fade-up" @if($index > 0) style="transition-delay:{{ $index * 0.1 }}s;" @endif>
            @if($card->image_url)
                @php $img = $card->image_url; $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img); @endphp
                <img src="{{ $src }}" alt="{{ $card->title }}">
            @else
              <img src="https://images.unsplash.com/photo-1721990336298-90832e791b5a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="{{ $card->title }}">
            @endif
            <div class="card-info">
              <h4>{{ $card->title }}</h4>
              <p>{{ $card->description }}</p>
            </div>
          </div>
        @empty
          <div class="collection-card fade-up">
            <img src="https://images.unsplash.com/photo-1721990336298-90832e791b5a?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Платье">
            <div class="card-info">
              <h4>Платье «AURA»</h4>
              <p>Лён, цвет слоновой кости</p>
            </div>
          </div>
          <div class="collection-card fade-up" style="transition-delay:0.1s;">
            <img src="https://plus.unsplash.com/premium_photo-1691622500876-2d32e983b132?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Пиджак">
            <div class="card-info">
              <h4>Жакет «VISION»</h4>
              <p>Шерсть, зеленый</p>
            </div>
          </div>
          <div class="collection-card fade-up" style="transition-delay:0.2s;">
            <img src="https://images.unsplash.com/photo-1604136172384-b2e9c43271ec?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Брюки">
            <div class="card-info">
              <h4>Брюки «FORMA»</h4>
              <p>Креп, черный</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- 4. ХИТЫ ПРОДАЖ -->
  <section>
    <div class="container">
      <div class="section-header fade-up">
        <div class="section-subhead">{{ $landings->get('products')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Бестселлеры' }}</div>
        <h2>{{ $landings->get('products')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'То, что выбирают' }}</h2>
      </div>
      <div class="featured-products">
        @forelse($landings->get('products', collect())->filter(fn($item) => $item->content_type === 'card')->take(3) as $index => $product)
          <div class="product-card fade-up" @if($index > 0) style="transition-delay:{{ $index * 0.1 }}s;" @endif>
            @if($product->image_url)
                @php $img = $product->image_url; $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img); @endphp
                <img src="{{ $src }}" alt="{{ $product->title }}">
            @else
              <img src="https://images.unsplash.com/photo-1521820298019-160c4bc0dc91?q=80&w=659&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="{{ $product->title }}">
            @endif
            <h4>{{ $product->title }}</h4>
            @if($product->price)
              <p class="price">€ {{ number_format($product->price, 0) }}</p>
            @endif
            <a href="#" class="btn btn-outline">В канал Telegram</a>
          </div>
        @empty
          <div class="product-card fade-up">
            <img src="https://images.unsplash.com/photo-1521820298019-160c4bc0dc91?q=80&w=659&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Рубашка">
            <h4>Рубашка «EASE»</h4>
            <p class="price">€ 89</p>
            <a href="#" class="btn btn-outline">В канал Telegram</a>
          </div>
          <div class="product-card fade-up" style="transition-delay:0.1s;">
            <img src="https://images.unsplash.com/photo-1612636676503-77f496c96ef8?q=80&w=696&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Трикотаж">
            <h4>Свитер «SOFT»</h4>
            <p class="price">€ 120</p>
            <a href="#" class="btn btn-outline">В канал Telegram</a>
          </div>
          <div class="product-card fade-up" style="transition-delay:0.2s;">
            <img src="https://images.unsplash.com/photo-1664917983529-2d691180aa00?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Пальто">
            <h4>Пальто «ARCH»</h4>
            <p class="price">€ 240</p>
            <a href="#" class="btn btn-outline">В канал Telegram</a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- 5. LOOKBOOK -->
  <section id="lookbook">
    <div class="container">
      <div class="section-header fade-up">
        <div class="section-subhead">{{ $landings->get('lookbook')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Вдохновение' }}</div>
        <h2>{{ $landings->get('lookbook')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Lookbook' }}</h2>
      </div>
      <div class="lookbook-grid">
        @forelse($landings->get('lookbook', collect())->filter(fn($item) => $item->content_type === 'image')->take(2) as $index => $item)
          <div class="lookbook-item fade-up">
            @php $img = $item->image_url; $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img); @endphp
            <img src="{{ $src }}" alt="{{ $item->title }}">
            @if($item->title)
              <span class="lookbook-label">{{ $item->title }}</span>
            @endif
          </div>
        @empty
          <div class="lookbook-item fade-up">
            <img src="https://images.pexels.com/photos/972995/pexels-photo-972995.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Look 1">
            <span class="lookbook-label">City Essence</span>
          </div>
          <div class="lookbook-item fade-up">
            <img src="https://images.pexels.com/photos/1485031/pexels-photo-1485031.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Look 2">
            <span class="lookbook-label">Coastal Mood</span>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- 6. ПРЕИМУЩЕСТВА -->
  <section>
    <div class="container">
      <div class="features">
        @forelse($landings->get('features', collect())->filter(fn($item) => $item->content_type === 'feature')->take(3) as $index => $feature)
          <div class="feature fade-up" @if($index > 0) style="transition-delay:{{ $index * 0.1 }}s;" @endif>
            @if($feature->meta_data['icon'] ?? null)
              <div class="feature-icon"><i class="fas {{ $feature->meta_data['icon'] }}"></i></div>
            @endif
            <h3>{{ $feature->title }}</h3>
            <p>{{ $feature->description }}</p>
          </div>
        @empty
          <div class="feature fade-up">
            <div class="feature-icon"><i class="fas fa-feather-alt"></i></div>
            <h3>Натуральные ткани</h3>
            <p>Лён, хлопок, шерсть — только премиальные материалы</p>
          </div>
          <div class="feature fade-up" style="transition-delay:0.1s;">
            <div class="feature-icon"><i class="fas fa-cut"></i></div>
            <h3>Этичное производство</h3>
            <p>Локальные мастерские и справедливые условия</p>
          </div>
          <div class="feature fade-up" style="transition-delay:0.2s;">
            <div class="feature-icon"><i class="fas fa-recycle"></i></div>
            <h3>Осознанный подход</h3>
            <p>Минимум отходов, перерабатываемая упаковка</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- 7. ОТЗЫВЫ -->
  <section>
    <div class="container">
      <div class="section-header fade-up">
        <div class="section-subhead">{{ $landings->get('testimonials')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Отзывы' }}</div>
        <h2>{{ $landings->get('testimonials')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Что говорят клиенты' }}</h2>
      </div>
      <div class="testimonials">
        @forelse($landings->get('testimonials', collect())->filter(fn($item) => $item->content_type === 'testimonial')->take(3) as $index => $testimonial)
          <div class="testimonial-card fade-up" @if($index > 0) style="transition-delay:{{ $index * 0.1 }}s;" @endif>
            <p class="testimonial-text">«{{ $testimonial->description }}»</p>
            <div class="testimonial-author">
              @if($testimonial->image_url)
                 @php $img = $testimonial->image_url; $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img); @endphp
                 <img src="{{ $src }}" alt="{{ $testimonial->title }}">
              @endif
              <div class="author-info">
                <h4>{{ $testimonial->title }}</h4>
                @if($testimonial->meta_data['username'] ?? null)
                  <p>{{ $testimonial->meta_data['username'] }}</p>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="testimonial-card fade-up">
            <p class="testimonial-text">«Ощущение, будто вещь сшита специально для меня. Качество превосходит ожидания.»</p>
            <div class="testimonial-author">
              <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Анна">
              <div class="author-info">
                <h4>Анна М.</h4>
                <p>@anna_style</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card fade-up" style="transition-delay:0.1s;">
            <p class="testimonial-text">«Стиль вне времени. Ношу пиджак уже третий сезон, выглядит как новый.»</p>
            <div class="testimonial-author">
              <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Марк">
              <div class="author-info">
                <h4>Марк Л.</h4>
                <p>@mark_l</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card fade-up" style="transition-delay:0.2s;">
            <p class="testimonial-text">«Лучшая покупка сезона. Свитер мягкий и действительно базовый.»</p>
            <div class="testimonial-author">
              <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Ева">
              <div class="author-info">
                <h4>Ева С.</h4>
                <p>@evas</p>
              </div>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- 8. ПОДПИСКА / TELEGRAM -->
  <section id="subscribe">
    <div class="container">
      <div class="subscribe-section fade-up">
        <div class="section-subhead">{{ $landings->get('subscribe')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Будьте ближе' }}</div>
        <h2>{{ $landings->get('subscribe')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Присоединяйтесь к нашему Telegram' }}</h2>
        <p>{{ $landings->get('subscribe')?->first(fn($item) => $item->content_type === 'description')?->description ?? 'Закрытые распродажи, анонсы коллекций и стиль-подборки. Никакого спама — только вдохновение.' }}</p>
        
        <form class="subscribe-form" id="telegram-subscribe-form">
          @csrf
          <input type="email" placeholder="Ваш email" name="email" required>
          <button type="submit" class="btn btn-primary">Подписаться</button>
        </form>

        <div class="telegram-links">
          <a href="https://t.me/yourbrandchannel" target="_blank" class="telegram-btn">
            <i class="fab fa-telegram-plane"></i> Telegram-канал
          </a>
          <a href="https://t.me/yourbrandbot" target="_blank" class="telegram-btn">
            <i class="fab fa-telegram"></i> Чат-бот
          </a>
        </div>
        <p style="margin-top:1.5rem; font-size:0.9rem;">Нажимая «Подписаться», вы соглашаетесь с политикой конфиденциальности.</p>
      </div>
    </div>
  </section>

  <!-- 9. КОНТАКТЫ -->
  <section id="contact">
    <div class="container">
      <div class="section-header fade-up">
        <div class="section-subhead">{{ $landings->get('contact')?->first(fn($item) => $item->content_type === 'subtitle')?->title ?? 'Связь' }}</div>
        <h2>{{ $landings->get('contact')?->first(fn($item) => $item->content_type === 'title')?->title ?? 'Контакты' }}</h2>
      </div>
      <div class="contact-flex">
        <div class="contact-info fade-up">
          <h3>{{ $landings->get('contact')?->first(fn($item) => $item->content_type === 'contact_info')?->title ?? 'Мы на связи в Telegram' }}</h3>
          <ul class="contact-details">
              <li><i class="fab fa-telegram"></i> @atmosphere_style</li>
              <li><i class="fas fa-envelope"></i> hello@atmosphere.ru</li>
              <li><i class="fas fa-phone-alt"></i> +7 (999) 123-45-67</li>
              <li><i class="fas fa-map-marker-alt"></i> Москва, ул. Николина, 15</li>
          </ul>
          <a href="https://t.me/atmosphere_style" target="_blank" class="btn btn-primary telegram-btn" style="margin-top:1rem;">
            <i class="fab fa-telegram-plane"></i> Перейти в Telegram
          </a>
        </div>
        <div class="contact-map fade-up">
          @if($landings->get('contact')?->first(fn($item) => $item->content_type === 'image')?->image_url)
            @php $img = $landings->get('contact')->first(fn($item) => $item->content_type === 'image')->image_url; $src = filter_var($img, FILTER_VALIDATE_URL) ? $img : asset('storage/' . $img); @endphp
            <img src="{{ $src }}" alt="Наш офис">
          @else
            <img src="https://images.pexels.com/photos/302769/pexels-photo-302769.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Наш офис">
          @endif
        </div>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-logo">{{ $landings->get('hero')?->first()?->meta_data['logo'] ?? 'ATMOSPHERE' }}</div>
      <div class="social-links">
        <a href="#"><i class="fab fa-telegram"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
      </div>
    </div>
    <div class="copyright">
      © 2026 ATMOSPHERE. Все права защищены.
    </div>
  </div>
</footer>

@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/js/landing.js'])
@else
  <script>
{!! file_get_contents(resource_path('js/landing.js')) !!}
  </script>
@endif

</body>
</html>
