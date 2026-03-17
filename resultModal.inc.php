<!--
Name: Anton Opria
ID: C00309433
Date: 17/03/2026
-->
<?php
// result modal template

// set default values
$modalTitle = $modalTitle ?? 'Completed';
$modalMessage = $modalMessage ?? '';
$returnHref = $returnHref ?? '#';
$returnLabel = $returnLabel ?? 'Return';
$cssHref = $cssHref ?? '../../Main.css';

// escaping function for output
function glow_escape($value): string
{
    return $value;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo glow_escape($modalTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo glow_escape($cssHref); ?>">
</head>
<body>
<div class="modal-backdrop" role="dialog" aria-modal="true">
    <section class="card modal">
        <h1><?php echo glow_escape($modalTitle); ?></h1>
        <?php if ($modalMessage !== ''): ?>
            <p class="hint"><?php echo $modalMessage; ?></p>
        <?php endif; ?>

        <div class="actions">
            <a class="btn primary" href="<?php echo glow_escape($returnHref); ?>"><?php echo glow_escape($returnLabel); ?></a>
        </div>
    </section>
</div>
</body>
</html>
