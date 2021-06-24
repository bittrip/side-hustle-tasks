<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Week 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php
    // Function definitions.
    // myRange function returns an array.
    function myRange($start, $end)
    {
        $arr = array();
        for ($start; $start <= $end; $start++) {
            array_push($arr, $start);
        }
        return $arr;
    }

    // sum function returns the sum of an array.
    function sum($arr)
    {
        $total = 0;
        foreach ($arr as $i) {
            $total += $i;
        }
        return $total;
    }
    ?>
    <div>
        <?php
        print_r(myRange(0, 9));
        ?>
    </div>
    <div>
        <?php
        $arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        print_r(sum($arr));
        ?>
    </div>
    <script src="" async defer></script>
</body>

</html>