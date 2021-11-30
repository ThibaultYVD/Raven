<div>
    <h1><?= $message['titre'] ?></h1>
    <?php if(!isset($message['descriptionO'])){
        if(isset($message['descriptionN'])) echo "<p>".$message['descriptionN']."</p>";
    
    ?>
    <form action="<?= WEBROOT?>contacter" class="tm-contact-form" method="POST">
              <div class="form-group">
                <input
                  type="text"
                  id="contact_name"
                  name="contact_name"
                  class="form-control"
                  placeholder="Nom"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  id="contact_email"
                  name="contact_email"
                  class="form-control"
                  placeholder="Email"
                  required
                />
              </div>
              <div class="form-group">
                <textarea
                  rows="5"
                  id="contact_message"
                  name="contact_message"
                  class="form-control"
                  placeholder="Message"
                  required
                ></textarea>
              </div>
              <div class="tm-text-right">
                <button type="submit" class="btn tm-btn tm-btn-big">
                  ENVOYER
                </button>
              </div>
            </form>
<?php
} else{
    echo "<p>".$message['descriptionO']."</p>";
}
?>
</div>