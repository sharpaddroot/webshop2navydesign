<ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link border-0 bg-dark text-white navy-hov-dark" style="border-radius:60px;" id="home-tab" data-toggle="tab" href="#wallet" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-file-upload"></i> ทรูวอลเล็ท</a>
        </li>
        <li class="nav-item ml-2">
            <a class="nav-link border-0 bg-danger text-white navy-hov-red" style="border-radius:60px;" id="contact-tab" data-toggle="tab" href="#card" role="tab" aria-controls="contact" aria-selected="false"><i class="far fa-credit-card"></i> บัตรทรูมันนี่</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
<?php //truewallet ?>
        <div class="tab-pane fade show active" id="wallet" role="tabpanel" aria-labelledby="home-tab">
            <h3 class=" m-2 mt-4"><i class="fas fa-sim-card"></i> <b>True Wallet</b></h3>
            <hr class="border-dark">
            <div class="row no-gutters mt-4">
            <button type="button" class="btn btn-sm btn-danger col-12">
                <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i> โปรโมชั่นเติมเงิน x <span class="badge badge-light"><?= $bonus; ?></span>
            </button>
            <table class="table mt-2 text-center border-bottom border-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ราคา</th>
                <th scope="col">ได้รับ Points</th>
                <th scope="col">ได้รับ BONUS</th>
                <th scope="col">เลือก</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">ราคา 50 บาท</th>
                <td><?= $pay_50; ?></td>
                <td class="text-danger">+ <?= $bonus_50; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="50" value="wallet_50">
                    <label class="form-check-label" for="50">50 บาท</label>
                </div>
                </td>
                </tr>
                <tr>
                <th scope="row">ราคา 90 บาท</th>
                <td><?= $pay_90; ?></td>
                <td class="text-danger">+ <?= $bonus_90; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="90" value="wallet_90">
                    <label class="form-check-label" for="90">90 บาท</label>
                </div>
                </td>
                </tr>
                <tr>
                <th scope="row">ราคา 150 บาท</th>
                <td><?= $pay_150; ?></td>
                <td class="text-danger">+ <?= $bonus_150; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="150" value="wallet_150">
                    <label class="form-check-label" for="150">150 บาท</label>
                </div>
                </td>
                </tr>
                <tr>
                <th scope="row">ราคา 300 บาท</th>
                <td><?= $pay_300; ?></td>
                <td class="text-danger">+ <?= $bonus_300; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="300" value="wallet_300">
                    <label class="form-check-label" for="300">300 บาท</label>
                </div>
                </td>
                </tr>
                <tr>
                <th scope="row">ราคา 500 บาท</th>
                <td><?= $pay_500; ?></td>
                <td class="text-danger">+ <?= $bonus_500; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="500" value="wallet_500">
                    <label class="form-check-label" for="500">500 บาท</label>
                </div>
                </td>
                </tr>
                <tr>
                <th scope="row">ราคา 1,000 บาท</th>
                <td><?= $pay_1000; ?></td>
                <td class="text-danger">+ <?= $bonus_1000; ?></td>
                <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="walletprice" id="1000" value="wallet_1000">
                    <label class="form-check-label" for="1000">1000 บาท</label>
                </div>
                </td>
                </tr>
            </tbody>
            </table>
            <form class="w-100">
            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-dark">กรอกเลขที่อ้างอิง</span>
            </div>
                <input type="text" class="form-control" placeholder="กรุณากรอกเลขที่อ้างอิง" pattern="[0-9]+" title="ต้องเป็นตัวเลข 0 - 9 เท่านั้น !" required>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-3 w-100">ทำการเติมเงิน</button>
            </form>
            <div class="alert alert-danger mt-1 w-100" role="alert">
                <i class="fas fa-info-circle"></i> <b>ข้อควรระวัง</b> : กรุณาโอนเงินให้ตรงตามจำนวนที่เลือก <b><u>ไม่งั้นระบบจะไม่ทำเติมเงินให้คุณ !</u></b>
            </div>
            </div>
            <h5 class="mt-3"><b>วิธีการเติมเงิน True Wallet</b></h5>
            <hr class="border-dark">
            1. เข้า Application TrueWallet</br>
            2. ไปที่การโอนเงิน<b class="text-danger"><u>ตามจำนวนที่เลือกไว้</u></b></br>
            3. โอนเงินไปที่เบอร์ <b><?= $wallet_phone; ?></b></br>
            4. นำเลข อ้างอิง ที่ได้จากการโอนเงินมากรอกที่ด้านบน</br>
            5. แล้วกด ทำการเติมเงิน เป็นอันเสร็จการเติมเงิน
            
        </div>

<?php //truemoney ?>
        <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="profile-tab">
            <h3 class=" m-2 mt-4 text-danger"><i class="far fa-credit-card"></i> <b>True Money</b></h3>
            <hr class="border-danger">
            <div class="row no-gutters mt-4">
            <button type="button" class="btn btn-sm btn-danger col-12">
                <i class="fas fa-sync-alt" style="animation: rotateOut 1.5s infinite;" ></i> โปรโมชั่นเติมเงิน x <span class="badge badge-light"><?= $bonus; ?></span>
            </button>
            <table class="table mt-2 text-center border-bottom border-dark">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ราคา</th>
                <th scope="col">ได้รับ Points</th>
                <th scope="col">ได้รับ BONUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">ราคา 50 บาท</th>
                <td><?= $pay_50; ?></td>
                <td class="text-danger">+ <?= $bonus_50; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 90 บาท</th>
                <td><?= $pay_90; ?></td>
                <td class="text-danger">+ <?= $bonus_90; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 150 บาท</th>
                <td><?= $pay_150; ?></td>
                <td class="text-danger">+ <?= $bonus_150; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 300 บาท</th>
                <td><?= $pay_300; ?></td>
                <td class="text-danger">+ <?= $bonus_300; ?></td>

                </tr>
                <tr>
                <th scope="row">ราคา 500 บาท</th>
                <td><?= $pay_500; ?></td>
                <td class="text-danger">+ <?= $bonus_500; ?></td>
                </tr>
                <tr>
                <th scope="row">ราคา 1,000 บาท</th>
                <td><?= $pay_1000; ?></td>
                <td class="text-danger">+ <?= $bonus_1000; ?></td>
                </tr>
            </tbody>
            </table>
            <form class="w-100">
            <div class="input-group flex-nowrap mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text navy-bg-red">กรอกเลขเลขบัตร 14 หลัก</span>
            </div>
                <input type="text" class="form-control" placeholder="กรุณากรอกเลขเลขบัตร 14 หลัก" pattern="[0-9]+" title="ต้องเป็นตัวเลข 0 - 9 เท่านั้น !" required>
            </div>
            <button type="submit" class="btn btn-outline-danger mt-3 w-100">ทำการเติมเงิน</button>
            </form>
            </div>
            <h5 class="mt-3"><b>วิธีการเติมเงิน True Money</b></h5>
            <hr class="border-dark">
            1. กรอกเลขบัตร 14 หลักของบัตรทรูมันนี่</br>
            2. แล้วกด ทำการเติมเงิน เป็นอันเสร็จการเติมเงิน         
        </div>

        </div>