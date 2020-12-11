<?php
function test($a) {
	switch (1) {
		case $a == '1':
		case strlen($a) > 3:
		case $a == '0':
			return 0;
		default:
			return 1;
	}
}
print_r(test('2222'));
?>