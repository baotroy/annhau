<!DOCTYPE html>
<html lang="ja">
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    // favicon Loading
    echo $this->Html->meta('icon', 'favicon.ico');
    ?>
    <title><?php echo $title_layout; ?></title>
    
    <?php
    // CSS Loading
    echo $this->fetch('css');                       // view append css
    echo $this->Html->css(array('bootstrap.min', 'metisMenu.min', 'sb-admin-2', 'font-awesome.min', 'bae'));   // override css
    ?>
    
</head>
<body>
    <?php
    echo $this->fetch('content');       // mein content loading
    //echo $this->element('sql_dump');    // for debug use only / sql trace
    ?>

  
    <!-- Bootstrap core JavaScript
    ================================================== -->
   
    <?php
    // Script Loading

    echo $this->Html->script(array('jquery.min','bootstrap.min', 'sb-admin-2', 'metisMenu.min', 'jquery.uploadfile.min', 'valid', 'ax'));   // jQuery & bootstrap genuine script
    echo $this->fetch('script');                                            // View append scripts
    echo $this->fetch('script_content');                                    // Script content block loading
    ?>
</body>
</html>