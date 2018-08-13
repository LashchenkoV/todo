let entry = {
    init:function () {
        this.bindEvent();
    },
    bindEvent:function () {
        document.getElementById("entryBtn").addEventListener("click",function () {
            let entryPass = document.getElementById("entryPass").value;
            let login = document.getElementById("entryLog").value;
            let modalWindow = document.getElementById("error");
            if(entryPass.length===0){
                modal.open(modalWindow,"Enter the pass");
                return false;
            }
            if(login.length===0){
                modal.open(modalWindow,"Enter the login");
                return false;
            }
            AJAX.post("/login",{login:login,pass:entryPass},function (text) {
                let res = JSON.parse(text);
                if(res.auth === '0')
                    modal.open(modalWindow, res.error);
                else
                    window.location.href = "/admin";
            })
        })


    }
};