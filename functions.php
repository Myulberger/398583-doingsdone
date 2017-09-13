<?php
function CountTasks($TaskArray, $TaskItem) {
    $index=0;
    if ($TaskItem=="Все") {
        $index=count($TaskArray);
        return $index;
    }
    foreach ($TaskArray as $key => $value) {

        if ($value['Категория']==$TaskItem) {
            $index=$index+1;
        }
    }
    return $index;
}


function renderTemplate($filepath, $mainArray ){

    // показывать или нет выполненные задачи
    $show_complete_tasks = rand(0, 1);
    //update

    // устанавливаем часовой пояс в Московское время
    date_default_timezone_set('Europe/Moscow');

    $days = rand(-3, 3);
    $task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
    $current_ts = strtotime('now midnight'); // текущая метка времени

    // запишите сюда дату выполнения задачи в формате дд.мм.гггг
    $date_deadline = date("d.m.y", $task_deadline_ts);

    // в эту переменную запишите кол-во дней до даты задачи
    $days_until_deadline = floor((-$current_ts + $task_deadline_ts)/86400);


    // simple array
    $projects= ["Все", 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

    // comp array
    $tasks=[
        [
            'Задача'=>'Собеседование в IT компании',
            'Дата выполнения'=>'01.06.2018',
            'Категория'=>'Работа',
            'Выполнен'=>false ],
         [
            'Задача'=>'Выполнить тестовое задание',
            'Дата выполнения'=>'25.05.2018',
            'Категория'=>'Работа',
            'Выполнен'=>false ],
         [
            'Задача'=>'Сделать задание первого раздела',
            'Дата выполнения'=>'21.04.2018',
            'Категория'=>'Учеба',
            'Выполнен'=>true ],

         [
            'Задача'=>'Встреча с друзьями',
            'Дата выполнения'=>'22.04.2018',
            'Категория'=>'Входящие',
            'Выполнен'=>false ],
         [
            'Задача'=>'Купить корм для кота',
            'Дата выполнения'=>'N.A.',
            'Категория'=>'Домашние дела',
            'Выполнен'=>false ],
         [
            'Задача'=>'Заказать пиццу',
            'Дата выполнения'=>'N.A.',
            'Категория'=>'Входящие',
            'Выполнен'=>false ],
        ];



    if (file_exists($filepath)==false) {
        return "<html> <h1>error</h1> </html>";
    }
    ob_start();
   include $filepath;
   $layout_content=ob_get_clean();
   return $layout_content;
    };


?>
