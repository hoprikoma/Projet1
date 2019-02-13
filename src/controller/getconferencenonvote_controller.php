<?php
require_once '../model/vote.php';
require_once '../model/comference.php';

     $vote = new vote();
     $result_vote = $vote->getConferenceVote();
     $comference = new comference();
     $result_conf = $comference->get_conf();
     $x=0;
     $y=0;
     if($result_vote==null){
          echo json_encode($result_conf);
     }else{
          if($result_vote==$result_conf){
               $result=array();
               echo json_encode($result);
          }else{
               foreach($result_conf as $conf){
                        // echo $result_vote[$x]["nom1"];
                        // echo $conf["nom1"];
                        if(!isset($result_vote[$x]["nom1"])){
                              $result[$y] = $conf;
                              $y++;
                        }else{
                         if($result_vote[$x]["nom1"]!=$conf["nom1"]){
                              $result[$y] = $conf;
                              $y++;
                          }  
                        }
                        $x++;
               }
               echo json_encode($result);
          }
         
     }
     