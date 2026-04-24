(function() {
  // Intersection Observer для анимаций
  const animatedElements = document.querySelectorAll('.fade-up, .fade-in, .scale-in');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -30px 0px' });
  animatedElements.forEach(el => observer.observe(el));

  // Плавный скролл
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href === "#" || href === "") return;
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
      // Если клик по ссылке в мобильном меню — закрыть меню
      if (this.closest('.mobile-menu')) {
        document.getElementById('mobile-menu').classList.remove('open');
        document.body.style.overflow = '';
      }
    });
  });

  // Мобильное меню
  const hamburger = document.getElementById('hamburger-menu');
  const mobileMenu = document.getElementById('mobile-menu');
  const closeBtn = document.getElementById('close-mobile-menu');
  
  hamburger.addEventListener('click', function() {
    mobileMenu.classList.add('open');
    document.body.style.overflow = 'hidden';
  });
  hamburger.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ' ') {
      mobileMenu.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
  });
  closeBtn.addEventListener('click', function() {
    mobileMenu.classList.remove('open');
    document.body.style.overflow = '';
  });
  // Закрытие по клику вне меню
  document.addEventListener('click', function(e) {
    if (mobileMenu.classList.contains('open') && !mobileMenu.contains(e.target) && !hamburger.contains(e.target)) {
      mobileMenu.classList.remove('open');
      document.body.style.overflow = '';
    }
  });

  // Обработчик формы подписки
  const form = document.getElementById('telegram-subscribe-form');
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const email = form.querySelector('input[type="email"]').value;
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalText = submitBtn.textContent;
      
      try {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Отправка...';
        
        const response = await fetch('/subscribe', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
          },
          body: JSON.stringify({ email: email })
        });

        if (response.ok) {
          alert('Спасибо! Ваш email добавлен в лист ожидания.');
          form.reset();
        } else if (response.status === 422) {
          const data = await response.json();
          if (data.errors && data.errors.email) {
            alert('Этот email уже подписан.');
          } else {
            alert('Ошибка: ' + (data.message || 'Попробуйте позже'));
          }
        } else {
          alert('Ошибка при подписке. Попробуйте позже.');
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Ошибка подключения. Попробуйте позже.');
      } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
      }
    });
  }

  // Смена прозрачности header при скролле
  window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
      header.style.background = 'rgba(250, 250, 250, 0.95)';
      header.style.boxShadow = '0 5px 20px rgba(0,0,0,0.03)';
    } else {
      header.style.background = 'rgba(250, 250, 250, 0.85)';
      header.style.boxShadow = 'none';
    }
  });
})();
