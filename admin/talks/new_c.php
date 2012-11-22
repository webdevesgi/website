<h1><?php echo $title; ?></h1>

<p>
  <a href="list.php?event_id=<?php echo $_GET['event_id'] ?>">
    <button class="btn">Revenir à la liste des talks</button>
  </a>
</p>

<?php include '_form.php' ?>