<?php
foreach ($notes as $note): ?>
    <tr id = "<?=$note['id']?>">
        <td><?=$note['title']?></td>
        <td><?=date("Y-m-d", $note['date'])?></td>
        <td class="option">
            <a href="#" class="removeConsult" data-id="<?=$note['id']?>"><i  class="fa fa-times btn-close" aria-hidden="true"></i></a>
        </td>
    </tr>
<?php endforeach;?>