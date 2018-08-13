let formAdd = {
    docForm:document.querySelector("#addStudent"),
    docInsert:document.querySelector(".consultation-table tbody"),
    docAddBtn:document.querySelector("#addNote"),
    add:function () {
        let title = document.querySelector("#titleNote").value;
        let description = document.querySelector("#descriptionNote").value;
        AJAX.post("/note/add",{title:title,description:description},function (text) {
            this.update(JSON.parse(text))
        }.bind(this))
    },
    update:function (text) {
        if(text.status == false){
            modal.vibro(this.docForm);
            return false
        }
        modal.close(this.docForm);
        this.docInsert.innerHTML += text.note;
    }
};
let formMore = {
    doc:document.getElementById("info-task"),
    getMore:function(id){
        id = id === undefined ? -1 : id;
        AJAX.post("/note/more",{id:id},function (text) {
            this.upload(JSON.parse(text));
            this.doc.dataset.id=id;
        }.bind(this))
    },
    upload:function (text) {
        this.doc.innerHTML = text.info;
    }
};

let formDelete = {
    init:function () {
        this.docModal = document.getElementById("confirm");
        this.docBtnYes = this.docModal.querySelector("#confirm-yes");
        this.bindEvent();
    },
    bindEvent:function () {
        document.addEventListener("click",this.openModalConfirm.bind(this));
        this.docBtnYes.addEventListener("click",this.eventSendToServer.bind(this))
    },
    eventSendToServer:function(e){
        let id = e.target.getAttribute("data-id");
        AJAX.post("/note/del",{id:id},function (text) {
            text = JSON.parse(text);
            modal.close(this.docModal);
            if(text.status == true) {
                if(formMore.doc.dataset.id==id) formMore.getMore();
                document.getElementById(id).outerHTML = "";
                return false;
            }
            modal.open(document.getElementById("error"),"Ошибка удаления: "+text.info)
        }.bind(this))
    },
    openModalConfirm:function (e) {
        if(!e.target.matches("a[data-id].removeConsult i") || this.docModal === undefined) return false;
        let id = e.target.parentNode.getAttribute("data-id");
        this.docBtnYes.setAttribute("data-id", id);
        modal.open(this.docModal, "Подтвердите удаление.");
    }
};
let note = {
    init:function () {
        this.bindEvent();
        formDelete.init();
        time.printDate(document.querySelector(".date-h"));
        time.printTime(document.querySelector(".date-t"));
        modal.init();
    },
    bindEvent:function () {
        formAdd.docAddBtn.addEventListener("click",function () {
            formAdd.add();
        });

        document.addEventListener("click",function (e) {
            if(!e.target.matches(".consultation-table tbody td")) return false;
            let id = e.target.parentNode.id;
            this.clearClass(document.querySelectorAll(".consultation-table tbody tr"),"active");
            e.target.parentNode.classList.add("active");
            formMore.getMore(id);
        }.bind(this));

        document.addEventListener("click",function (e) {
            if(e.target.id !=="close-more") return false;
            formMore.getMore();
            this.clearClass(document.querySelectorAll(".consultation-table tbody tr"),"active");
        }.bind(this));
    },

    clearClass:function (nodeList,classCSS) {
        for(let i = 0; i < nodeList.length; i++){
            nodeList[i].className = nodeList[i].classList.toggle(classCSS,false);
        }
    }
};
note.init();