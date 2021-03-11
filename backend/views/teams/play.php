<?php
/**
 * Created by PhpStorm.
 * User: Armine
 * Date: 3/11/2021
 * Time: 12:41 PM
 */

use common\models\Teams;
?>
<?php $team1items = str_split($team1Data->string)?>
<?php $team2items = str_split($team2Data->string)?>
<?php
    echo $team1Data->title . ' members are ' . join($team1items, ', ') . '</br>';
    echo $team2Data->title . ' members are ' . join($team2items, ', ') . '</br>';

    $roundsCount = max(count($team1items), count($team2items));
    $team1ItemsData = [];
    for ($i = 0; $i < count($team1items); $i++) {
        $team1ItemsData[$i] = Teams::ITEMS[$team1items[$i]];
    }
    $team2ItemsData = [];
    for ($i = 0; $i < count($team2items); $i++) {
        $team2ItemsData[$i] = Teams::ITEMS[$team2items[$i]];
    }
    echo '<pre>';
?>
<?php
    for ($i = 0; $i < $roundsCount; $i++){
        echo 'attack ' . $team1Data->title . '</br>';
        if(!empty($team1ItemsData[$i])) {
            $team1MemberData = $team1ItemsData[$i];
        }
        else {
            $k = $i+1;
            while(empty($team1ItemsData[$k])){
                $k++;
            }
            $team1MemberData = $team1ItemsData[$k];
        }
        $team1AttackerPoints = $team1MemberData['attack_point'];
        foreach ($team2ItemsData as $key => $team2MemberData){
            $team2MemberLifeCount = $team2MemberData['life_count'];
            $team2MemberProtection = $team2MemberData['protection_percent'];
            $staysLife = $team2MemberLifeCount + ($team2MemberProtection * $team2MemberLifeCount) / 100 - $team1AttackerPoints;
            if($staysLife <= 0) {
                unset($team2items[$key]);
                if(empty($team2items)) {
                    echo 'team ' . $team2Data->title . 'game over'; die;
                }
                unset($team2ItemsData[$key]);
                $team1AttackerPoints = $staysLife * (-1);
                continue;
            }
            else {
                $team2MemberData['life_count'] = $staysLife + $team2MemberData['recover_point'];
                $team2ItemsData[$key] = $team2MemberData;
                break;
            }
        }
        echo 'attack ' . $team2Data->title . '</br>';
        if(!empty($team2ItemsData[$i])) {
            $team2MemberData = $team2ItemsData[$i];
        }
        else {
            $k = $i+1;
            while(empty($team2ItemsData[$k])){
                $k++;
            }
            $team2MemberData = $team2ItemsData[$k];
        }
        $team2AttackerPoints = $team2MemberData['attack_point'];
        foreach ($team1ItemsData as $key => $team1MemberData){
            $team1MemberLifeCount = $team1MemberData['life_count'];
            $team1MemberProtection = $team1MemberData['protection_percent'];
            $staysLife = $team1MemberLifeCount + ($team1MemberProtection * $team1MemberLifeCount) / 100 - $team2AttackerPoints;
            if($staysLife <= 0) {
                unset($team1items[$key]);
                if(empty($team1items)) {
                    echo 'team ' . $team1Data->title . 'game over'; die;
                }
                unset($team1ItemsData[$key]);
                $team2AttackerPoints = $staysLife * (-1);
                continue;
            }
            else {
                $team1MemberData['life_count'] = $staysLife + $team1MemberData['recover_point'];
                $team1ItemsData[$key] = $team1MemberData;
                break;
            }
        }
    }
    var_dump($team1items);
    var_dump($team2items);

?>
