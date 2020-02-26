<div class="page_content">
    <p class="page_content_title">Курсы валют</p>
    <div class="container">
        <div class="row">


            <div class="col-sm-12">

                <? if ($result) { ?>
                    <div class="result_block">

                        <p class="title">Курс для: <?=$valuteID?></p>

                        <? foreach ($result as $res) { ?>

                            <div class="one">
                                <p>
                                    <?=$res['numCode']?>
                                </p>
                                <p>
                                    <?=$res['сharCode']?>
                                </p>
                                <p>
                                    <?=$res['name']?>
                                </p>
                                <p>
                                    <?=$res['value']?>
                                </p>
                                <p>
                                    <?=$res['date']?>
                                </p>
                            </div>

                        <? } ?>
                    </div>
                <? } ?>

                <form action="" method="GET" class="">

                    <div class="input_block">
                        <input class="form-control" name="from" value="<?= $from ?>"
                               placeholder="<?= time() - 86400; ?>">
                        <input class="form-control" name="to" value="<?= $to ?>" placeholder="<?= time(); ?>">
                    </div>

                    <?
                    foreach ($all_currencies as $key => $currency) { ?>
                        <div>
                            <input <?= $valuteID == $currency['valuteID'] ? 'checked' : '' ?> name="valuteID"
                                                                                             id="currency<?= $key ?>"
                                                                                             type="radio"
                                                                                             value="<?= $currency['valuteID'] ?>">
                            <label for="currency<?= $key ?>"><?= $currency['name'] ?></label>
                        </div>
                    <? } ?>

                    <div>
                        <button type="submit" class="form-control btn-primary">Отправить</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
