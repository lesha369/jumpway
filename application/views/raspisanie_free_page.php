<!-- Portfolio -->


<?






$type = trim(htmlspecialchars($this->uri->segment(3)));
$now_day = date('d');
$now_month = date('m');
$now_year = date('Y');



$sday = $this->jump_model->get_day(date('d'), date('m'), date('Y'));
$trainer = $this->jump_model->get_trainer(date('d'), date('m'), date('Y'));

?>
<section id="Portfolio" class="content">

    <!-- Container -->
    <div class="container portfolio-title">
        <!-- Section Title -->
        <div class="section-title">

            <div class="section-title">
                <h2>&nbsp;</h2>
                <h2>Расписание</h2>
            </div>
            <div class="text-center">
                Выберите тип тренировки:
            <a class="btn btn-default <?=$active_free?>" href="<?=WEB_SERVER.'/main/raspisanie'?>" >Свободная тренировка</a>
            <a class="btn btn-default <?=$active_ind?>" href="<?=WEB_SERVER.'/main/raspisanie/individ'?>" >Индивидуальные занятия</a>
            <a class="btn btn-default <?=$active_group?>" href="<?=WEB_SERVER.'/main/raspisanie/group'?>" >Групповые занятия</a>
            </div>
            <br><br>
            <?php echo validation_errors(); ?>

            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-bordered">
                        <thead class="">
                        <tr><td colspan="4" class="text-center"><b>Сегодня</b> <?=$sday;?> (<?=date('d-m-Y');?>)</td></tr>
                        <tr><td>Тренер:</td><td colspan="3"><a href="<?=WEB_SERVER?>/main/trainers#<?=$trainer;?>"><?=$trainer;?></a></td></tr>

                        <th class="text-center">Время</th>
                        <th class="text-center">Мест</th>
                        <th class="text-center">Записаться</th>
                        </thead>
                        <tbody>
                        <?php
                        $today = date('d-m-Y');
                        $totime = date('H:i');
                        $tohour = date('H');
                        $tomin = date('i');

                        if ($tohour < 10){$tohour = 9.5;}
                        if ($tomin > 30){$tohour = $tohour+0.5;}

                        for ($i = $tohour+0.5; $i <= 21.5; $i=$i+0.5) {
                            if (!strpos($i, '.')){
                                $time = $i.':00';
                                $mod = $i;
                                $min = 0;
                            }
                            else {
                                $time = (int)$i.':30';
                                $mod = (int)$i.'30';
                                $min = 30;
                            }

                            $free_places = $this->jump_model->get_free_plases($count_free,$today,$time,$type);
                            $disabled = '';
                            if ($free_places < 1){
                                $disabled = 'disabled';
                            }

                            $now = time();
                            $dr = mktime((int)$i,$min,0,$now_month,$now_day,$now_year);
                            $skoko =  ($dr - $now);
                            $minyt = (int)($skoko / 60);
                            if($minyt < END_ZAPIS_TRAINING){
                                $disabled = 'disabled';
                            }





                            echo '<tr><td><strong class="text-success">'.$time.'</strong></td><td>'.$free_places.'</td>
                            <td class="text-center"><button type="button" '.$disabled.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#'.$today.$mod.'">записаться</button></td></tr>';

                            //модальное окно для кнопки записаться
                            echo '<div class="modal fade" id="'.$today.$mod.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
<div class="modal-dialog" role="document">
<form action="'.WEB_SERVER.'/main/raspisanie" method="post">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Запись на тренировку в '.$time.' <br>на дату '.$today.' (Сегодня)<br>Тренер: <a href="'.WEB_SERVER.'/main/trainers#'.$trainer.'">'.$trainer.'</a></h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputTel">ФИО</label>
                <input type="text" name="fio" class="form-control bfh-phone" placeholder="Иванов Иван Иванович" >
            </div>
            <div class="form-group">
                <label for="inputEmail">Email-адрес</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Ваша электронная почта" name="email"  size="50">
            </div>
            <div class="form-group">
                <label for="inputTel">Контактный Телефон</label>
                <input type="tel" name="phone" id="phone" class="form-control bfh-phone" data-format="+7 (ddd) ddd-dd-dd добавочный(dddd)" placeholder="+7 (926) 123-45-67" pattern="(\+[\d\ \(\)\-]{21})" />
            </div>
            <div class="form-group">
                <label for="inputTel">Длительность тренировки</label>
                <select class="form-control" style="height: auto" name="time">
                  <option value="0.5">30 минут</option>
                  <option value="1" selected>1 час</option>
                  <option value="2">2 часа</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputCaptcha">Коментарий</label>
                <textarea rows="6" class="form-control" id="inputComments" placeholder="Ваш комментарий" name="comments"></textarea>
            </div>
            <input type="hidden" name="type" value="'.$this->uri->segment(3).'">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button class="btn btn-primary" name="zapis" value="1">Записаться</button>
        </div>
        
    </div>
</div></form>';
                            //конец модальное окно для кнопки записаться
                        }

                        ?>
                        </tbody>
                    </table>
                </div>













                <?php
                for ($iid = 1; $iid <= 7; $iid++){

                    $str = strtotime($now_month.'/'.$now_day.'/'.$now_year);
                    $ii = date('d',($str+86400*$iid));
                    $im = date('m',($str+86400*$iid));
                    $iy = date('y',($str+86400*$iid));
                    $next_day = $this->jump_model->get_day($ii, $im, $iy);

                    $trainer = $this->jump_model->get_trainer($ii, $im, $iy);

                    $inday = $ii.'-'.date('m-Y');
                    echo '<div class="col-lg-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr><td colspan="4" class="text-center">'.$next_day.' ('.$inday.')</td></tr>
                        <tr><td>Тренер:</td><td colspan="3"><a href="'.WEB_SERVER.'/main/trainers#'.$trainer.'">'.$trainer.'</a></td></tr>
                        <th class="text-center">Время</th>
                        <th class="text-center">Мест</th>
                        <th class="text-center">Записаться</th>
                        </thead>
                        <tbody>';
                    for ($is = 10; $is <= 21.5; $is=$is+0.5) {
                        if (!strpos($is, '.')){
                            $time = $is.':00';
                            $mod = $is;
                        }
                        else {
                            $time = (int)$is.':30';
                            $mod = (int)$is.'30';
                        }
                        $free_placess = $this->jump_model->get_free_plases($count_free,$inday,$time,$type);
                        $disabled = '';
                        if ($free_placess < 1){
                            $disabled = 'disabled';
                        }







                        echo '<tr><td><strong class="text-success">'.$time.'</strong></td><td>'.$free_placess.'</td>
                <td class="text-center"><button type="button" '.$disabled.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#'.$ii.$mod.'">записаться</button></td></tr>';







                        //модальное окно для кнопки записаться
                        echo '<div class="modal fade" id="'.$ii.$mod.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
<div class="modal-dialog" role="document">
<form action="'.WEB_SERVER.'/main/raspisanie" method="post">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Запись на тренировку в '.$time.' <br>на дату '.$inday.' ('.$next_day.')<br>Тренер: <a href="'.WEB_SERVER.'/main/trainers#'.$trainer.'">'.$trainer.'</a></h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputTel">ФИО</label>
                <input type="text" name="fio" class="form-control bfh-phone" placeholder="Иванов Иван Иванович" >
            </div>
            <div class="form-group">
                <label for="inputEmail">Email-адрес</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Ваша электронная почта" name="email"  size="50">
            </div>
            <div class="form-group">
                <label for="inputTel">Контактный Телефон</label>
                <input type="tel" name="phone" id="phone" class="form-control bfh-phone" data-format="+7 (ddd) ddd-dd-dd добавочный(dddd)" placeholder="+7 (926) 123-45-67" pattern="(\+[\d\ \(\)\-]{21})" />
            </div>
            <div class="form-group">
                <label for="inputTel">Длительность тренировки</label>
                <select class="form-control" style="height: auto" name="time">
                  <option value="0.5">30 минут</option>
                  <option value="1" selected>1 час</option>
                  <option value="2">2 часа</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputCaptcha">Коментарий</label>
                <textarea rows="6" class="form-control" id="inputComments" placeholder="Ваш комментарий" name="comments"></textarea>
            </div>
        <input type="hidden" name="type" value="'.$this->uri->segment(3).'">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button class="btn btn-primary" name="zapis" value="1">Записаться</button>
        </div>
        
    </div>
</div></form>';
                        //конец модальное окно для кнопки записаться


                    }

                    echo '</tbody>
                    </table>
                </div>';
                }
                ?>















                <div class="col-lg-4">
                    d
                </div>
                <div class="col-lg-4">
                    adddddddd
                </div>
            </div>

        </div>
        <!--/Section Title -->

    </div>
    <!-- Container -->


    <!--/Project Page Holder-->

</section>


<!--/Portfolio -->