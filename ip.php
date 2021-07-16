<?php
// watermark.php

# 접속자 IP 주소를 불러온다.
$ip = $_SERVER['REMOTE_ADDR'];

# 이미지를 생성한다.
# imagecreate(int width, int height);
$im = imagecreate(360, 300);

# 이미지 배경색을 설정한다.
# imagecolorallocate(생성 이미지, int red, int green, int blue, int alpha);
# RGB 색상 범위는 0~255 / alpha 범위는 0~127(투명)
$bg = imagecolorallocatealpha($im, 0, 0, 0, 127);

# PNG로 내보내기 위해 헤더를 설정한다.
header("Content-Type: image/png");

# 생성한 이미지 안에 무작위 위치, 무작위 색으로 IP 주소를 여러 개를 넣는다.
# 개수를 바꾸려면 '$i <= 10;'의 10을 줄이거나 늘리면 된다.
for ($i = 0; $i <= 10; $i++) {
	# 삽입할 글자(IP 주소)의 색을 설정한다.
	# rand();를 사용해 글자색과 알파값을 무작위로 나오게 했다.
	$tc = imagecolorallocatealpha($im, rand(0,240), rand(0,240), rand(0,240), rand(100,115));

	# 이미지에 글자(IP 주소)를 넣는다.
	# imagestring(생성 이미지, 글자크기[1-5], 가로위치, 세로위치, 표시할 문자, 글자색);
	# rand();를 사용해 글자가 표시될 위치를 무작위로 나오게 했다.
	imagestring($im, 3, rand(0,250), rand(0,280), $ip, $tc);
}

# 만든 이미지를 PNG로 내보내 출력한다.
# imagepng(생성 이미지, 저장할 경로, 압축률, 필터);
# 경로를 지정하지 않으면 NULL, 압축률은 0~9
# 경로, 압축률, 필터는 생략해도 된다.
imagepng($im, NULL, 9);

# 출력 후 이미지를 메모리에서 지운다.
imagedestroy($im);
?>
