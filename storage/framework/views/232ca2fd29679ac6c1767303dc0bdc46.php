<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> hello <?php echo e($user->name); ?></h1>
    <div>
        <p>you created <?php echo e($post->title); ?></p>
        <p><?php echo e($post->body); ?></p>
        <p>at time <?php echo e($post->created_at); ?></p>
        <img src="<?php echo e($message->embed('storage/'.$post->image_path)); ?>" alt="" width="30">
    </div>
</body>
</html><?php /**PATH C:\Users\gndja\Desktop\Post app\resources\views/emails/post.blade.php ENDPATH**/ ?>