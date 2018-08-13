let time = {
    printDate:function(div){
        let date = new Date();
        div.innerHTML = date.getFullYear()+"-"+this.addZero(date.getMonth()+1)+"-"+this.addZero(date.getDate())+"&nbsp;";
    },
    printTime:function (div){
        setInterval(function () {
            let date = new Date();
            div.innerHTML = this.addZero(date.getHours())+":"+this.addZero(date.getMinutes())+":"+this.addZero(date.getSeconds())+"&nbsp;";
        }.bind(this),1000);
    },
    addZero:function (text) {
        if(parseInt(text)<=9) text = "0"+text;
        return text
    }
};