<?php foreach ($value as $i => $v): ?>
  <?= e($v['field']); ?>: '<?= e(mb_strimwidth($v['value'], 0, 32, "...")); ?>'<?php if ($i < count($value) - 1): ?>,<?php endif; ?>
<?php endforeach; ?>