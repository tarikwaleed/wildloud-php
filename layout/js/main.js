const elements = document.querySelectorAll(".sidebar a");
if (
    localStorage.getItem("active") == "undefined" ||
    !localStorage.getItem("active")
) {
    localStorage.setItem("active", "dashboard");
}
load();

$(document).ready(function () {
    $(document).on("click", ".cppoints", function () {
        var cp = $(this).attr("cp");
        var userid = $(this).attr("userid");

        $.ajax({
            url: "check_user4.php",
            method: "POST",
            data: { userid: userid, cp: cp },
            success: function (data) {
                $(".msgwindow").html(data);
                setTimeout(function () {
                    getpoints4(cp);
                }, 10000);
            },
        });
    });

    $(document).on("click", "#off3", function () {
        $("#mpr3").prop("disabled", true);
    });

    $(document).on("click", "#on3", function () {
        $("#mpr3").prop("disabled", true);
    });

    $(document).on("click", "#off4", function () {
        $("#mpr4").prop("disabled", true);
    });

    $(document).on("click", "#on4", function () {
        $("#mpr4").prop("disabled", true);
    });

    $("#off").click(function () {
        $("#mpr").prop("disabled", true);
    });
    $("#on").click(function () {
        $("#mpr").prop("disabled", false);
    });
    $("#off").click(function () {
        $("#mpr").prop("disabled", true);
    });
    $("#on").click(function () {
        $("#mpr").prop("disabled", false);
    });

    $("#off2").click(function () {
        $("#mpr2").prop("disabled", true);
    });
    $("#on2").click(function () {
        $("#mpr2").prop("disabled", false);
    });

    $(".prpmmf").click(function () {
        var l = $(this).attr("level");
        $.ajax({
            url: "fetch_subs.php",
            method: "POST",
            data: { l: l },
            success: function (data) {
                $("#lfdf6df5").html(data);
            },
        });
    });
    $(".up-ava").change(function () {
        $("#sb-bt").css("visibility", "visible");
    });
    $("#registerbtn").click(function () {
        $.ajax({
            url: "insert_user.php",
            method: "POST",
            data: $("#registerform").serialize(),
            success: function (data) {
                $("#registerform").html(data);
            },
        });
    });

    $(".close").click(function () {
        $("#contactpage").css("display", "none");
        $("#signinpage").css("display", "none");
        $("#registerpage").css("display", "none");
        $("#faqpage").css("display", "none");
        $("#fpasswordpage").css("display", "none");
        $("#contactpages").css("display", "none");
        $("#mappage").css("display", "none");
        $(".guidepage").css("display", "none");

        $("#tmpage").css("display", "none");
    });

    $("#forget-p").click(function () {
        $("#fpasswordpage").css("display", "block");
        $("#signinpage").css("display", "none");
        $("#registerpage").css("display", "none");
    });
    $(document).on("click", ".winner", function () {
        var userid = $(this).attr("userid");
        var comp = $(this).attr("comp");
        var place = $(this).attr("place");

        $.ajax({
            url: "winner.php",
            method: "POST",
            data: { userid: userid, comp: comp, place: place },
            success: function (data) {
                $(".winner").html(data);
            },
        });
    });
    $(document).on("click", ".qrcodecheck", function () {
        $.ajax({
            url: "qrcode_check.php",
            method: "POST",
            data: $("#registerform").serialize(),
            success: function (data) {
                if (data > 0) {
                    // window.location.href = "index.php";//<- your url here
                    location.reload();
                } else {
                    $(".qrcodeerr").html(data);
                }
            },
        });
    });

    $(document).on("click", ".getrewardpoints", function () {
        var points = $(this).attr("points");

        var ad = $(this).attr("ad");
        $.ajax({
            url: "insert_reward.php",
            method: "POST",
            data: { ad: ad, points: points },
            success: function (data) {
                $(this).html(data);
            },
        });
    });

    // function when click on question will show the answer of this question
    $(".acc h3").click(function () {
        $(this).next(".content-faq").slideToggle();
        $(this).parent().toggleClass("active");
        $(this).parent().siblings().children(".content-faq").slideUp();
        $(this).parent().siblings().removeClass("active");
    });
    // Mariam
    // setTimeout(function () {
    //     move();
    // }, 3000);

    $("#contactpage-btn").click(function () {
        $("#contactpages").css("display", "block");
    });
    $("#contactpage-btn-md").click(function () {
        $("#contactpages").css("display", "block");
    });

    $("#contact-btn").click(function () {
        $.ajax({
            url: "contactus.php",
            method: "POST",
            data: $("#contact-from").serialize(),
            success: function (data) {
                $(".err-msg2").html(data);
            },
        });
    });

    $("#login_botton").click(function () {
        $.ajax({
            url: "login.php",
            method: "POST",
            data: $("#loginform").serialize(),
            success: function (data) {
                if (data > 0) {
                    // window.location.href = "index.php";//<- your url here
                    location.reload();
                } else {
                    $(".err-msg").html(data);
                }
            },
        });
    });
    $("#map").click(function () {
        $("#mappage").css("display", "block");
    });
    $("#contactpage-btn").click(function () {
        $("#contactpages").css("display", "block");
    });
    $("#guide").click(function () {
        $("#guidepage").css("display", "block");
    });

    $("#tm").click(function () {
        $("#tmpage").css("display", "block");
    });

    $("#faqpage-btn").click(function () {
        $("#faqpage").css("display", "block");
    });

    $("#mppf93f").click(function () {
        $("#registerpage").css("display", "block");
    });

    $("#swtichtoregiter").click(function () {
        $("#signinpage").css("display", "none");
        $("#registerpage").css("display", "block");
    });

    $("#swtichtologin").click(function () {
        $("#signinpage").css("display", "block");
        $("#spage").css("display", "none");
        $("#fpasswordpage").css("display", "none");
        $("#registerpage").css("display", "none");
    });
    $("#signToRegister").click(function () {
        $("#signinpage").css("display", "block");
        $("#fpasswordpage").css("display", "none");
        $("#registerpage").css("display", "none");
    });

    $("#signin-botton").click(function () {
        $("#signinpage").css("display", "flex");
    });
    $("#Regsiter-botton").click(function () {
        $("#registerpage").css("display", "block");
    });
    // setInterval(function()
    // {
    //
    //   emptycontent();
    //
    //
    // },9000);
    $(document).on("click", ".boxone", function () {
        var nb = $(this).val();
    });

    //
    $(document).on("click", ".freepoints", function () {
        $.ajax({
            url: "fetch_freepoints.php",
            method: "POST",
            success: function (data) {
                $(".freepoints-tt").html(data);
            },
        });
    });

    $(document).on("click", ".mdpfe", function () {
        $(".msgwindow").empty();
        var service = $(this).attr("service");
        var servicetype = $(this).attr("servicetype");
        $.ajax({
            url: "fetchmyads.php",
            method: "POST",
            data: { service: service, servicetype: servicetype },
            success: function (data) {
                $(".mpz665r32ds").html(data);
            },
        });
    });

    $(document).on("click", ".visible_update", function () {
        var ad = $(this).attr("ad");
        var status = $(this).attr("status");
        $.ajax({
            url: "visibility.php",
            method: "POST",
            data: { ad: ad, status: status },
            success: function (data) {
                alert("ad status updated");
            },
        });
    });

    $(document).on("click", ".ad-delete", function () {
        var ad = $(this).attr("ad");
        $.ajax({
            url: "delete_ad.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                alert("this item has been delete, reload ");
            },
        });
    });

    $(document).on("click", "#mbeadbtn99003f3svb2", function () {
        $.ajax({
            url: "update_ad.php",
            method: "POST",
            data: $("#adform2").serialize(),
            success: function (data) {
                $(".msg").html(data);
            },
        });
    });

    $(document).on("click", ".close-ad-edit", function () {
        $(".content-ad-show").empty();
    });

    $(document).on("click", ".ad-edit", function () {
        var ad = $(this).attr("ad");
        $.ajax({
            url: "edit_ad.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".content-ad-show").html(data);
            },
        });
    });

    $(document).on("click", ".mpprlotk", function () {
        var ad = $(this).attr("ad");

        $.ajax({
            url: "check_user3.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);

                setTimeout(function () {
                    getpoints3(ad);
                }, 10000);
            },
        });
    });

    $(document).on("click", ".srtcount", function () {
        var ad = $(this).attr("ad");

        $.ajax({
            url: "check_user.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);

                setTimeout(function () {
                    getpoints(ad);
                }, 20000);
            },
        });
    });

    $(document).on("click", ".srtcount2", function () {
        var ad = $(this).attr("ad");

        $.ajax({
            url: "check_user2.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);

                setTimeout(function () {
                    getpoints2(ad);
                }, 10000);
            },
        });
    });

    function getpoints4(cp) {
        $.ajax({
            url: "success_points4.php",
            method: "POST",
            data: { cp: cp },
            success: function (data) {
                $(".msgwindow").html(data);
            },
        });
    }

    function getpoints(ad) {
        $.ajax({
            url: "success_points.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);
            },
        });
    }

    function getpoints2(ad) {
        $.ajax({
            url: "success_points2.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);
            },
        });
    }

    function getpoints3(ad) {
        $.ajax({
            url: "success_points3.php",
            method: "POST",
            data: { ad: ad },
            success: function (data) {
                $(".msgwindow").html(data);
            },
        });
    }
    $(document).on("click", ".adh999bb07es", function () {
        var id = $(this).attr("prmdk");
        var points = $(this).attr("pts");
        var ad = $(this).attr("ad");

        $.ajax({
            url: "update_hits.php",
            method: "POST",
            data: { id: id, points: points, ad: ad },
            success: function (data) {},
        });
    });

    $(document).on("click", ".skip0997", function () {
        var service = $(this).attr("service");
        var servicetype = $(this).attr("servicetype");
        $.ajax({
            url: "fetchmyads.php",
            method: "POST",
            data: { service: service, servicetype: servicetype },
            success: function (data) {
                $(".mpz665r32ds").html(data);
                newad(service, servicetype);
            },
        });
    });
    function newad(service, servicetype) {
        $.ajax({
            url: "fetchmyads.php",
            method: "POST",
            data: { service: service, servicetype: servicetype },
            success: function (data) {
                $(".mpz665r32ds").html(data);
            },
        });
    }

    $(document).on("click", ".mpr", function () {
        var service = $(this).attr("service");
        var servicetype = $(this).attr("servicetype");
        $.ajax({
            url: "fetchmyads.php",
            method: "POST",
            data: { service: service, servicetype: servicetype },
            success: function (data) {
                $(".mpz665r32ds").html(data);
            },
        });
    });

    $("#mbeadbtn99003f3svb").click(function () {
        $.ajax({
            url: "insert_ad.php",
            method: "POST",
            data: $("#adform").serialize(),
            success: function (data) {
                $(".msg").html(data);
            },
        });
    });

    $("#service").change(function () {
        var id = $("#service").val();
        $.ajax({
            url: "fetch_servicestype.php",
            method: "POST",
            data: { id: id },
            success: function (data) {
                $("#servicetype").html(data);
            },
        });
    });

    $("#a-btn-option").click(function () {
        $.ajax({
            url: "insert_user.php",
            method: "POST",
            data: $("#form-info").serialize(),
            success: function (data) {
                $(".err-msg").html(data);
            },
        });
    });

    // $('.boxone').click(function(){
    //   var user=   $(this).attr('user');
    //   var box = $(this).attr('box');
    //   var points = $(this).attr('points');
    //
    //   $.ajax({
    //     url: 'insert_reward.php',
    //     method : 'POST',
    //     data:  {user:user,box:box,points:points},
    //     success: function(data)
    //     {
    //       $('.boxone').html(data);
    //     }
    //   });
    //
    //
    //
    //   })

    $(".webhists").click(function () {
        $(".webhits").css("display", "block");
        $(".9re8dbb00er").css("display", "none");
        $(".mpds098fb").css("display", "none");
        $(".free_point").css("display", "none");
        $(".iframe_section").css("display", "none");
    });
    $(".freepoints").click(function () {
        $(".webhits").css("display", "none");
        $(".9re8dbb00er").css("display", "none");
        $(".mpds098fb").css("display", "none");
        $(".free_point").css("display", "block");
        $(".iframe_section").css("display", "block");
    });

    $(".socialhits").click(function () {
        $(".webhits").css("display", "none");
        $(".9re8dbb00er").css("display", "block");
        $(".mpds098fb").css("display", "block");
        $(".free_point").css("display", "none");
        $(".iframe_section").css("display", "none");
    });

    $(".service-btfd").click(function () {
        var id = $(this).attr("service");
        $.ajax({
            url: "fetch_ads.php",
            method: "POST",
            data: { id: id },
            success: function (data) {
                $(".mpz665r32ds").html(data);
            },
        });
    });

    $(".dashboard-overview").click(function () {});

    // empty js file
});
var counterVal2 = 0;

function incrementClick2() {
    updateDisplay2(++counterVal2);

    var clicks = $(".boxtwo").attr("totalclicks", counterVal2);
    var bclick = $(".boxtwo").attr("basicclicks");
    var user = $(".boxtwo").attr("user");
    var box = $(".boxtwo").attr("box");
    var points = $(".boxtwo").attr("points");
    if (counterVal2 == bclick) {
        $.ajax({
            url: "insert_reward.php",
            method: "POST",
            data: { user: user, box: box, points: points },
            success: function (data) {
                $(".boxtwo").html(data);
            },
        });
    }
}

function updateDisplay2(val2) {
    document.getElementById("counter-label2").innerHTML = val2;
}

/////////////////////////////////////
var counterVal = 0;

function incrementClick() {
    updateDisplay(++counterVal);

    var clicks = $(".boxone").attr("totalclicks", counterVal);
    var bclick = $(".boxone").attr("basicclicks");
    var user = $(".boxone").attr("user");
    var box = $(".boxone").attr("box");
    var points = $(".boxone").attr("points");
    if (counterVal == bclick) {
        $.ajax({
            url: "insert_reward.php",
            method: "POST",
            data: { user: user, box: box, points: points },
            success: function (data) {
                $(".boxone").html(data);
            },
        });
    }
}

function updateDisplay(val) {
    document.getElementById("counter-label").innerHTML = val;
}

var i = 0;
function move() {
    if (i == 0) {
        i = 1;
        var elem = document.getElementById("myBar");
        var width = 0;
        var id = setInterval(frame, 200);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                web();
                i = 0;
            } else {
                width++;
                elem.style.width = width + "%";
            }
        }
    }
}
function web() {
    var points = $(".barcontent").attr("points");
    var ad = $(".barcontent").attr("ad");

    $.ajax({
        url: "insert_webhits.php",
        method: "POST",
        data: { points: points, ad: ad },
        success: function (data) {
            $(".barcontent").html(data);
        },
    });
}

1;
2;
3;

// toggle acive class to sidebar and store it in localstorage

elements.forEach((a) => {
    a.addEventListener("click", () => {
        let clicked = a.dataset.active;
        localStorage.setItem("active", clicked);
    });
});
function load() {
    const getFromLocal = localStorage.getItem("active");
    elements.forEach((element) => {
        if (getFromLocal === element.dataset.active) {
            element.classList.add("active");
        } else {
            element.classList.remove("active");
        }
    });
}
/*
=======================================
== Add active class to pointsZone page
=======================================
*/
const list = document.querySelectorAll(".list ul li");
const socialNav = document.querySelectorAll(".pointsZoneHeader div");
list.forEach((li) => {
    li.addEventListener("click", () => {
        removeActive(list);
        li.classList.add("active");
    });
});
socialNav.forEach((div) => {
    div.addEventListener("click", (e) => {
        removeActive(socialNav);
        div.classList.add("active");
    });
});
let removeActive = (list) => {
    list.forEach((element) => {
        element.classList.remove("active");
    });
};
let adsP = document.querySelectorAll(".ads_p");
adsP.forEach((p) => {
    let text = p.textContent.trim();
    let truncatedText = text.substring(0, 1000);
    p.textContent = truncatedText;
});
/*
======================================
== toggle active class in payment page
======================================
*/
let check = document.querySelectorAll(".list_price .list_check");
check.forEach((item) => {
    item.onclick = () => {
        // remove active class
        document
            .querySelectorAll(".list_price .active")
            .forEach((li) => li.classList.remove("active"));
        // add active class
        item.parentElement.parentElement.classList.add("active");
    };
});
