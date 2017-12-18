<?php

function pagination($count_questions, $test_data){
    $keys = array_keys($test_data);
    $pagination = '<div class="pagination">';
    for($i = 1; $i <= $count_questions; $i++){
        $key = array_shift($keys);
        if( $i == 1 ){
            $pagination .= '<a class="nav-active" href="#question-' . $key . '">' . $i . '</a>';
        }else{
            $pagination .= '<a href="#question-' . $key . '">' . $i . '</a>';
        }
    }
    $pagination .= '</div>';
    return $pagination;
}

function get_all_questions($id){
    $questions = DB::table('questions')
        ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
        ->where('questions.lecture_id', $id)
        ->get();
    $data = null;
    foreach ($questions as $q) {
        $data[$q->question_id][0] = $q->question;
        $data[$q->question_id][$q->id] = $q->answer;
    }
    return $data;
}

function get_correct_answers($id){
    $correct_answers = DB::table('questions')

        ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
        ->where([['questions.lecture_id',$id],['answers.check',1]])

        ->get();
    $data = null;
    foreach ($correct_answers as $item){
        $data[$item->question_id]=$item->id;
    }
    return $data;
}

function print_result($test_all_data_result){
    $all_count = count($test_all_data_result); // кол-во вопросов
    $correct_answer_count = 0; // кол-во верных ответов
    $incorrect_answer_count = 0; // кол-во неверных ответов
    $percent = 0; // процент верных ответов


    foreach($test_all_data_result as $item){
        if( isset($item['incorrect']) ) $incorrect_answer_count++;
    }
    $correct_answer_count = $all_count - $incorrect_answer_count;
    $percent = round( ($correct_answer_count / $all_count * 100), 2);



    $print_res = '<div class="test-data">';
    $print_res .= '<div class="count-res">';
    $print_res .= "<p>Всего вопросов: <b>{$all_count}</b></p>";
    $print_res .= "<p>Из них отвечено верно: <b>{$correct_answer_count}</b></p>";
    $print_res .= "<p>Из них отвечено неверно: <b>{$incorrect_answer_count}</b></p>";
    $print_res .= "<p>% верных ответов: <b>{$percent}</b></p>";
    $print_res .= '</div>';	// .count-res

    // вывод теста...
    foreach($test_all_data_result as $id_question => $item){ // получаем вопрос + ответы
        $correct_answer = $item['correct'];
        $incorrect_answer = null;
        if( isset($item['incorrect']) ){
            $incorrect_answer = $item['incorrect'];
            $class = 'question-res error';
        }else{
            $class = 'question-res ok';
        }
        $print_res .= "<div class='$class'>";
        foreach($item as $id_answer => $answer){ // проходимся по массиву ответов
            if( $id_answer === 0 ){
                // вопрос
                $print_res .= "<p class='q'>$answer</p>";
            }elseif( is_numeric($id_answer) ){
                // ответ
                if( $id_answer == $correct_answer ){
                    // если это верный ответ
                    $class = 'a ok2';
                }elseif( $id_answer == $incorrect_answer ){
                    // если это неверный ответ
                    $class = 'a error2';
                }else{
                    $class = 'a';
                }
                $print_res .= "<p class='$class'>$answer</p>";
            }
        }
        $print_res .= '</div>'; // .question-res
    }

    $print_res .= '</div>'; // .test-data

    return $print_res;
}