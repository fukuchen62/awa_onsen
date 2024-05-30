<?php
// 投稿IDを取得（ループ内で使用する場合はグローバル変数を使う）
global $post;
$post_id = $post->ID;


// カスタムフィールドの全てのメタデータを配列で取得
$custom_fields = get_post_meta($post_id);


// 配列の内容を表示（デバッグ用）
echo '<pre>';
print_r($custom_fields);
echo '</pre>';
