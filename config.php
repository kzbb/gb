<?php
//タイムゾーンセット
date_default_timezone_set('Asia/Tokyo');

//サイトトップに表示される文
define('SITE_NAME', 'gb!');

//CSVファイル
define('CSV_FILE_PATH', 'scenario_utf-8.csv');

//CSVファイルの区切り文字
define('CSV_DELIMITER', ",");
//define('CSV_DELIMITER', "\t");

//CSVファイルで冒頭から何行スキップするか
define('SKIP_ROWS', '0');

//ページにIDを表示するか
define('DISPLAY_ID_ON_PAGE', false);
