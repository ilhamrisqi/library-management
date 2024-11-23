<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_anggota_id_to_bukus_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnggotaIdToBukusTable extends Migration
{
    public function up()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->unsignedBigInteger('anggota_id')->nullable()->after('tahun_terbit'); // Menambahkan kolom anggota_id setelah tahun_terbit
            $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('set null'); // Menambahkan relasi dengan tabel anggotas
        });
    }

    public function down()
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropForeign(['anggota_id']);
            $table->dropColumn('anggota_id');
        });
    }
}
