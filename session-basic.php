<?php
	session_start();
	
	// POST로 전달된 사용자 이름이 있는 경우 사용
	$username = isset($_POST['username']) ? $_POST['username'] : '기본사용자';
	
	$_SESSION["id"] = "user_" . time();  // 유니크한 ID 생성
	$_SESSION["name"] = $username;       // 입력받은 이름 사용
	$_SESSION["type"] = "일반회원";
	
	// 세션 생성 후 세션 확인 페이지로 리다이렉트
	header("Location: session-check.php");
	exit();
?>
