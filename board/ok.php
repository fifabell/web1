<? include "../include/head.html"; ?>
<?
    if($_SESSION["SITE_USER_UID"]!=2) {
        $common->error("관리자만 가능합니다.","previous","");
        exit;
    }

    $reg_date = date("Y-m-d H:i:s");
    // echo "subject: ".$subject."<br>";
    // echo "contents: ".$contents."<br>";
    // echo "type: ".$type."<br>";
    // echo "uid: ".$uid."<br>";
?>
<?
    if($uid){ //수정하기
        $query = "UPDATE tb_board SET title='$subject', content='$contents', reg_date='$reg_date' where uid='$uid'";
        $result = $db->query($query);
    } else { //생성하기
        $query = "INSERT INTO `tb_board`(`uid`, `type`, `title`, `content`, `user`, `reg_date`) VALUES ('','$type','$subject','$contents','$SITE_USER_NAME','$reg_date')";
        $result = $db->query($query);
    }

    if($result){
        $common -> error("업로드 성공","goto","/board/list.html?type=$type");
    } else {
        $common -> error("업로드 실패","alert","");
    }
?>