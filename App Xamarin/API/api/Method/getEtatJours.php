<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/EtatJour.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $EtatJour = new EtatJour($db);

  $EtatJour->idVisiteur = isset($_GET['idVisiteur']) ? $_GET['idVisiteur'] : die();
  $EtatJour->mois = isset($_GET['mois']) ? $_GET['mois'] : die();
  // Blog post query
  $result = $EtatJour->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'jour' => $jour,
        'idVisiteur' => $idVisiteur,
        'etatjour' => $etatjour,
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
