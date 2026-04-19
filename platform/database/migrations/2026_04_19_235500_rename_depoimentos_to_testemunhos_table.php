<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('depoimentos') && ! Schema::hasTable('testemunhos')) {
            Schema::rename('depoimentos', 'testemunhos');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('testemunhos') && ! Schema::hasTable('depoimentos')) {
            Schema::rename('testemunhos', 'depoimentos');
        }
    }
};
