
    <?php

playGame();

function playGame(){
        $guesses = 1;
        $didIWinYet = false;
        $handle  = fopen('php://stdin', 'r');
        $maxRandom = (int)readline('Choose the max value for the number to find: ');
        define('MIN_NUMBER', 1);
        $number  = rand(MIN_NUMBER, $maxRandom);
        
        echo "\nGuess a number between ", MIN_NUMBER," and ", "$maxRandom", "..\n";
        
        while (!$didIWinYet)
        {
            echo 'What is your guess? ';
        
            $guess = fgets($handle);
            $lastGuess = $guess;

            if($guesses == 1 && $guess !== $number){
                $old_gap = abs($number-$guess);
                echo "Try again...\n";
        
            } else if($guess != $number){
                $gap = abs($number-$guess);
                if($gap < $old_gap){
                    echo "getting closer...\n";
                }else{
                    echo "moving away...\n";
                }
                $old_gap = $gap;
        
            }else{
                echo "\nYou guessed it in $guesses times!\n\n";
                exit();
            }
                    $guesses++;
            }
        }
    ?>