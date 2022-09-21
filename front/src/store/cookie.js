import { defineStore } from 'pinia'

export const manageCookies = defineStore('manage-cookie', {
    state (){
        return{
            token : null,
        }
    },
    getters:{
        getToken(){
            if(this.token == null){
                return this.getCookie('user_token');
            }else{
                return this.token;
            }
        }
    },
    actions: {
        deleteCookie(name) {
            var data = new Date();
            data.setTime(data.getTime() - (60*60*1000));
            var expires = "expires=" + data.toGMTString();
            document.cookie = name + "=;" + expires + ";path=/";
        },
        setCookie(name,value,exp_days) {
            var d = new Date();
            d.setTime(d.getTime() + (exp_days*24*60*60*1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
          },
          getCookie(name) {
            var cname = name + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var splitDataToJsonFormat = decodedCookie.split(';');
            for(var i = 0; i < splitDataToJsonFormat.length; i++){
                var cookie = splitDataToJsonFormat[i];
                while(cookie.charAt(0) == ' '){
                  cookie = cookie.substring(1);
                }
                if(cookie.indexOf(cname) == 0){
                    return cookie.substring(cname.length, cookie.length);
                }
            }
            return "";
        },
    }
})