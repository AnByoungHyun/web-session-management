<?php
	// 기존 세션이 있다면 삭제
	if (session_status() == PHP_SESSION_ACTIVE) {
		session_destroy();
		// 모든 세션 변수 초기화
		$_SESSION = array();
		
		// 세션 쿠키 삭제
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
	}
	
	// 새로운 세션 시작
	session_start();
	// 새로운 세션 ID 생성
	session_regenerate_id(true);
	
	// POST로 전달된 사용자 이름이 있는 경우 사용
	$username = isset($_POST['username']) ? $_POST['username'] : '기본사용자';
	
	// 세션 데이터 설정
	$_SESSION["id"] = "user_" . time();  // 유니크한 ID 생성
	$_SESSION["name"] = $username;       // 입력받은 이름 사용
	$_SESSION["type"] = "일반회원";
	
	// 세션 생성 후 세션 확인 페이지로 리다이렉트
	header("Location: session-check.php");
	exit();
?>
