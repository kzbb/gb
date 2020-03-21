<?php
/**
 * gb! ver.0.1
 *
 * 2020-03-22
 *
 * PHP version 7
 *
 * @license https://opensource.org/licenses/mit-license.php Released under the MIT license
 * @copyright Copyright (c) 2020 Kazuyuki Baba
 * @author Kazuyuki Baba <baba.kazuyuki@gmail.com>
 */

//CSVファイルを指定します。
$csvFile = file(CSV_FILE_PATH);

//CSVファイルの行数を数えます。
$linesNum = count($csvFile);
//CSVファイルの読み取り開始行を指定します。
$lineCounter = SKIP_ROWS;

//GETでIDを取得します。
$id = @htmlspecialchars($_GET['id']);

//ID指定がない場合、下記のWhileループを最初の一回で終了して、
//CSVファイルの最初の行を表示させることにします。
if (empty($id)) {
    $linesNum = $lineCounter + 1;
}

//カウンターがCSVファイルの行数になるまで、CSVファイルを１行ずつ読み取ります。
while ($lineCounter < $linesNum) {

    //指定された文字で区切り、配列に収めます。
    $data = explode(CSV_DELIMITER, $csvFile[$lineCounter]);
    
    //ID照合します。CSVファイルの最初の列です。
    if (empty($id) || strcmp($id, $data[0]) == 0) {
        
        //IDが合致した場合、該当行のデータを１つずつ表示します。
        foreach ($data as $key => $value) {

            //config.phpの設定に従い、先頭のIDを表示・非表示にします。
            if ($key == 0 && DISPLAY_ID_ON_PAGE != true) {
                echo'<div style="display: none">', $value, '</div>';
            } else {
                //先頭以外は、通常表示です。
                echo'<div>', $value, '</div>';
            }
        }

        //ループを終了します。
        break;
    }
    //IDが合致しなかった場合、次の行に進みます。
    $lineCounter++;
}
