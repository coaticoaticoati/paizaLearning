<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    list ($H, $W) = explode(" ", trim(fgets(STDIN)));
    $S = [];
    for ($i = 0; $i < $H; $i++) {
        $S[] = str_split(trim(fgets(STDIN)));
    }
    list ($y, $x) = explode(" ", trim(fgets(STDIN)));
    for ($i = 0; $i < $H; $i++) { // 上下方向
        if ($S[$i][$x] === ".") {
            $S[$i][$x] = "#";
        } else {
            $S[$i][$x] = ".";
        }
    }
    for ($i = 0; $i < $W; $i++) {
        if ($S[$y][$i] === ".") {
            $S[$y][$i] = "#";
        } else {
            $S[$y][$i] = ".";
        }
    }
    for ($i = 1; $i < min($H, $W); $i++) {
    // 行数と列数の小さい方の値までしか最大で斜めに移動ができない。
    // 行数または列数の範囲外にアクセスしないように制限している。    
        if ($y + $i < $H) { // 斜め下方向
        // y座標からループ変数 $i を加えた位置が、マス目の範囲内にあるか確認している
            if ($x + $i < $W) { // 斜め右下方向
                if ($S[$y + $i][$x + $i] === ".") {
                    $S[$y + $i][$x + $i] = "#";
                } else {
                    $S[$y + $i][$x + $i] = ".";
                }
            }
            if ($x - $i >= 0) { // 斜め左下方向
            // 指定されたx座標からループ変数 $i を引いた位置が、マス目の範囲内にあるか確認している
                if ($S[$y + $i][$x - $i] === ".") {
                    $S[$y + $i][$x - $i] = "#";
                } else {
                    $S[$y + $i][$x - $i] = ".";
                }
            }
        }
        if ($y - $i >= 0) { // 斜め上方向
            if ($x + $i < $W) { // 斜め右上方向
                if ($S[$y - $i][$x + $i] === ".") {
                    $S[$y - $i][$x + $i] = "#";
                } else {
                    $S[$y - $i][$x + $i] = ".";
                }
            }
            if ($x - $i >= 0) { // 斜め左上方向
                if ($S[$y - $i][$x - $i] === ".") {
                    $S[$y - $i][$x - $i] = "#";
                } else {
                    $S[$y - $i][$x - $i] = ".";
                }
            }
        }
    }
    if ($S[$y][$x] === ".") {
        $S[$y][$x] = "#";
    } else {
        $S[$y][$x] = ".";
    }
    
    foreach ($S as $row) {
        foreach ($row as $cell) {
            echo $cell;
        }
        echo "\n";
    }
?>