<?php
require_once '../model/vote.php';
require_once '../model/comference.php';

function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}
     $vote = new vote();
     $result_vote = $vote->getConferenceVote();
     $comference = new comference();
     $result_conf = $comference->get_conf();
     $x=0;
     foreach($result_vote as $vote){
          foreach($result_conf as $conf){
               if($conf["nom1"]!=$vote["nom1"]){
                   $result[$x] = $conf;
                   $x++;
               }
          }
     }
     echo json_encode($result);