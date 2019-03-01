<!-- Portfolio -->
<section id="Portfolio" class="content">

    <!-- Container -->
    <div class="container portfolio-title">

        <!-- Section Title -->
        <div class="section-title">
            <h2>&nbsp;</h2>
            <h2>Панель администрирования</h2>
        </div>
        <!--/Section Title -->

        <div class="row">
            <div class="col-lg-3 right-block">
                <h3>Меню настроек</h3><hr>
                <p><a class="btn btn-default active" href="<?=WEB_SERVER.'/paneladminway/zajavki'?>" >Заявки на тренировки</a></p>
                <p><a class="btn btn-default" href="<?=WEB_SERVER.'/main/raspisanie/individ'?>" >Записать на тренировку</a></p>
            </div>

            <div class="col-lg-9">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th>Тип Тренировки</th>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Настройки</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                $date = date("d.m.Y",time());
                $time = date("H:i",time());


                echo "<p>Сегодня: $name_day $date, Время: $time, Тренер: $trainer</p>";

                $i = 1;
                foreach ($data as $row){
                    if($row['type'] == 'individ'){$type = 'Индивидуальная';}
                    elseif($row['type'] == 'group'){$type = 'Групповая';}
                    else{$type = 'Свободная';}

                    echo '<tr><td>'.$i.'</td><td>'.$row['user'].'</td>
            <td>'.$type.'</td><td>'.$row['date'].'</td><td>'.$row['time'].'</td>
            <td><button class="btn btn-info">Подтвердить</button> <button class="btn btn-danger">Удалить</button></td></tr>';
                    //echo $row['user']."<br>";
                    $i++;
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- Container -->

    <!--/Project Page Holder-->

</section>
<!--/Portfolio -->