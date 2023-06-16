
    <?php

        $number  = rand(1, 100);
        $guesses = 0;
        $didIWinYet = false;
        $handle  = fopen('php://stdin', 'r');
        
        echo "\nGuess a number between 1 and 100..\n";
        
        while (!$didIWinYet)
        {
            echo 'What is your guess? ';
        
            $guess = fgets($handle);
            
                if ($guess > $number)
                {
                    echo "Too high...\n";
                }
                elseif ($guess < $number)
                {
                    echo "Too low...\n";
                }
                elseif ($guess == $number)
                {
                    echo "\nYou guessed it in ", "$guesses", " times!\n\n";
                    exit;
                }
                    $guesses++;
            }
        
    ?>