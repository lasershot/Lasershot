<?php
include('mqtt_test.php');
?>
<script>
    console.log(1);

    var hp_player = 100;
    var time;
    var game_state;
    var time_interval = 3000;
    var time_send = 4000;
    var count = 0;
    var random_heal_or_enemy = 1;
    var level = 0;
    var i = 0;
    var persent = 25;
    var number_board;
    var state_score = 0;
    var score = 0;
    var state = 0;
    var second = 1;
    var minute = 0;
    var bonus_count = 0;
    var bonus_state;

    var pattern = [0,1,2, 2,0,4, 1,3,5, 2,4,3, 5,3,4, 3,5,8, 4,7,6, 5,8,7, 6,7,8, 7,8,8]; // main pattern | 3 level
    var pattern_number = [
        [5,  4,  3,  1,  4,  7,  9,  11, 8,  7],  // A 0
        [10, 7,  8,  9,  5,  4,  3,  1,  2,  4],  // B 1
        [8,  4,  1,  2,  3,  7,  8,  9,  5,  4],  // C 2
        [5,  14, 9,  4,  3,  12, 5,  1,  4,  7],  // D 3
        [1,  5,  4,  8,  11, 7,  6,  1,  3,  9],  // E 4
        [12, 7,  6,  14, 5,  9,  5,  4,  3,  8],  // F 5
        [5,  11, 6,  1,  8,  4,  10, 6,  1,  9],  // G 6
        [9,  1,  6,  10, 4,  11, 2,  5,  12, 7],  // H 7
        [12, 4,  1,  3,  8,  1,  9,  2,  5,  11]  // I 8
    ];
    // A B C   C A E   B D F   C E D   F D E   D F I   E H G   F I H   G H I   H I G
    function start(msg) {
        console.log(1, msg, state);
        if (msg == 'S' & state == 0) {
            // var time_delay = setInterval(delay, 1000);
            time_state = setInterval(myTimer, 1000);
            game_state = setInterval(send_game_state, time_interval);
            function send_game_state(){
                if (hp_player <= 0){
                    clearInterval(game_state);
                    clearInterval(time_state);
                    alert("Score: "+score+"\n"+"Time: "+time);
                    hp_player = 100;
                    score = 0;
                    level = 0;
                    i = 0;
                    state = 0;
                    second = 1;
                    document.getElementById("minutes").innerHTML = "00 : 00";
                }

                if (persent > Math.floor(Math.random() * 100)) {
                    random_heal_or_enemy = 2; // random HP
                }

                number_board = pattern_number[pattern[level]][i]; // number board
                if (number_board < 10){
                    number_board = "0"+number_board;
                } if (random_heal_or_enemy < 10){
                    random_heal_or_enemy = "0"+random_heal_or_enemy;
                }
                console.log(number_board+","+random_heal_or_enemy+","+time_send, time_interval, "Score :", score, "HP :", hp_player);
                send(number_board+","+random_heal_or_enemy+","+time_send); // send pattern topic 'test_input'<<<<<<<<<
                i++; // next board

                state_score = 0; //defult

                if (i % 10 == 0){
                    console.log('next', level+1);
                    i = 0;
                    if (level != 10)
                        level++;
                }

                if (level % 3 == 0 & level != 0 & i % 10 == 0){
                    // clearInterval(game_state);
                    console.log('Bonus_State');
                    clearInterval(game_state);
                    bonus_state = setInterval(bonus, 500);
                }
                if (level == 3 & i == 0){
                    time_send = 3500;
                } else if (level == 5){
                    time_send = 3000;
                } else if (level == 8 & i == 0){
                    time_send = 2500;
                    time_interval = 2500;
                    clearInterval(game_state);
                    game_state = setInterval(send_game_state, time_interval);
                } else if (level == 9 & i == 0){
                    time_send = 2000;
                } else if (level == 10 & i == 0){
                    time_interval = 2000;
                    clearInterval(game_state);
                    game_state = setInterval(send_game_state, time_interval);
                }
                random_heal_or_enemy = 1;
                // hp_player -= 5; // test
                // score += 10; // test
                document.getElementById("stage").innerHTML = "STAGE "+(level+1);
                document.getElementById("hp_player").innerHTML = "HP : "+hp_player;
            }

            function myTimer() {
                if (second % 60 == 0 && second != 0)
                    minute += 1;
                if (second%60 < 10 && minute < 10){
                    time = "0" + minute + " : " + "0" + second%60;
                } else if (second%60 < 10){
                    time = minute + "  :" + "0" + second%60;
                } else if (minute < 10){
                    time = "0" + minute + " : " + second%60;
                } else {
                    time = minute + " : " + second%60;
                }
                document.getElementById("minutes").innerHTML = time;
                second += 1;
                state = 1;
                document.getElementById("score").innerHTML = "SCORE : "+score;
                document.getElementById("hp_player").innerHTML = "HP : "+hp_player;
            }
            function bonus(){
                state_score = 2;
                clearInterval(game_state);
                if (bonus_count == 10){
                    clearInterval(bonus_state);
                    game_state = setInterval(send_game_state, time_interval);
                    bonus_count = 0;
                }
                number_board = Math.floor(Math.random() * (16 - 1)) + 1;
                if (number_board < 10){
                    number_board = "0"+number_board;
                }
                console.log(number_board+","+"02"+","+700, time_interval, "Score :", score, "HP :", hp_player, bonus_count);
                send(number_board+","+"02"+","+700); // send pattern topic 'test_input'<<<<<<<<<
                bonus_count += 1;
            }
        }
        if (msg == 'P'){
            clearInterval(game_state);
            clearInterval(time_state);
            state = 0;
        }
        if (msg == 'R'){
            clearInterval(game_state);
            clearInterval(time_state);
            alert("Score: "+score+"\n"+"Time: "+time);
            hp_player = 100;
            score = 0;
            level = 0;
            i = 0;
            state = 0;
            second = 1;
            document.getElementById("minutes").innerHTML = "00 : 00";
            document.getElementById("score").innerHTML = "SCORE : 0";
            document.getElementById("hp_player").innerHTML = "HP : 100";
        }
    }
</script>