<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('status')->default('active')->comment('active, unsubscribed');
            $table->timestamps();
            
            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
