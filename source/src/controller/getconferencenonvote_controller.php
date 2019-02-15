<?php
error_reporting(0);
require_once '../model/vote.php';
require_once '../model/comference.php';

$vote = new vote();
$result_vote = $vote->getConferenceVote();
$comference = new comference();
$result_conf = $comference->get_conf();
function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

$result = array_diff_uassoc( $result_conf,$result_vote, "key_compare_func");
echo json_encode($result);
     