<form class="form-horizontal" action="<?php echo $formUrl ?>" method="POST">
  <div class="control-group">
    <label class="control-label" for="inputTitle">Titre</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="inputTitle" placeholder="ex : Un backend avec Backbone.js" name="talk[title]" value="<?php echo $talk['title'] ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputDescription">Description</label>
    <div class="controls">
      <textarea id="inputDescription" name="talk[description]" rows="7"><?php echo $talk['description'] ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputSpeaker">Speaker</label>
    <div class="controls">
      <input class="input" type="text" id="inputSpeaker" placeholder="ex : Bob Marley" name="talk[speaker]" value="<?php echo $talk['speaker'] ?>">    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="hidden" name="talk[event_id]" value="<?php echo $_GET['event_id'] ?>" />
      <?php if(isset($_GET['id'])): ?>
        <input type="hidden" name="talk[id]" value="<?php echo $_GET['id'] ?>" />
      <?php endif; ?>
      <button type="submit" class="btn">Sauvegarder</button>
    </div>
  </div>
</form>