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
            $table->text('prefix_link')->nullable();
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
                'type' => SocialNetWorkType::Simple,
                'name' => 'Số điện thoại',
                'logo' => '/public/assets/images/socials/phone.png',
                'prefix_link' => 'tel:',
                'position' => 1
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Email',
                'logo' => '/public/assets/images/socials/gmail.png',
                'prefix_link' => 'mailto:',
                'position' => 2
            ],
            [
                'type' => SocialNetWorkType::Text,
                'name' => 'Văn bản',
                'logo' => '/public/assets/images/socials/text.png',
                'prefix_link' => null,
                'position' => 3
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Facebook',
                'logo' => '/public/assets/images/socials/facebook.png',
                'prefix_link' => null,
                'position' => 4
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Instagram',
                'logo' => '/public/assets/images/socials/instagram.png',
                'prefix_link' => null,
                'position' => 5
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Twitter',
                'logo' => '/public/assets/images/socials/twitter.png',
                'prefix_link' => null,
                'position' => 6
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Pinterest',
                'logo' => '/public/assets/images/socials/pinterest.png',
                'prefix_link' => null,
                'position' => 7
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Wechat',
                'logo' => '/public/assets/images/socials/wechat.png',
                'prefix_link' => null,
                'position' => 8
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Whatapp',
                'logo' => '/public/assets/images/socials/whats-app.png',
                'prefix_link' => 'https://wa.me/',
                'position' => 9
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Tiktok',
                'logo' => '/public/assets/images/socials/tik-tok.png',
                'prefix_link' => null,
                'position' => 10
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Youtube',
                'logo' => '/public/assets/images/socials/youtube.png',
                'prefix_link' => null,
                'position' => 11
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Tinder',
                'logo' => '/public/assets/images/socials/tinder.png',
                'prefix_link' => null,
                'position' => 12
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Momo',
                'logo' => '/public/assets/images/socials/momo.png',
                'prefix_link' => 'https://nhantien.momo.vn/',
                'position' => 13
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Zalopay',
                'logo' => '/public/assets/images/socials/zalopay.png',
                'prefix_link' => null,
                'position' => 14
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Zalo',
                'logo' => '/public/assets/images/socials/zalo.png',
                'prefix_link' => 'https://zalo.me/',
                'position' => 15
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Viber',
                'logo' => '/public/assets/images/socials/viber.png',
                'prefix_link' => 'viber://add?number=',
                'position' => 16
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Skype',
                'logo' => '/public/assets/images/socials/skype.png',
                'prefix_link' => null,
                'position' => 17
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Shopee',
                'logo' => '/public/assets/images/socials/shopee.png',
                'prefix_link' => null,
                'position' => 18
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Lazada',
                'logo' => '/public/assets/images/socials/lazada.png',
                'prefix_link' => null,
                'position' => 19
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Spotify',
                'logo' => '/public/assets/images/socials/spotify.png',
                'prefix_link' => null,
                'position' => 20
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Snapchat',
                'logo' => '/public/assets/images/socials/snapchat.png',
                'prefix_link' => null,
                'position' => 21
            ],
            [
                'type' => SocialNetWorkType::Simple,
                'name' => 'Telegram',
                'logo' => '/public/assets/images/socials/telegram.png',
                'prefix_link' => 'https://t.me/',
                'position' => 22
            ],
            [
                'type' => SocialNetWorkType::Custom,
                'name' => 'Đường link khác',
                'logo' => '/public/assets/images/socials/link.png',
                'prefix_link' => null,
                'position' => 23
            ],
            [
                'type' => SocialNetWorkType::AccountBank,
                'name' => 'Tài khoản ngân hàng',
                'logo' => '/public/assets/images/socials/bank.png',
                'prefix_link' => null,
                'position' => 24
            ]
        ];
    }

}
