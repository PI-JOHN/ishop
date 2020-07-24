<option value="" class="label"><?=$this->currency['code']; ?></option>
<?php foreach($this->currencies as $key => $value): ?>
<?php if ($key != $this->currencies['code']): ?>
        <option value="<?=$key; ?>"><?=$key; ?></option>
<?php endif; ?>
<?php endforeach; ?>


