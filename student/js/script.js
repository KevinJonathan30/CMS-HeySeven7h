var result = 0;
var idTryout = 0;
var questionCount = 0;
var nextUrl = "None";
retryAttempt = 0;
function submitToDatabase() {
    var finalResult = result / questionCount * 100;
    $.ajax({
        url: "submit_tryout.php",
        type: "POST",
        data: {
            finalResult: finalResult,
            idTryout: idTryout
        },
        success: function (data) {
            console.log(data);
            if(nextUrl == "None") {
                setInterval(function () {
                    window.location.href="submitted.php";
                }, 5000);
            } else {
                setInterval(function () {
                    window.location.href="tryout.php?id=" + nextUrl;
                }, 5000);
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}
function submitResult() {
    result = $("input:radio.correct:checked").length;
    retryAttempt++;
    document.getElementById("score").innerHTML = "Nilai Total = " + (result / questionCount * 100).toFixed(2);
    document.getElementById("warning").innerHTML = "Pekerjaan telah terkumpul, anda akan dialihkan ke bagian Try Out berikutnya";
    document.getElementById("retryButton").style.display = "none";
    submitToDatabase();
}
function checkResult() {
    result = $("input:radio.correct:checked").length;
    retryAttempt++;
    document.getElementById("score").innerHTML = "Nilai Total = " + (result / questionCount * 100).toFixed(2);
    if (retryAttempt > 3) {
        document.getElementById("retryButton").style.display = "none";
        document.getElementById("warning").innerHTML = "Anda telah beralih lebih dari 3 kali, nilai akan otomatis tersubmit dan anda akan dialihkan ke bagian Try Out berikutnya"
        submitToDatabase();
    }
}
function retryCounter() {
    var ele = document.getElementsByClassName("form-check-input");
    for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;
    result = 0;
}
var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
    keyboard: false
});
$(window).focus(function () {
    checkResult();
      document.getElementById("warning").innerHTML = "Anda beralih dari halaman Try Out!";
      myModal.show()
});
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            submitResult();
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var id = document.getElementById("tryoutId").value;
    $.ajax({
        url: "get_tryout_attribute.php",
        type: "POST",
        data: {
            id: id,
        },
        dataType: 'json',
        success: function (data) {
            if (data[0].time != 0) {
                var myTime = 60 * data[0].time;
                display = document.querySelector('#time');
                startTimer(myTime, display);
            }
            idTryout = data[0].id;
            nextUrl = data[0].linkTo;
        },
        error: function (data) {
            console.log(data);
        }
    });
    $.ajax({
        url: "get_question_count.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function (data) {
            questionCount = data;
        },
        error: function (data) {
            console.log(data);
        }
    });
};