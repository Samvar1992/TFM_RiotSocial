<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('message')->nullable();
            $table->string('file_path')->nullable();
            $table->enum('type',['text', 'image', 'document'])->default('text') ->nullable();
            $table->string('file_name')->nullable();
            $table->date('send_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
