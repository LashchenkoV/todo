<div class="modal modal-error" id="error">
    <div class="tab">
        <div>
            <a class="button" href="#">Ошибка!</a>
        </div>
        <div class="btn-close">
            <a href="#"><i  data-modal-close="error" class="fa fa-window-close" aria-hidden="true"></i></a>
        </div>
    </div>
    <p class="modal-text"></p>
</div>
<div class="modal modal-confirm" id="confirm">
    <div class="tab">
        <div>
            <a class="button" href="#">Подтвердите:</a>
        </div>
    </div>
    <p class="modal-text">Удалить заметку?</p>
    <div class="buttons">
        <a href="#" class="button" id="confirm-yes" data-id="">Да</a>
        <a href="#" class="button red" data-modal-close="confirm">Нет</a>
    </div>
</div>
<div class="modal" id="addStudent">
    <div class="tab">
        <div>
            <a class="button links">Добавление</a>
        </div>
        <div class="btn-close">
            <a href="#"><i data-modal-close="addStudent" class="fa fa-window-close" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="tabcontent">
        <div class="info">
            <div class="header-tab">
                <input id="titleNote" type="text" placeholder="Заголовок">
                <textarea id="descriptionNote" placeholder="Детальное описание..." style="max-width: 845px; min-width: 845px; max-height: 150px;min-height: 150px"></textarea>
            </div>
            <div class="footer-tab">
                <a href="#" class="button" id="addNote">Добавить</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="title">
        <div class="date" style="color: #c2c3c9;">
            <div class="date-h"></div>
            <div class="date-t"></div>
        </div>
        <div class="add-consultation" >
            <a id="#" href="#"><i class="fa fa-plus" aria-hidden="true" data-modal-open="addStudent"></i></a>
        </div>
    </div>
    <div style="display: flex" >
        <table class="consultation-table">
            <thead>
                <tr>
                    <th class="name">Заметка</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?=$listNotes?>
            </tbody>
        </table>
        <div id ="info-task" class="info" data-id="">
            <div class="flex-center"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
        </div>
    </div>
</div>
<script src="/content/js/admin.js"></script>