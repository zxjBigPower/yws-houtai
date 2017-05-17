$(function(){







//----------------
var addTimer = function () {
    var list = [],
            interval;
    return function (id, time) {
        if (!interval)
            interval = setInterval(go, 1000);
        list.push({ ele: document.getElementById(id), time: time });
    }

    function go() {
        for (var i = 0; i < list.length; i++) {
            list[i].ele.innerHTML = getTimerString(list[i].time ? list[i].time -= 1 : 0);
            if (!list[i].time)
                list.splice(i--, 1);
        }
    }

    function getTimerString(time) {
        var not0 = !!time,
                d = Math.floor(time / 86400),
                h = Math.floor((time %= 86400) / 3600),
                m = Math.floor((time %= 3600) / 60),
                s = time % 60;
        if (not0)
            return d + "天" + h + "小时" + m + "分" + s + "秒";
        else return "时间到";
    }
} ();

addTimer('test1',20000);
addTimer('test2',60000);
addTimer('test3',60000);
addTimer('test4',10000);
addTimer('test5',60000);
addTimer('test6',60000);
addTimer('test7',60000);


















})