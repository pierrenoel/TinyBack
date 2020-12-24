<?php $title="Tous les messages";?>

<h1>Tous les messages</h1>

<?php
foreach($messages as $message)
{
    ?><p><a href="/message/show/<?php echo $message['id']; ?>"><?php echo $message['message'] ?></a></p><?php
}
?>
