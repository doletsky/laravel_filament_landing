<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->comment('Ключ секции: hero, about, collection, products, lookbook, features, testimonials, subscribe');
            $table->string('content_type')->comment('Тип контента: title, description, image, card, testimonial и т.д.');
            $table->text('title')->nullable()->comment('Заголовок или название');
            $table->longText('description')->nullable()->comment('Описание или содержимое');
            $table->string('image_url')->nullable()->comment('URL изображения');
            $table->decimal('price', 10, 2)->nullable()->comment('Цена товара');
            $table->integer('order')->default(0)->comment('Порядок отображения');
            $table->boolean('is_active')->default(true)->comment('Активен ли элемент');
            $table->json('meta_data')->nullable()->comment('Дополнительные данные (иконка, цвет и т.д.)');
            $table->timestamps();
            
            $table->index('section_key');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landings');
    }
};
