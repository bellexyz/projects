<?php

// Example: database/migrations/YYYY_MM_DD_add_additional_fields_to_images_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->text('biographical_information')->nullable();
            $table->text('educational_background')->nullable();
            $table->text('skills')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('likes_dislikes')->nullable();
            $table->text('contact_information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn([
                'biographical_information',
                'educational_background',
                'skills',
                'hobbies',
                'likes_dislikes',
                'contact_information',
            ]);
        });
    }
}
