
<?php if ($flash->offsetExists('notif')) : ?>

    <div data-alert class="alert-box <?php echo $flash['notif']['type']; ?> ">
       <?php echo $flash['notif']['message'];?> 
        <a href="#" class="close">&times;</a>
    </div>

<?php endif; ?>