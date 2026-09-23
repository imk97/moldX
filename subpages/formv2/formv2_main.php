<?php
//session_start();

$formDat = $_GET['f'];
include 'csvReader_Main.php';
csvReader($formDat);


?>


<head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['fileDir']["sys_url"].$_SESSION['formv2']['main'][1]['title']; ?></title>
    <link rel="stylesheet" href="subpages/formv2/css_form.css">
</head>


<body>

    <div class="form-container">
<h2>
    <?= $_SESSION['formv2']['main'][1]['title'] ?></h2>

<form
    method="post"
    action='<?=$_SESSION['fileDir']["sys_url"].$_SESSION['formv2']['main'][1]['submitFile']?>'
    enctype="multipart/form-data">

<!-- START FORM FIELD LOOPING -->    
<?php for ($i = 1; $i <= $_SESSION['formv2']['main'][1]['fieldNo']; $i++) { ?>

    <div class='form-group'><label><?= $_SESSION['formv2']['form'][$i]['label'] ?></label>
        <input
            type='<?= $_SESSION['formv2']['form'][$i]['field'] ?>'
            name='<?= $_SESSION['formv2']['form'][$i]['name'] ?>'
            id=  '<?= $_SESSION['formv2']['form'][$i]['id'] ?>'
            <?php if($_SESSION['formv2']['form'][$i]['size']!="") {echo 'size=\''.$_SESSION['formv2']['form'][$i]['size'].'\'';} 
            echo PHP_EOL;?>
            <?php if($_SESSION['formv2']['form'][$i]['value']!="") {echo 'value=\''.$_SESSION['formv2']['form'][$i]['value'].'\'';} 
            echo PHP_EOL;?>
            <?php if($_SESSION['formv2']['form'][$i]['required']=="Y") {echo 'required';} ?> 
            <?php if($_SESSION['formv2']['form'][$i]['readonly']=="Y") {echo 'readonly';} ?> 
            <?php if($_SESSION['formv2']['form'][$i]['disabled']=="Y") {echo 'disabled';} ?> 
            <?php if($_SESSION['formv2']['form'][$i]['autofocus']=="Y") {echo 'autofocus';} 
            echo PHP_EOL?>
            <?php if($_SESSION['formv2']['form'][$i]['placeholder']!="") {echo 'placeholder=\''.$_SESSION['formv2']['form'][$i]['placeholder'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['maxlength']!="") {echo 'maxlength=\''.$_SESSION['formv2']['form'][$i]['maxlength'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['minlength']!="") {echo 'minlength=\''.$_SESSION['formv2']['form'][$i]['minlength'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['pattern']!="") {echo 'pattern=\''.$_SESSION['formv2']['form'][$i]['pattern'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['autocomplete']!="") {echo 'autocomplete=\''.$_SESSION['formv2']['form'][$i]['autocomplete'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['list']!="") {echo 'list=\''.$_SESSION['formv2']['form'][$i]['list'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['min']!="") {echo 'min=\''.$_SESSION['formv2']['form'][$i]['min'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['max']!="") {echo 'max=\''.$_SESSION['formv2']['form'][$i]['max'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['step']!="") {echo 'step=\''.$_SESSION['formv2']['form'][$i]['step'].'\''.PHP_EOL;} ?>
            <?php if($_SESSION['formv2']['form'][$i]['checked']=="Y") {echo 'checked';} ?> 
            <?php if($_SESSION['formv2']['form'][$i]['multiple']=="Y") {echo 'multiple';} ?> 
            <?php if($_SESSION['formv2']['form'][$i]['accept']!="") {echo 'accept=\''.$_SESSION['formv2']['form'][$i]['accept'].'\'';} ?>
            >
    </div>

<?php } ?>

            <div class="button-group">
                <a href=<?= $_SESSION['fileDir']["sys_url"].$_SESSION['formv2']['main'][1]['cancelRedirect']?> class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>

</form>
</div>
<br>
<body>