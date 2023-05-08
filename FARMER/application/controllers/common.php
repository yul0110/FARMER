<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	
	//파일업로드 ajax 단건처리
	public function file_upload()
	{		

		$server_root_path = $_SERVER['DOCUMENT_ROOT']; 	//파일기본경로_FARMER 폴더
		$file_server_path = realpath(__FILE__); 		//현재파일 위치

		$upload_path = $server_root_path."/upload/";
		
		//설정전 폴더가 없으면 생성해줌
		if(!is_dir($upload_path)){
			mkdir($upload_path, 0777, true); //리눅스 파일생성 명령어
		}
		

		$upload_file	= $_FILES["uploadFile"];//$_FILES안에 map형식으로 ["uploadFile"]들어있음
		$upload_dir = $upload_path;

		$upfile_name          = $upload_file["name"];     //실제 파일명
		$upfile_tmp_name      = $upload_file["tmp_name"]; //서버에 임시 저장될 파일명.
		$upfile_type          = $upload_file["type"];     //파일 형식
		$upfile_size          = $upload_file["size"];     //파일 크기
		$upfile_error         = $upload_file["error"];    //에러 메세지
		
		$file = explode(".",$upfile_name);  //explode() => 문자열을 분할하여 배열로 저장하는 함수
		$file_name = $file[0];
		$file_ext  = $file[1];
		
		//파일값이 비어있으면 에러입니다. 비어있을시 실행을 안하는 것.
		if(!$upfile_error){
			
			$new_file_name   	= date("Y_m_d_H_i_s");				//날짜
			$copied_file_name 	= $new_file_name.".".$file_ext;		//날짜.확장자명.
			$uploaded_file    	= $upload_dir.$copied_file_name;	// FARMER/upload/날짜.확장자명.
			$src_path 			= "/upload/".$copied_file_name;		//db에 저장할 경로 및 result_path값
			
			//size 체크 (500KB)     history.go(-1) =>이전 페이지로 되돌아가기
			if($upfile_size  > 5000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)  
				</script>
				");
				exit;
			}

			//확장자 체크
			if (($upfile_type != "image/gif") && ($upfile_type != "image/jpeg") && ($upfile_type != "image/pjpeg") && ($upfile_type != "image/png")){
				
				echo("
				<script>
					alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
					history.go(-1)
				</script>
				");
				exit;
			}

			//파일 복사 성공 여부
			if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)){//1번째 인자(임시파일)를 2번째 인자에 넣겠다.
				echo("
				<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					//history.go(-1)
				</script>
				");
				exit;
			}

		} 
		
		//데이터 result
		echo json_encode(array(
			'upload_path'	=> $src_path
		));

	}
}

