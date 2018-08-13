<div class="title">
    <div>
        <div id="title"><?=$note['title']?></div>
        <div id="date" class="date">
            <?=date("Y-m-d H:i:s", $note['date']);?>
        </div>
    </div>
    <div class="btn-close">
        <a href="#"><i class="fa fa-window-close" aria-hidden="true" id="close-more"></i></a>
    </div>
</div>
<div class="desc" id="desc"><?=$note['text']?></div>