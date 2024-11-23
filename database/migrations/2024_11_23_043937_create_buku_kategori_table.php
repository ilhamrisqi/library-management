<?php

// database/migrations/xxxx_xx_xx_create_buku_kategori_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKategoriTable extends Migration
{
    public function up()
    {
        Schema::create('buku_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku_kategori');
    }
}

