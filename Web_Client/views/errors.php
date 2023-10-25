<html>
    <body>
        <h1> PAGE ERROR </h1>
        <?php
        if (isset($tabError))
        {
            foreach ($tabError as $error)
            {
                echo $error;
            }
        }
        ?>
    </body>
</html>