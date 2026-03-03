<?php
// 数据库连接信息
$servername = "localhost";
$username = "xinyue";
$password = "gametf27";
$dbname = "xinyue";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// SQL语句
$sql = "ALTER TABLE qf_source ADD COLUMN admin_id INT(11) NOT NULL DEFAULT 0 COMMENT '添加资源的运营人员ID' AFTER is_user";

if ($conn->query($sql) === TRUE) {
    echo "字段添加成功";
} else {
    echo "错误: " . $conn->error;
}

$conn->close();
?>