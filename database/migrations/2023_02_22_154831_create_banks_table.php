<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation_name');
            $table->text('logo');
            $table->tinyInteger('position')->default(1);
            $table->timestamps();
        });
        DB::table('banks')->insert($this->genarateBank());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }

    public function genarateBank(){
        return [
            [
                'name' => 'Ngân hàng TMCP Ngoại Thương',
                'abbreviation_name' => 'VCB',
                'logo' => '/public/assets/images/bank/vietcombank.png',
                'position' => 1
            ],
            [
                'name' => 'Ngân hàng công thương Việt Nam',
                'abbreviation_name' => 'Vietinbank',
                'logo' => '/public/assets/images/bank/vietinbank.png',
                'position' => 2
            ],
            [
                'name' => 'Ngân hàng Kỹ thương Việt Nam',
                'abbreviation_name' => 'TCB',
                'logo' => '/public/assets/images/bank/techcombank.png',
                'position' => 3
            ],
            [
                'name' => 'Ngân hàng Tiên Phong',
                'abbreviation_name' => 'Tpbank',
                'logo' => '/public/assets/images/bank/tpbank.png',
                'position' => 4
            ],
            [
                'name' => 'Ngân hàng An Bình',
                'abbreviation_name' => 'Abbank',
                'logo' => '/public/assets/images/bank/abbank.png',
                'position' => 5
            ],
            [
                'name' => 'Ngân hàng Á Châu',
                'abbreviation_name' => 'ACB',
                'logo' => '/public/assets/images/bank/acb.png',
                'position' => 6
            ],
            [
                'name' => 'Ngân hàng đầu tư và phát triển Việt Nam',
                'abbreviation_name' => 'BIDV',
                'logo' => '/public/assets/images/bank/bidv.png',
                'position' => 7
            ],
            [
                'name' => 'Ngân hàng xuất nhập khẩu Việt Nam',
                'abbreviation_name' => 'Eximbank',
                'logo' => '/public/assets/images/bank/eximbank.png',
                'position' => 8
            ],
            [
                'name' => 'Ngân hàng phát triển TP HCM',
                'abbreviation_name' => 'HDBank',
                'logo' => '/public/assets/images/bank/hdbank.png',
                'position' => 9
            ],
            [
                'name' => 'Ngân hàng quân đội',
                'abbreviation_name' => 'MB',
                'logo' => '/public/assets/images/bank/mbbank.png',
                'position' => 10
            ],
            [
                'name' => 'Ngân hàng hàng hải Việt Nam',
                'abbreviation_name' => 'MSB',
                'logo' => '/public/assets/images/bank/msb.png',
                'position' => 11
            ],
            [
                'name' => 'Ngân hàng Phương Đông',
                'abbreviation_name' => 'OCB',
                'logo' => '/public/assets/images/bank/ocb.png',
                'position' => 12
            ],
            [
                'name' => 'Ngân hàng Sài Gòn Thương Tín',
                'abbreviation_name' => 'Sacombank',
                'logo' => '/public/assets/images/bank/sacombank.png',
                'position' => 13
            ],
            [
                'name' => 'Ngân hàng Sài Gòn - Hà Nội',
                'abbreviation_name' => 'SHB',
                'logo' => '/public/assets/images/bank/shb.png',
                'position' => 14
            ],
            [
                'name' => 'Ngân hàng quốc tế',
                'abbreviation_name' => 'VIB',
                'logo' => '/public/assets/images/bank/vib.png',
                'position' => 15
            ],
            [
                'name' => 'Ngân hàng TMCP Việt Nam thịnh vượng',
                'abbreviation_name' => 'VPBank',
                'logo' => '/public/assets/images/bank/vpbank.png',
                'position' => 16
            ]
        ];
    }

}
