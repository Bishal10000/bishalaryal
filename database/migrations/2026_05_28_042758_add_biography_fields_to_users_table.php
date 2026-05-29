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
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')->nullable()->after('password');
            $table->string('avatar_url')->nullable()->after('bio');
            $table->string('role')->nullable()->after('avatar_url');
            $table->string('github_url')->nullable()->after('role');
            $table->string('linkedin_url')->nullable()->after('github_url');
            $table->string('x_url')->nullable()->after('linkedin_url');
            $table->string('website_url')->nullable()->after('x_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bio', 'avatar_url', 'role', 'github_url', 'linkedin_url', 'x_url', 'website_url']);
        });
    }
};
