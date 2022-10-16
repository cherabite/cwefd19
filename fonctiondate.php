<?php
$i = 1;
while ($i < 32) {
    ?>
    <option value="<?php echo $i; ?> "><?php echo $i; ?></option>
    <?php
    $i = $i + 1;
}
?></select>

&nbsp;
<select name="MOIS_PV"> 
    <?php
    $i = 1;
    while ($i < 13) {
        ?>
        <option value="<?php echo $i; ?> "><?php echo $i; ?></option>
        <?php
        $i = $i + 1;
    }
    ?></select>
&nbsp;
<select name="ANNEE_PV"> 
    <?php
    $i = 1940;
    while ($i < 2010) {
        ?>
        <option value="<?php echo $i; ?> "><?php echo $i; ?></option>
        <?php
        $i = $i + 1;
    }
    ?>
