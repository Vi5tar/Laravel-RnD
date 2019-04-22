@extends('layout')

@section('title')
  PHP Playground
@endsection

@section('content')
<h1><?= $words ?></h1>
<h2><?= $boogers ?></h2>


<h6><?= $ninjas ?></h6>

<ul>
  <?php
  foreach ($arrayPlay as $key => $value) {
    echo '<li>'.$key . ': '. $value.'</li>';
  }
  foreach ($arrayFun as $value) {
    echo '<li>'.$value.'</li>';
  }
  ?>
</ul>
@endsection
