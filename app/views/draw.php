<?php
/** @var array $data */
?>
<?php if (is_null($data) && !isset($data['error'])) { ?>
    <h1 xmlns="http://www.w3.org/1999/html">Draw some figure</h1>
    <form method="post">
        <label for="figure_type">Choose figure type: </label>
        <select id="figure_type" name="type">
            <option>-- None --</option>
            <?php foreach (FigureRules::getAllowedTypes() as $key => $value) { ?>
                <option value="<?= $key; ?>"><?= $value; ?></option>
            <?php } ?>
        </select><br/><br/>
        Params for your figure<br/><br/>
        <?php foreach (FigureRules::getAllowedParams() as $key => $value) { ?>
            <label for="param_<?= $key; ?>"><b><?= $value; ?>: </b></label>
            <input id="param_<?= $key; ?>" name="params[<?= $key; ?>]" type="text"><br/><br/>
        <?php } ?>
        <input type="submit" value="Push">
    </form>
<?php } else {
    if (isset($data['error'])) {
        echo $data['error'] . '<br />';
    } else {
        // something
    }
} ?>
