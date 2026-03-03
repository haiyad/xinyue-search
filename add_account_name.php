<?php
$conn = mysqli_connect('localhost', 'xinyue', 'gametf27', 'xinyue');
if ($conn) {
    $sql = 'ALTER TABLE qf_source ADD COLUMN account_name VARCHAR(255) NOT NULL DEFAULT \'\' AFTER is_type';
    if (mysqli_query($conn, $sql)) {
        echo '字段添加成功';
    } else {
        echo '字段添加失败: ' . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo '数据库连接失败';
}
?>