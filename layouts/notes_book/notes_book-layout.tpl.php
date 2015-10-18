<div>
  <?php print render($page['notes_book_title']); ?>
  <?php print render($page['notes_book_toc']); ?>
  <?php print render($page['notes_book_body']); ?>
  <?php print render($page['notes_book_nav']); ?>
  <?php print render($page['notes_book_updated']); ?>

  <div class="l-region l-region--notes-book-contribute">
    <div class="panel-pane pane-custom pane-1">
      <p><?php print t('Do you want to add something to this page? !contact_us, please.', array('!contact_us' => l('Let us know', '/notes/get-involved'))); ?></p>
    </div>
  </div>

  <?php print render($page['notes_book_comments']); ?>
</div>
