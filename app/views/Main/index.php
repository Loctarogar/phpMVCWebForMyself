<?php foreach ($posts as $post){
    foreach ($post as $k => $v){
        echo $k.' - '.$v.'<br>';
    }
} ?>
<h2><?php echo $posts[0]['id'] ?></h2>