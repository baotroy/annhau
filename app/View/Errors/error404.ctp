<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    <?php echo Message::label('oops') ?></h1>
                <h2>
                    <?php echo Message::label('404') ?></h2>
                <div class="error-details">
                    <?php echo Message::label('404_message') ?>
                </div>
                <div class="error-actions">
                    <a href="<?php echo $this->base ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        <?php echo Message::label('take_home') ?> </a>
                </div>
            </div>
        </div>
    </div>
</div>
