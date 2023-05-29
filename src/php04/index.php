<?php

require_once('config/status_codes.php');//同じものは使わず繰り返し読み込む

$random_indexes = array_rand($status_codes, 4);
//status_codeから４つランダムでぬきとる、random_indexesに０１２３（4種類の数字）で格納 ex 0759がrandum_indexに入る

foreach ($random_indexes as $index) {
  $options[] = $status_codes[$index];
}
//foreachでrandom_indexの数（４つ）だけ繰り返し｛｝の中を行う0759はindex
//[]に0759を順番にいれる、これで4つランダムにstatus_codesから情報が得られた

$question = $options[mt_rand(0, 3)];
//mt_rando(x,y)はxからyまでのランダムの数字
//4つの情報から1つ抜きだしてquestionにする
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Status Code Quiz
      </a>
    </div>
  </header>

  <main>
    <div class="quiz__content">
      <div class="question">
        <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでくださいyo</p>
        <p class="question__text">
          <?php echo $question['description'] ?>
          //questionは４つ抜き取った情報でそこからdescriptionを表示
        </p>
      </div>
      <form class="quiz-form" action="result.php" method="post">
        <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
        //['code']はstatus_codes.phpの要素
        <div class="quiz-form__item">
          <?php foreach ($options as $option) : ?>
            //optionsはランダムで4つ取り出した情報
            <div class="quiz-form__group">
              <input class="quiz-form__radio" id="<?php echo $option['code'] ?>" type="radio" name="option" value="<?php echo $option['code'] ?>">
              //radioは複数選択できない選択肢
              <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
                <?php echo $option['code'] ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="quiz-form__button">
          <button class="quiz-form__button-submit" type="submit">
            回答
          </button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>