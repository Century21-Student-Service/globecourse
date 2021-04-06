<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
echo finfo_file($finfo,'www/uploads/image/20210402/1617283003_2021.jpg');
    finfo_close($finfo);
