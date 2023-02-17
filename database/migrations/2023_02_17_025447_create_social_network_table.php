<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Enums\SocialNetWorkType;

class CreateSocialNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_network', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->string('name');
            $table->text('logo');
            $table->tinyInteger('position');
            $table->timestamps();
        });
        DB::table('social_network')->insert($this->generateSocial());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_network');
    }

    public function generateSocial(){
        return [
            [
                'type' => SocialNetWorkType::Phone,
                'name' => 'Số điện thoại',
                'logo' => '/public/assets/images/socials/phone.png',
                'position' => 1
            ],
            [
                'type' => SocialNetWorkType::Email,
                'name' => 'Email',
                'logo' => '/public/assets/images/socials/gmail.png',
                'position' => 2
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Facebook',
                'logo' => '/public/assets/images/socials/facebook.png',
                'position' => 3
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Zalo',
                'logo' => '/public/assets/images/socials/zalo.png',
                'position' => 4
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Tiktok',
                'logo' => '/public/assets/images/socials/tik-tok.png',
                'position' => 5
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Instagram',
                'logo' => '/public/assets/images/socials/instagram.png',
                'position' => 6
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Twitter',
                'logo' => '/public/assets/images/socials/twitter.png',
                'position' => 7
            ],
            [
                'type' => SocialNetWorkType::BrowerLink,
                'name' => 'Youtube',
                'logo' => '/public/assets/images/socials/youtube.png',
                'position' => 8
            ]
        ];
    }

}
