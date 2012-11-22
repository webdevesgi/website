<form class="form-horizontal" action="<?php echo $formUrl ?>" method="POST">
  <div class="control-group">
    <label class="control-label" for="inputTitle">Titre</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="inputTitle" placeholder="ex : Tour du monde en JavaScript" name="event[title]" value="<?php echo $event['title'] ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputDescription">Description</label>
    <div class="controls">
      <textarea id="inputDescription" name="event[description]" rows="7"><?php echo $event['description'] ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Commence le</label>
    <div class="controls">
      <?php $startDate = explode(' ', $event['starts_at']) ?>
      <input class="input-small" type="text" name="event[starts_at][date]" value="<?php echo isset($startDate[0]) ? $startDate[0] : '' ?>">
      à
      <input class="input-small" type="text" name="event[starts_at][time]" value="<?php echo isset($startDate[0]) ? $startDate[0] : '' ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Termine le</label>
    <div class="controls">
      <?php $endDate = explode(' ', $event['ends_at']) ?>
      <input class="input-small" type="text" name="event[ends_at][date]" value="<?php echo isset($endDate[0]) ? $endDate[0] : '' ?>">
      à
      <input class="input-small" type="text" name="event[ends_at][time]" value="<?php echo isset($endDate[1]) ? $endDate[1] : '' ?>">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Sauvegarder</button>
    </div>
  </div>
</form>